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
                'message',
                text: 'Product not found.',
                type: 'warning',
                status: 404
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
                'message',
                text: 'This product is not available.',
                type: 'warning',
                status: 400
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
                'message',
                text: 'Administrators cannot add products to cart.',
                type: 'warning',
                status: 400
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Quantity
        |--------------------------------------------------------------------------
        */

        $quantity = max(1, (int) $this->quantity);

        /*
        |--------------------------------------------------------------------------
        | Product Has Variants
        |--------------------------------------------------------------------------
        */

        if ($product->productVariants()->exists() && !$this->variantId) {
            $this->dispatch(
                'message',
                text: 'Please select an available product option.',
                type: 'warning',
                status: 400
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Variant Product
        |--------------------------------------------------------------------------
        */

        $variant = null;

        if ($this->variantId) {

            $variant = ProductVariant::where('id', $this->variantId)
                ->where('product_id', $productId)
                ->first();

            if (!$variant) {
                $this->dispatch(
                    'message',
                    text: 'Please select a valid product variant.',
                    type: 'warning',
                    status: 400
                );

                return;
            }

            if ((int) $variant->quantity <= 0) {
                $this->dispatch(
                    'message',
                    text: 'This variant is out of stock.',
                    type: 'warning',
                    status: 404
                );

                return;
            }

            /*
            |--------------------------------------------------------------------------
            | Limit Quantity To Variant Stock
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
                    'message',
                    text: 'Unable to add this product to cart.',
                    type: 'warning',
                    status: 400
                );

                return;
            }

            $this->dispatch('CartAddedUpdated');
            $this->dispatch('cartUpdated');

            $this->dispatch(
                'message',
                text: 'Product added to cart successfully.',
                type: 'success',
                status: 200
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
        | Maximum Stock
        |--------------------------------------------------------------------------
        */

        $maxQuantity = (int) $product->quantity;

        if ($variant) {
            $maxQuantity = (int) $variant->quantity;
        }

        /*
        |--------------------------------------------------------------------------
        | Existing Cart Item
        |--------------------------------------------------------------------------
        */

        if ($cart) {

            $newQuantity = min(
                (int) $cart->quantity + $quantity,
                $maxQuantity
            );

            $cart->update([
                'quantity' => $newQuantity,
            ]);

            $this->dispatch(
                'message',
                text: 'Product quantity updated in cart.',
                type: 'success',
                status: 200
            );

        } else {

            /*
            |--------------------------------------------------------------------------
            | New Cart Item
            |--------------------------------------------------------------------------
            */

            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $productId,
                'product_variant_id' => $this->variantId,
                'quantity' => min($quantity, $maxQuantity),
            ]);

            $this->dispatch(
                'message',
                text: 'Product Added to Cart',
                type: 'success',
                status: 200
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Events
        |--------------------------------------------------------------------------
        */

        $this->dispatch('CartAddedUpdated');
        $this->dispatch('cartUpdated');
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