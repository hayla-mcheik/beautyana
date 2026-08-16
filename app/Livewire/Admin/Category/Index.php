<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $category_id;
    public $menu = '';

    public function mount()
    {
        $this->menu = request()->query('menu', '');
    }

    public function updatedMenu()
    {
        $this->resetPage();
    }

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }

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

        if (
            $category->children()->count() > 0
        ) {
            session()->flash(
                'message',
                'You cannot delete a category that contains subcategories.'
            );

            $this->dispatch('close-modal');

            return;
        }

        if (
            $category->image &&
            File::exists(public_path($category->image))
        ) {
            File::delete(
                public_path($category->image)
            );
        }

        $category->delete();

        session()->flash(
            'message',
            'Category deleted successfully.'
        );

        $this->dispatch('close-modal');

        $this->resetPage();
    }

    public function render()
    {
$categories = Category::with('menu')
    ->when($this->menu, function ($query) {
        $query->where('menu_id', $this->menu);
    })
    ->orderBy('id', 'DESC')
    ->paginate(10);

dd($categories->first()->toArray());
    }
}