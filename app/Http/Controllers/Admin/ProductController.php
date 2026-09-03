<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\ProductImage;
use App\Models\Size;
use App\Models\ProductVariant;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $products = Product::with([
            'category',
            'productImages',
            'productVariants.color',
            'productVariants.size',
        ])->get();

        return view(
            'admin.products.index',
            compact('products')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Create Product
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $categories = Category::all();

        $colors = Color::where('status', '0')
            ->get();

        $sizes = Size::where('status', '0')
            ->get();

        return view(
            'admin.products.create',
            compact(
                'categories',
                'colors',
                'sizes'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store Product
    |--------------------------------------------------------------------------
    */

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

/*
|--------------------------------------------------------------------------
| Calculate Product Selling Price
|--------------------------------------------------------------------------
*/

$originalPrice = (float) $validatedData['original_price'];

$discountPercentage = (float) (
    $validatedData['discount_percentage'] ?? 0
);

$sellingPrice = $originalPrice;

if ($discountPercentage > 0) {

    $sellingPrice =
        $originalPrice -
        (
            $originalPrice *
            $discountPercentage /
            100
        );
}

$sellingPrice = round($sellingPrice, 2);
        /*
        |--------------------------------------------------------------------------
        | Require Product Images
        |--------------------------------------------------------------------------
        */

        if (!$request->hasFile('image')) {

            return redirect()
                ->back()
                ->withErrors([
                    'image' => 'Please upload at least one image.'
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Create Everything Inside Transaction
        |--------------------------------------------------------------------------
        */

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | Find Category
            |--------------------------------------------------------------------------
            */

            $category = Category::findOrFail(
                $validatedData['category_id']
            );


            /*
            |--------------------------------------------------------------------------
            | Create Product
            |--------------------------------------------------------------------------
            */

          $product = $category->products()->create([

    'category_id' =>
        $validatedData['category_id'],

    'name' =>
        $validatedData['name'],

    'slug' =>
        $this->generateUniqueSlug(
            $validatedData['name']
        ),

    'description' =>
        $validatedData['description'],

    'original_price' =>
        $originalPrice,

    'discount_percentage' =>
        $discountPercentage,

    'selling_price' =>
        $sellingPrice,

    'quantity' =>
        $validatedData['quantity'],

    'featured' =>
        $request->boolean('featured')
            ? '1'
            : '0',

    'status' =>
        $request->boolean('status')
            ? '0'
            : '1',
]);

            /*
            |--------------------------------------------------------------------------
            | Upload Product Images
            |--------------------------------------------------------------------------
            */

            $uploadPath = 'uploads/products/';


            foreach (
                $request->file('image')
                as $imageFile
            ) {

                $extension =
                    $imageFile->getClientOriginalExtension();


                $filename =
                    Str::uuid()
                    . '.'
                    . $extension;


                $imageFile->move(
                    public_path($uploadPath),
                    $filename
                );


                $product->productImages()->create([

                    'product_id' =>
                        $product->id,

                    'image' =>
                        $uploadPath . $filename,

                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | Product Variants
            |--------------------------------------------------------------------------
            |
            | Example:
            |
            | Black + S = 5
            | Black + M = 8
            | Black + L = 3
            | White + S = 4
            |
            */

            $totalVariantQuantity = 0;

            $usedVariants = [];


            if ($request->filled('variants')) {

                foreach (
                    $request->input('variants', [])
                    as $variant
                ) {

                    $colorId =
                        !empty($variant['color_id'])
                            ? (int) $variant['color_id']
                            : null;


                    $sizeId =
                        !empty($variant['size_id'])
                            ? (int) $variant['size_id']
                            : null;


                    $quantity =
                        isset($variant['quantity'])
                            ? (int) $variant['quantity']
                            : 0;


                    /*
                    |--------------------------------------------------------------------------
                    | Skip Completely Empty Rows
                    |--------------------------------------------------------------------------
                    */

                    if (
                        $colorId === null &&
                        $sizeId === null
                    ) {
                        continue;
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Prevent Duplicate Combinations
                    |--------------------------------------------------------------------------
                    */

                    $variantKey =
                        ($colorId ?? 'null')
                        . '-'
                        . ($sizeId ?? 'null');


                    if (
                        isset(
                            $usedVariants[$variantKey]
                        )
                    ) {
                        continue;
                    }


                    $usedVariants[$variantKey] = true;


                    /*
                    |--------------------------------------------------------------------------
                    | Create Variant
                    |--------------------------------------------------------------------------
                    */

                    $product->productVariants()->create([

                        'product_id' =>
                            $product->id,

                        'color_id' =>
                            $colorId,

                        'size_id' =>
                            $sizeId,

                        'quantity' =>
                            max(0, $quantity),

                    ]);


                    $totalVariantQuantity +=
                        max(0, $quantity);
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Update Product Total Quantity
            |--------------------------------------------------------------------------
            |
            | If variants were added, product quantity becomes
            | the total quantity of all variants.
            |
            */

            if (
                $request->filled('variants') &&
                $usedVariants
            ) {

                $product->quantity =
                    $totalVariantQuantity;

                $product->save();
            }


            DB::commit();


            return redirect('/admin/products')
                ->with(
                    'message',
                    'Product Added Successfully'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->withErrors([
                    'error' =>
                        'Something went wrong while adding the product.'
                ])
                ->withInput();
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Product
    |--------------------------------------------------------------------------
    */

    public function edit(int $product_id)
    {
        $categories = Category::all();


        /*
        |--------------------------------------------------------------------------
        | Load Product + Variants
        |--------------------------------------------------------------------------
        */

        $product = Product::with([
            'productImages',
            'productVariants.color',
            'productVariants.size',
        ])->findOrFail($product_id);


        /*
        |--------------------------------------------------------------------------
        | Load Active Colors
        |--------------------------------------------------------------------------
        */

        $colors = Color::where('status', '0')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Load Active Sizes
        |--------------------------------------------------------------------------
        */

        $sizes = Size::where('status', '0')
            ->get();


        return view(
            'admin.products.edit',
            compact(
                'categories',
                'product',
                'colors',
                'sizes'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Product
    |--------------------------------------------------------------------------
    */

    public function update(
        ProductFormRequest $request,
        int $product_id
    ) {

        $validatedData =
            $request->validated();
/*
|--------------------------------------------------------------------------
| Calculate Product Selling Price
|--------------------------------------------------------------------------
*/

$originalPrice = (float) $validatedData['original_price'];

$discountPercentage = (float) (
    $validatedData['discount_percentage'] ?? 0
);

$sellingPrice = $originalPrice;

if ($discountPercentage > 0) {

    $sellingPrice =
        $originalPrice -
        (
            $originalPrice *
            $discountPercentage /
            100
        );
}

$sellingPrice = round($sellingPrice, 2);

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | Find Product
            |--------------------------------------------------------------------------
            |
            | Do not search through the category because
            | the admin may change the category.
            |
            */

            $product =
                Product::findOrFail(
                    $product_id
                );


            /*
            |--------------------------------------------------------------------------
            | Generate New Slug Only When Name Changes
            |--------------------------------------------------------------------------
            */

            if (
                $product->name !==
                $validatedData['name']
            ) {

                $product->slug =
                    $this->generateUniqueSlug(
                        $validatedData['name'],
                        $product->id
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | Update Product Information
            |--------------------------------------------------------------------------
            */

            $product->category_id =
                $validatedData['category_id'];


            $product->name =
                $validatedData['name'];


            $product->description =
                $validatedData['description'];

$product->original_price =
    $originalPrice;

$product->discount_percentage =
    $discountPercentage;

$product->selling_price =
    $sellingPrice;

            /*
             * Keep original quantity for now.
             *
             * If variants exist, it will be recalculated
             * below.
             */

            $product->quantity =
                $validatedData['quantity'];


            $product->featured =
                $request->boolean('featured')
                    ? '1'
                    : '0';


            $product->status =
                $request->boolean('status')
                    ? '0'
                    : '1';


            $product->save();


            /*
            |--------------------------------------------------------------------------
            | Add New Product Images
            |--------------------------------------------------------------------------
            |
            | Existing images are kept.
            |
            */

            if ($request->hasFile('image')) {

                $uploadPath =
                    'uploads/products/';


                foreach (
                    $request->file('image')
                    as $imageFile
                ) {

                    $extension =
                        $imageFile
                            ->getClientOriginalExtension();


                    $filename =
                        Str::uuid()
                        . '.'
                        . $extension;


                    $imageFile->move(
                        public_path($uploadPath),
                        $filename
                    );


                    $product
                        ->productImages()
                        ->create([

                            'product_id' =>
                                $product->id,

                            'image' =>
                                $uploadPath . $filename,

                        ]);
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Replace Product Variants
            |--------------------------------------------------------------------------
            |
            | We delete the existing variants and recreate
            | them from the submitted form.
            |
            | This makes the edit page much easier to manage.
            |
            */

            $product
                ->productVariants()
                ->delete();


            $totalVariantQuantity = 0;

            $usedVariants = [];


            if ($request->filled('variants')) {

                foreach (
                    $request->input('variants', [])
                    as $variant
                ) {

                    $colorId =
                        !empty($variant['color_id'])
                            ? (int) $variant['color_id']
                            : null;


                    $sizeId =
                        !empty($variant['size_id'])
                            ? (int) $variant['size_id']
                            : null;


                    $quantity =
                        isset($variant['quantity'])
                            ? (int) $variant['quantity']
                            : 0;


                    /*
                    |--------------------------------------------------------------------------
                    | Skip Empty Rows
                    |--------------------------------------------------------------------------
                    */

                    if (
                        $colorId === null &&
                        $sizeId === null
                    ) {
                        continue;
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Prevent Duplicate Color + Size
                    |--------------------------------------------------------------------------
                    */

                    $variantKey =
                        ($colorId ?? 'null')
                        . '-'
                        . ($sizeId ?? 'null');


                    if (
                        isset(
                            $usedVariants[$variantKey]
                        )
                    ) {
                        continue;
                    }


                    $usedVariants[$variantKey] = true;


                    /*
                    |--------------------------------------------------------------------------
                    | Create Variant
                    |--------------------------------------------------------------------------
                    */

                    $product
                        ->productVariants()
                        ->create([

                            'product_id' =>
                                $product->id,

                            'color_id' =>
                                $colorId,

                            'size_id' =>
                                $sizeId,

                            'quantity' =>
                                max(0, $quantity),

                        ]);


                    $totalVariantQuantity +=
                        max(0, $quantity);
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Update Total Product Quantity
            |--------------------------------------------------------------------------
            */

            if (
                $usedVariants
            ) {

                $product->quantity =
                    $totalVariantQuantity;

                $product->save();
            }


            DB::commit();


            return redirect('/admin/products')
                ->with(
                    'message',
                    'Product Updated Successfully'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->withErrors([
                    'error' =>
                        'Something went wrong while updating the product.'
                ])
                ->withInput();
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Product Image
    |--------------------------------------------------------------------------
    */

    public function destroyImage(
        int $product_image_id
    ) {

        $productImage =
            ProductImage::findOrFail(
                $product_image_id
            );


        if (
            $productImage->image &&
            File::exists(
                public_path(
                    $productImage->image
                )
            )
        ) {

            File::delete(
                public_path(
                    $productImage->image
                )
            );
        }


        $productImage->delete();


        return redirect()
            ->back()
            ->with(
                'message',
                'Product Image Deleted'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Product
    |--------------------------------------------------------------------------
    */

    public function destroy(
        int $product_id
    ) {

        $product =
            Product::with([
                'productImages',
                'productVariants',
            ])->findOrFail(
                $product_id
            );


        /*
        |--------------------------------------------------------------------------
        | Delete Product Images From Storage
        |--------------------------------------------------------------------------
        */

        foreach (
            $product->productImages
            as $image
        ) {

            if (
                $image->image &&
                File::exists(
                    public_path(
                        $image->image
                    )
                )
            ) {

                File::delete(
                    public_path(
                        $image->image
                    )
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Product Variants
        |--------------------------------------------------------------------------
        */

        $product
            ->productVariants()
            ->delete();


        /*
        |--------------------------------------------------------------------------
        | Delete Old Product Colors
        |--------------------------------------------------------------------------
        |
        | This is only here for old records from your
        | previous ProductColor system.
        |
        */

        if (
            method_exists(
                $product,
                'productColors'
            )
        ) {

            $product
                ->productColors()
                ->delete();
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Product
        |--------------------------------------------------------------------------
        */

        $product->delete();


        return redirect()
            ->back()
            ->with(
                'message',
                'Product Deleted with all its images and variants'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Product Variant Quantity
    |--------------------------------------------------------------------------
    */

    public function updateProdVariantQty(
        Request $request,
        int $variant_id
    ) {

        $variant =
            ProductVariant::where(
                'id',
                $variant_id
            )
            ->where(
                'product_id',
                $request->product_id
            )
            ->firstOrFail();


        $quantity =
            max(
                0,
                (int) $request->qty
            );


        $variant->update([

            'quantity' =>
                $quantity,

        ]);


        /*
        |--------------------------------------------------------------------------
        | Recalculate Product Total Quantity
        |--------------------------------------------------------------------------
        */

        $product =
            Product::findOrFail(
                $request->product_id
            );


        $product->quantity =
            $product
                ->productVariants()
                ->sum('quantity');


        $product->save();


        return response()->json([

            'message' =>
                'Product Variant Quantity Updated',

            'quantity' =>
                $quantity,

            'total_quantity' =>
                $product->quantity,

        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Product Variant
    |--------------------------------------------------------------------------
    */

    public function deleteProdVariant(
        int $variant_id
    ) {

        $variant =
            ProductVariant::findOrFail(
                $variant_id
            );


        $productId =
            $variant->product_id;


        $variant->delete();


        /*
        |--------------------------------------------------------------------------
        | Recalculate Product Quantity
        |--------------------------------------------------------------------------
        */

        $product =
            Product::findOrFail(
                $productId
            );


        $product->quantity =
            $product
                ->productVariants()
                ->sum('quantity');


        $product->save();


        return response()->json([

            'message' =>
                'Product Variant Deleted',

            'total_quantity' =>
                $product->quantity,

        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Generate Unique Product Slug
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug(
        string $name,
        ?int $ignoreProductId = null
    ): string {

        /*
        |--------------------------------------------------------------------------
        | Convert Product Name To Slug
        |--------------------------------------------------------------------------
        |
        | Example:
        |
        | Diamond Necklace
        |
        | becomes:
        |
        | diamond-necklace
        |
        */

        $baseSlug =
            Str::slug($name);


        if (
            empty($baseSlug)
        ) {

            $baseSlug =
                'product';
        }


        $slug =
            $baseSlug;


        $counter = 2;


        while (

            Product::where(
                'slug',
                $slug
            )

            ->when(

                $ignoreProductId,

                function ($query)
                use ($ignoreProductId) {

                    $query->where(
                        'id',
                        '!=',
                        $ignoreProductId
                    );
                }

            )

            ->exists()

        ) {

            $slug =
                $baseSlug
                . '-'
                . $counter;


            $counter++;
        }


        return $slug;
    }
}