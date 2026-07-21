<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public $menu = '';



    /*
    |--------------------------------------------------------------------------
    | Mount Component
    |--------------------------------------------------------------------------
    */

    public function mount()
    {
        $this->menu = request()->query('menu', '');
    }



    /*
    |--------------------------------------------------------------------------
    | Select Category For Delete
    |--------------------------------------------------------------------------
    */

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }



    /*
    |--------------------------------------------------------------------------
    | Delete Category
    |--------------------------------------------------------------------------
    */

    public function destroyCategory()
    {
        $category = Category::find($this->category_id);

        if (!$category) {

            session()->flash(
                'message',
                'Category not found.'
            );

            $this->dispatch('close-modal');

            return;
        }


        /*
         * Your category->image already contains:
         *
         * uploads/category/image.jpg
         *
         * Therefore, do NOT add uploads/category/ again.
         */

        if (
            $category->image &&
            File::exists(public_path($category->image))
        ) {

            File::delete(public_path($category->image));
        }


        $category->delete();


        $this->category_id = null;


        session()->flash(
            'message',
            'Category Deleted Successfully'
        );


        $this->dispatch('close-modal');


        /*
         * Important when deleting the last record
         * from a pagination page.
         */

        $this->resetPage();
    }



    /*
    |--------------------------------------------------------------------------
    | Render
    |--------------------------------------------------------------------------
    */

    public function render()
    {
        $categories = Category::query()

            ->when(
                !empty($this->menu),

                function ($query) {

                    $query->where(
                        'menu',
                        $this->menu
                    );
                }
            )

            ->orderBy('name', 'ASC')

            ->paginate(10);


        return view(
            'livewire.admin.category.index',
            [
                'categories' => $categories
            ]
        );
    }
}