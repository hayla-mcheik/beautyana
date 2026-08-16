<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\ProductColor;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function index()
    {
        // Added eager loading 'category' for performance
        $products = Product::with('category')->latest()->get();

        return view(
            'admin.products.index',
            compact('products')
        );
    }

public function create()
{
    // Eager load menu and parent relationships
    $categories = Category::with(['menu'])->get();
    $colors = Color::where('status', '0')->get();

    return view('admin.products.create', compact('categories', 'colors'));
}
    /*
    |--------------------------------------------------------------------------
    | Store Product
    |--------------------------------------------------------------------------
    */
    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        if (!$request->hasFile('image')) {
            return redirect()
                ->back()
                ->withErrors([
                    'image' => 'Please upload at least one image.'
                ])
                ->withInput();
        }  

        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => $this->generateUniqueSlug($validatedData['name']),
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'featured' => $request->boolean('featured') ? '1' : '0',
            'status' => $request->boolean('status') ? '0' : '1',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Product Images
        |--------------------------------------------------------------------------
        */
        $uploadPath = 'uploads/products/';

        foreach ($request->file('image') as $imageFile) {
            $extension = $imageFile->getClientOriginalExtension();
            $filename = Str::uuid() . '.' . $extension;

            $imageFile->move(
                public_path($uploadPath),
                $filename
            );

            $product->productImages()->create([
                'product_id' => $product->id,
                'image' => $uploadPath . $filename,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Product Colors
        |--------------------------------------------------------------------------
        */
        if ($request->filled('colors')) {
            foreach ($request->input('colors', []) as $key => $colorId) {
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $colorId,
                    'quantity' => $request->input("colorquantity.$key", 0),
                ]);
            }
        }

        return redirect('/admin/products')
            ->with('message', 'Product Added Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Product
    |--------------------------------------------------------------------------
    */
 public function edit(int $product_id)
{
    // Eager load menu and parent relationships
    $categories = Category::with(['menu'])->get();
    $product = Product::findOrFail($product_id);

    $productColorIds = $product->productColors->pluck('color_id')->toArray();
    $colors = Color::where('status', '0')->whereNotIn('id', $productColorIds)->get();

    return view('admin.products.edit', compact('categories', 'product', 'colors'));
}

    /*
    |--------------------------------------------------------------------------
    | Update Product
    |--------------------------------------------------------------------------
    */
    public function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();

        $product = Product::findOrFail($product_id);

        if ($product->name !== $validatedData['name']) {
            $product->slug = $this->generateUniqueSlug(
                $validatedData['name'],
                $product->id
            );
        }

        $product->category_id = $validatedData['category_id'];
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->original_price = $validatedData['original_price'];
        $product->selling_price = $validatedData['selling_price'];
        $product->quantity = $validatedData['quantity'];
        $product->featured = $request->boolean('featured') ? '1' : '0';
        $product->status = $request->boolean('status') ? '0' : '1';

        $product->save();

        /*
        |--------------------------------------------------------------------------
        | Add New Product Images
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            foreach ($request->file('image') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $filename = Str::uuid() . '.' . $extension;

                $imageFile->move(
                    public_path($uploadPath),
                    $filename
                );

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $uploadPath . $filename,
                ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Add New Product Colors
        |--------------------------------------------------------------------------
        */
        if ($request->filled('colors')) {
            foreach ($request->input('colors', []) as $key => $colorId) {
                $product->productColors()->firstOrCreate(
                    ['color_id' => $colorId],
                    ['quantity' => $request->input("colorquantity.$key", 0)]
                );
            }
        }

        return redirect('admin/products')
            ->with('message', 'Product Updated Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Product Image
    |--------------------------------------------------------------------------
    */
    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);

        if ($productImage->image && File::exists(public_path($productImage->image))) {
            File::delete(public_path($productImage->image));
        }

        $productImage->delete();

        return redirect()
            ->back()
            ->with('message', 'Product Image Deleted');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Product
    |--------------------------------------------------------------------------
    */
    public function destroy(int $product_id)
    {
        $product = Product::with('productImages')->findOrFail($product_id);

        foreach ($product->productImages as $image) {
            if ($image->image && File::exists(public_path($image->image))) {
                File::delete(public_path($image->image));
            }
        }

        $product->delete();

        return redirect()
            ->back()
            ->with('message', 'Product Deleted with all its images');
    }

    /*
    |--------------------------------------------------------------------------
    | Update Product Color Quantity
    |--------------------------------------------------------------------------
    */
    public function updateProdColorQty(Request $request, $prod_color_id)
    {
        $productColorData = Product::findOrFail($request->product_id)
            ->productColors()
            ->where('id', $prod_color_id)
            ->firstOrFail();

        $productColorData->update([
            'quantity' => $request->qty
        ]);

        return response()->json([
            'message' => 'Product Color Qty updated'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Product Color
    |--------------------------------------------------------------------------
    */
    public function deleteProdColor($prod_color_id)
    {
        $prodColor = ProductColor::findOrFail($prod_color_id);
        $prodColor->delete();

        return response()->json([
            'message' => 'Product Color Deleted'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Generate Unique Product Slug
    |--------------------------------------------------------------------------
    */
    private function generateUniqueSlug(string $name, ?int $ignoreProductId = null): string
    {
        $baseSlug = Str::slug($name);

        if (empty($baseSlug)) {
            $baseSlug = 'product';
        }

        $slug = $baseSlug;
        $counter = 2;

        while (
            Product::where('slug', $slug)
                ->when($ignoreProductId, function ($query) use ($ignoreProductId) {
                    $query->where('id', '!=', $ignoreProductId);
                })
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}