<?php

namespace App\Livewire\Frontend\Product;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Cart;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $productColorId, $selectedImageIndex = 0;

    public function selectImage($index)
    {
        $this->selectedImageIndex = $index;
    }

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Already added to wishlist');

                $this->dispatch('message', 
                    text: 'Already added to wishlist',
                    type: 'warning',
                    status: 409
                );
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                $this->dispatch('wishlistAddedUpdated');
                session()->flash('message', 'Wishlist Added successfully');

                $this->dispatch('message', 
                    text: 'Wishlist Added successfully',
                    type: 'success',
                    status: 200
                );
            }
        } else {
            session()->flash('message', 'Please Login to Continue');

            $this->dispatch('message', 
                text: 'Please Login to Continue',
                type: 'info',
                status: 401
            );
            return false;
        }
    }

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity ?? 0;

        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'outOfStock';
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            if (Auth::user()->role_as == '1') {
                $this->dispatch('message', 
                    text: 'Only User can add to cart',
                    type: 'warning',
                    status: 200
                );  
                return;
            }

            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                    $this->dispatch('message', 
                        text: 'Product Already Added',
                        type: 'warning',
                        status: 200
                    );
                } else {
                    if ($this->product->quantity > 0) {
                        if ($this->product->quantity >= $this->quantityCount) {
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'quantity' => $this->quantityCount,
                            ]);
                            $this->dispatch('CartAddedUpdated');
                            $this->dispatch('message', 
                                text: 'Product Added to Cart',
                                type: 'success',
                                status: 200
                            );
                        } else {
                            $this->dispatch('message', 
                                text: 'Only ' . $this->product->quantity . ' Quantity Available',
                                type: 'warning',
                                status: 404
                            );
                        }
                    } else {
                        $this->dispatch('message', 
                            text: 'Out of Stock',
                            type: 'warning',
                            status: 404
                        );
                    }
                }
            } else {
                $this->dispatch('message', 
                    text: 'Product Does not exist',
                    type: 'warning',
                    status: 404
                );
            }
        } else {
            $this->dispatch('message', 
                text: 'Please Login to add to cart',
                type: 'info',
                status: 401
            );
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}