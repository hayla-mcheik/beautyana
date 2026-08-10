<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CaregoryFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Menu;
class CategoryController extends Controller
{
public function index()
{
    $menus = Menu::where('status', 1)
        ->orderBy('sort_order')
        ->get();

    $query = Category::query();

    if (request('menu')) {
        $query->where('menu_id', request('menu'));
    }

    $categories = $query->with('menu')->get();

    return view('admin.category.index', compact('categories', 'menus'));
}


public function create()
{
    $menus = Menu::where('status', 1)
        ->orderBy('sort_order')
        ->get();
$categories = Category::whereNull('parent_id')->get();

    return view('admin.category.create', compact('menus','categories'));
}


    /*
    |--------------------------------------------------------------------------
    | Store Category
    |--------------------------------------------------------------------------
    */

    public function store(CaregoryFormRequest $request)
    {
        $validatedData = $request->validated();


        $category = new Category();


    $category->menu_id = $validatedData['menu_id'];
    $category->parent_id = $validatedData['parent_id'] ?? null;
        $category->name = $validatedData['name'];


        /*
        |--------------------------------------------------------------------------
        | Generate Unique Slug Automatically
        |--------------------------------------------------------------------------
        |
        | Example:
        |
        | Diamond Rings
        |
        | becomes:
        |
        | diamond-rings
        |
        | If diamond-rings already exists:
        |
        | diamond-rings-2
        |
        */

        $category->slug = $this->generateUniqueSlug(
            $validatedData['name']
        );


        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */

        $uploadPath = 'uploads/category/';


        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();


            /*
             * Better than time() because the filename
             * will also be unique.
             */

            $filename =
                Str::uuid()
                . '.'
                . $extension;


            $file->move(
                public_path($uploadPath),
                $filename
            );


            $category->image =
                $uploadPath . $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        |
        | Based on your current logic:
        |
        | Checked   = 0
        | Unchecked = 1
        |
        */

        $category->status =
            $request->boolean('status')
                ? '0'
                : '1';


        $category->save();


return redirect('admin/category')
    ->with(
        'message',
        'Category Added Successfully'
    );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Category
    |--------------------------------------------------------------------------
    */

public function edit(Category $category)
{
    $menus = Menu::where('status', 1)
        ->orderBy('sort_order')
        ->get();

    // 🔥 ADD THIS
    $categories = Category::whereNull('parent_id')
        ->where('id', '!=', $category->id) // avoid selecting itself
        ->get();

    return view(
        'admin.category.edit',
        compact('category', 'menus', 'categories')
    );
}


    /*
    |--------------------------------------------------------------------------
    | Update Category
    |--------------------------------------------------------------------------
    */

    public function update(
        CaregoryFormRequest $request,
        $category
    ) {

        $category = Category::findOrFail($category);


        $validatedData = $request->validated();


     $category->menu_id =
    $validatedData['menu_id'];
$category->parent_id = $validatedData['parent_id'] ?? null;
        /*
        |--------------------------------------------------------------------------
        | Update Slug Only When Name Changes
        |--------------------------------------------------------------------------
        */

        if (
            $category->name
            !==
            $validatedData['name']
        ) {

            $category->slug =
                $this->generateUniqueSlug(
                    $validatedData['name'],
                    $category->id
                );
        }


        $category->name =
            $validatedData['name'];


        /*
        |--------------------------------------------------------------------------
        | Update Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {


            /*
             * Your database stores:
             *
             * uploads/category/image.jpg
             *
             * Therefore use public_path($category->image).
             */

            if (
                $category->image
                &&
                File::exists(
                    public_path($category->image)
                )
            ) {

                File::delete(
                    public_path($category->image)
                );
            }


            $uploadPath =
                'uploads/category/';


            $file =
                $request->file('image');


            $extension =
                $file->getClientOriginalExtension();


            $filename =
                Str::uuid()
                . '.'
                . $extension;


            $file->move(
                public_path($uploadPath),
                $filename
            );


            $category->image =
                $uploadPath . $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $category->status =
            $request->boolean('status')
                ? '0'
                : '1';


        $category->save();


        /*
         * Return to the same Menu Categories page.
         */

return redirect('admin/category?menu=' . $category->menu_id)
    ->with('message', 'Category Updated Successfully');
    }


    /*
    |--------------------------------------------------------------------------
    | Generate Unique Slug
    |--------------------------------------------------------------------------
    */

    private function generateUniqueSlug(
        string $name,
        ?int $ignoreCategoryId = null
    ): string {

        /*
         * Convert:
         *
         * Diamond Rings
         *
         * to:
         *
         * diamond-rings
         */

        $baseSlug = Str::slug($name);


        /*
         * Fallback if Str::slug() returns empty.
         */

        if (empty($baseSlug)) {

            $baseSlug = 'category';
        }


        $slug = $baseSlug;

        $counter = 2;


        while (

            Category::where('slug', $slug)

                ->when(
                    $ignoreCategoryId,

                    function ($query) use (
                        $ignoreCategoryId
                    ) {

                        $query->where(
                            'id',
                            '!=',
                            $ignoreCategoryId
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