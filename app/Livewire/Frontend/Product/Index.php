<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Wishlist;
use App\Models\Cart;

class Index extends Component
{
    use WithPagination;
    
public $category;
public $collections;
public $highJewelry;
public $adSignature;
    public $brandInputs = [], $priceInput;
    public $perPage = 12;
    
    
    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];

public function mount(
    $category,
    $collections,
    $highJewelry,
    $adSignature
){
    $this->category = $category;
    $this->collections = $collections;
    $this->highJewelry = $highJewelry;
    $this->adSignature = $adSignature;
}

    /* ---------------- Wishlist ---------------- */

    public function addToWishList($productId)
    {
        if (!Auth::check()) {
            $this->dispatch(
                'message',
                text: 'Please Login to Continue',
                type: 'info',
                status: 401
            );
            return;
        }

        if (Wishlist::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->exists()) {

            $this->dispatch(
                'message',
                text: 'Already added to wishlist',
                type: 'warning',
                status: 409
            );
            return;
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
        ]);

        $this->dispatch('wishlistAddedUpdated');

        $this->dispatch(
            'message',
            text: 'Wishlist Added successfully',
            type: 'success',
            status: 200
        );
    }

    /* ---------------- Cart ---------------- */

    public function addToCart(int $productId)
    {
        if (!Auth::check()) {
            $this->dispatch(
                'message',
                text: 'Please Login to add to cart',
                type: 'info',
                status: 401
            );
            return;
        }

        if (Auth::user()->role_as == '1') {
            $this->dispatch(
                'message',
                text: 'Only User can add to cart',
                type: 'warning',
                status: 200
            );
            return;
        }

        $product = Product::where('id', $productId)
            ->where('status', '0')
            ->first();

        if (!$product) {
            $this->dispatch(
                'message',
                text: 'Product Does not exist',
                type: 'warning',
                status: 404
            );
            return;
        }

        if (Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->exists()) {

            $this->dispatch(
                'message',
                text: 'Product Already Added',
                type: 'warning',
                status: 200
            );
            return;
        }

        if ($product->quantity <= 0) {
            $this->dispatch(
                'message',
                text: 'Out of Stock',
                type: 'warning',
                status: 404
            );
            return;
        }

        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'quantity' => 1,
        ]);

        $this->dispatch('CartAddedUpdated');

        $this->dispatch(
            'message',
            text: 'Product Added to Cart',
            type: 'success',
            status: 200
        );
    }

    public function render()
    {
        $products = Product::where('category_id', $this->category->id)
            ->when($this->brandInputs, fn ($q) =>
                $q->whereIn('brand', $this->brandInputs)
            )
            ->when($this->priceInput, function ($q) {
                $q->when(
                    $this->priceInput === 'high-to-low',
                    fn ($q2) => $q2->orderBy('selling_price', 'DESC')
                )->when(
                    $this->priceInput === 'low-to-high',
                    fn ($q2) => $q2->orderBy('selling_price', 'ASC')
                );
            })
            ->where('status', '0')
            ->paginate($this->perPage);

        return view('livewire.frontend.product.index', [
            'products' => $products,
            'category' => $this->category,
        ]);
    }
}