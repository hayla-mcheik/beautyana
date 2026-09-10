<?php

namespace App\Livewire\Frontend\Cart;

use App\Helpers\CartHelper;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;
use Livewire\Component;
use Livewire\Attributes\Reactive;

class AddToCart extends Component
{
    public $product;
#[Reactive]
public $variantId = null;

#[Reactive]
public $quantity = 1;
    /*
    |--------------------------------------------------------------------------
    | Mount
    |--------------------------------------------------------------------------
    */

    public function mount($product, $variantId = null, $quantity = 1)
    {
        $this->product = $product;
        $this->variantId = $variantId;
        $this->quantity = $quantity;
    }

    /*
    |--------------------------------------------------------------------------
    | Add To Cart
    |--------------------------------------------------------------------------
    */

    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            $this->dispatch(
                'cartMessage',
                message: 'Product not found.'
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Product Status
        |--------------------------------------------------------------------------
        */

        if ($product->status != '0') {

            $this->dispatch(
                'cartMessage',
                message: 'This product is not available.'
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Admin Check
        |--------------------------------------------------------------------------
        */

        if (auth()->check() && auth()->user()->is_admin) {

            $this->dispatch(
                'cartMessage',
                message: 'Administrators cannot add products to cart.'
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Quantity
        |--------------------------------------------------------------------------
        */

        $quantity = max(1, (int) $this->quantity);
if ($product->productVariants()->exists() && !$this->variantId) {

    $this->dispatch(
        'cartMessage',
        message: 'Please select a color and size first.'
    );

    return;
}
        /*
        |--------------------------------------------------------------------------
        | Variant Product
        |--------------------------------------------------------------------------
        */

        if ($this->variantId) {

            $variant = ProductVariant::where('id', $this->variantId)
                ->where('product_id', $productId)
                ->first();

            if (!$variant) {

                $this->dispatch(
                    'cartMessage',
                    message: 'Please select a valid product variant.'
                );

                return;
            }

            if ($variant->quantity <= 0) {

                $this->dispatch(
                    'cartMessage',
                    message: 'This variant is out of stock.'
                );

                return;
            }

            /*
            |--------------------------------------------------------------------------
            | Make sure requested quantity doesn't exceed variant stock
            |--------------------------------------------------------------------------
            */

            $quantity = min(
                $quantity,
                (int) $variant->quantity
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Guest User
        |--------------------------------------------------------------------------
        */

        if (!auth()->check()) {

            $success = CartHelper::addItem(
                $productId,
                $this->variantId,
                $quantity
            );

            if (!$success) {

                $this->dispatch(
                    'cartMessage',
                    message: 'Unable to add this product to cart.'
                );

                return;
            }

            $this->dispatch('CartAddedUpdated');
            $this->dispatch('cartUpdated');

            $this->dispatch(
                'cartMessage',
                message: 'Product added to cart successfully.'
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Logged In User
        |--------------------------------------------------------------------------
        */

        $query = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId);

        /*
        |--------------------------------------------------------------------------
        | Match Variant
        |--------------------------------------------------------------------------
        */

        if ($this->variantId) {

            $query->where(
                'product_variant_id',
                $this->variantId
            );

        } else {

            $query->whereNull('product_variant_id');
        }

        $cart = $query->first();

        /*
        |--------------------------------------------------------------------------
        | Variant Stock
        |--------------------------------------------------------------------------
        */

        $maxQuantity = $product->quantity;

        if ($this->variantId) {

            $variant = ProductVariant::find($this->variantId);

            if (!$variant) {

                $this->dispatch(
                    'cartMessage',
                    message: 'Variant not found.'
                );

                return;
            }

            $maxQuantity = (int) $variant->quantity;
        }

        /*
        |--------------------------------------------------------------------------
        | Existing Cart Item
        |--------------------------------------------------------------------------
        */

        if ($cart) {

            $newQuantity = min(
                $cart->quantity + $quantity,
                $maxQuantity
            );

            $cart->update([
                'quantity' => $newQuantity,
            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | New Cart Item
        |--------------------------------------------------------------------------
        */

        else {

            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
                'product_variant_id' => $this->variantId,
                'quantity' => min($quantity, $maxQuantity),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Events
        |--------------------------------------------------------------------------
        */

        $this->dispatch('CartAddedUpdated');
        $this->dispatch('cartUpdated');

        $this->dispatch(
            'cartMessage',
            message: 'Product added to cart successfully.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Render
    |--------------------------------------------------------------------------
    */

    public function render()
    {
        return view('livewire.frontend.cart.add-to-cart');
    }
}