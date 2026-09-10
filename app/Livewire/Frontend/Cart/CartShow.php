<?php

namespace App\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductVariant;
use App\Helpers\CartHelper;

class CartShow extends Component
{
    public $cartItems = [];
    public $totalPrice = 0;

    protected $listeners = [
        'CartAddedUpdated' => 'loadCart',
        'cartUpdated' => 'loadCart'
    ];

    public function mount()
    {
        $this->loadCart();
    }

    /*
    |--------------------------------------------------------------------------
    | Load Cart
    |--------------------------------------------------------------------------
    */

    public function loadCart()
    {
        $items = [];

        /*
        |--------------------------------------------------------------------------
        | Logged In User
        |--------------------------------------------------------------------------
        */

        if (auth()->check()) {

            $dbCarts = Cart::where('user_id', auth()->id())
                ->with([
                    'product.productImages',
                    'product.category',
                    'productVariant.color',
                    'productVariant.size',
                ])
                ->get();

            foreach ($dbCarts as $cart) {

                $product = $cart->product;
                $variant = $cart->productVariant;

                /*
                |--------------------------------------------------------------------------
                | Invalid Product
                |--------------------------------------------------------------------------
                */

                if (
                    !$product ||
                    $product->status != '0'
                ) {
                    $cart->delete();
                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Variant Cart Item
                |--------------------------------------------------------------------------
                */

                if ($cart->product_variant_id) {

                    if (
                        !$variant ||
                        $variant->product_id != $product->id ||
                        $variant->quantity <= 0
                    ) {
                        $cart->delete();
                        continue;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Adjust Quantity According To Variant Stock
                    |--------------------------------------------------------------------------
                    */

                    if ($cart->quantity > $variant->quantity) {

                        $cart->update([
                            'quantity' => $variant->quantity
                        ]);

                        $cart->refresh();
                    }

                    $items[] = [
                        'id' => $cart->id,
                        'cart_id' => $cart->id,

                        'product_id' => $product->id,
                        'variant_id' => $variant->id,

                        'name' => $product->name,
                        'slug' => $product->slug,

                        'price' => $product->selling_price,
                        'quantity' => $cart->quantity,

                        'image' =>
                            $variant->image
                            ?: ($product->productImages->first()->image ?? null),

                        'color' =>
                            $variant->color->name ?? null,

                        'size' =>
                            $variant->size->name ?? null,

                        'stock' =>
                            (int) $variant->quantity,

                        'category_slug' =>
                            $product->category->slug ?? 'all',
                    ];

                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Normal Product Without Variant
                |--------------------------------------------------------------------------
                */

                if ($product->quantity <= 0) {

                    $cart->delete();
                    continue;
                }

                if ($cart->quantity > $product->quantity) {

                    $cart->update([
                        'quantity' => $product->quantity
                    ]);

                    $cart->refresh();
                }

                $items[] = [
                    'id' => $cart->id,
                    'cart_id' => $cart->id,

                    'product_id' => $product->id,
                    'variant_id' => null,

                    'name' => $product->name,
                    'slug' => $product->slug,

                    'price' => $product->selling_price,
                    'quantity' => $cart->quantity,

                    'image' =>
                        $product->productImages->first()->image ?? null,

                    'color' => null,
                    'size' => null,

                    'stock' => (int) $product->quantity,

                    'category_slug' =>
                        $product->category->slug ?? 'all',
                ];
            }

        }

        /*
        |--------------------------------------------------------------------------
        | Guest User
        |--------------------------------------------------------------------------
        */

        else {

            $guestCart = CartHelper::getGuestCart();

            foreach ($guestCart as $cartKey => $data) {

                $productId = $data['product_id'] ?? null;
                $variantId = $data['variant_id'] ?? null;

                if (!$productId) {
                    unset($guestCart[$cartKey]);
                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Load Product
                |--------------------------------------------------------------------------
                */

                $product = Product::with([
                    'productImages',
                    'category',
                ])->find($productId);

                /*
                |--------------------------------------------------------------------------
                | Invalid Product
                |--------------------------------------------------------------------------
                */

                if (
                    !$product ||
                    $product->status != '0'
                ) {
                    unset($guestCart[$cartKey]);
                    continue;
                }

                /*
                |--------------------------------------------------------------------------
                | Variant
                |--------------------------------------------------------------------------
                */

                $variant = null;

                if ($variantId) {

                    $variant = ProductVariant::with([
                        'color',
                        'size',
                    ])
                    ->where('id', $variantId)
                    ->where('product_id', $productId)
                    ->first();

                    if (
                        !$variant ||
                        $variant->quantity <= 0
                    ) {
                        unset($guestCart[$cartKey]);
                        continue;
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Adjust Quantity According To Variant Stock
                    |--------------------------------------------------------------------------
                    */

                    if ($data['quantity'] > $variant->quantity) {

                        $guestCart[$cartKey]['quantity'] =
                            $variant->quantity;
                    }

                } else {

                    /*
                    |--------------------------------------------------------------------------
                    | Normal Product
                    |--------------------------------------------------------------------------
                    */

                    if ($product->quantity <= 0) {

                        unset($guestCart[$cartKey]);
                        continue;
                    }

                    if ($data['quantity'] > $product->quantity) {

                        $guestCart[$cartKey]['quantity'] =
                            $product->quantity;
                    }
                }

                /*
                |--------------------------------------------------------------------------
                | Add Cart Item
                |--------------------------------------------------------------------------
                */

                $items[] = [
                    'id' => $cartKey,
                    'cart_id' => $cartKey,

                    'product_id' => $product->id,
                    'variant_id' => $variant?->id,

                    'name' => $product->name,
                    'slug' => $product->slug,

                    'price' => $product->selling_price,

                    'quantity' =>
                        $guestCart[$cartKey]['quantity'],

                    'image' =>
                        $variant?->image
                        ?: ($product->productImages->first()->image ?? null),

                    'color' =>
                        $variant?->color?->name,

                    'size' =>
                        $variant?->size?->name,

                    'stock' =>
                        $variant
                        ? (int) $variant->quantity
                        : (int) $product->quantity,

                    'category_slug' =>
                        $product->category->slug ?? 'all',
                ];
            }

            /*
            |--------------------------------------------------------------------------
            | Save Cleaned Guest Cart
            |--------------------------------------------------------------------------
            */

            CartHelper::setGuestCart($guestCart);
        }

        $this->cartItems = $items;

        $this->calculateTotal();
    }

    /*
    |--------------------------------------------------------------------------
    | Calculate Total
    |--------------------------------------------------------------------------
    */

    public function calculateTotal()
    {
        $this->totalPrice = collect($this->cartItems)
            ->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            });
    }

    /*
    |--------------------------------------------------------------------------
    | Update Quantity
    |--------------------------------------------------------------------------
    */

    public function updateQuantity($cartId, $action)
    {
        /*
        |--------------------------------------------------------------------------
        | Logged In User
        |--------------------------------------------------------------------------
        */

        if (auth()->check()) {

            $cart = Cart::where('user_id', auth()->id())
                ->where('id', $cartId)
                ->with('productVariant')
                ->first();

            if (!$cart) {
                return;
            }

            /*
            |--------------------------------------------------------------------------
            | Determine Stock
            |--------------------------------------------------------------------------
            */

            if ($cart->product_variant_id) {

                $stock = $cart->productVariant
                    ? (int) $cart->productVariant->quantity
                    : 0;

            } else {

                $stock = $cart->product
                    ? (int) $cart->product->quantity
                    : 0;
            }

            /*
            |--------------------------------------------------------------------------
            | Increase
            |--------------------------------------------------------------------------
            */

            if ($action === 'increase') {

                if ($stock <= 0) {

                    $this->dispatch(
                        'message',
                        text: 'This item is currently out of stock.',
                        type: 'warning',
                        status: 200
                    );

                    return;
                }

                if ($cart->quantity >= $stock) {

                    $this->dispatch(
                        'message',
                        text: "Maximum available quantity is {$stock}.",
                        type: 'warning',
                        status: 200
                    );

                    return;
                }

                $cart->increment('quantity');
            }

            /*
            |--------------------------------------------------------------------------
            | Decrease
            |--------------------------------------------------------------------------
            */

            elseif (
                $action === 'decrease' &&
                $cart->quantity > 1
            ) {

                $cart->decrement('quantity');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Guest User
        |--------------------------------------------------------------------------
        */

        else {

            $guestCart = CartHelper::getGuestCart();

            if (!isset($guestCart[$cartId])) {
                return;
            }

            $data = $guestCart[$cartId];

            $productId = $data['product_id'] ?? null;
            $variantId = $data['variant_id'] ?? null;

            if (!$productId) {
                return;
            }

            /*
            |--------------------------------------------------------------------------
            | Determine Stock
            |--------------------------------------------------------------------------
            */

            if ($variantId) {

                $variant = ProductVariant::find($variantId);

                if (!$variant) {

                    unset($guestCart[$cartId]);
                    CartHelper::setGuestCart($guestCart);

                    $this->loadCart();

                    return;
                }

                $stock = (int) $variant->quantity;

            } else {

                $product = Product::find($productId);

                if (!$product) {

                    unset($guestCart[$cartId]);
                    CartHelper::setGuestCart($guestCart);

                    $this->loadCart();

                    return;
                }

                $stock = (int) $product->quantity;
            }

            /*
            |--------------------------------------------------------------------------
            | Increase
            |--------------------------------------------------------------------------
            */

            if ($action === 'increase') {

                if ($stock <= 0) {

                    $this->dispatch(
                        'message',
                        text: 'This item is currently out of stock.',
                        type: 'warning',
                        status: 200
                    );

                    return;
                }

                if ($guestCart[$cartId]['quantity'] >= $stock) {

                    $this->dispatch(
                        'message',
                        text: "Maximum available quantity is {$stock}.",
                        type: 'warning',
                        status: 200
                    );

                    return;
                }

                $guestCart[$cartId]['quantity']++;
            }

            /*
            |--------------------------------------------------------------------------
            | Decrease
            |--------------------------------------------------------------------------
            */

            elseif (
                $action === 'decrease' &&
                $guestCart[$cartId]['quantity'] > 1
            ) {

                $guestCart[$cartId]['quantity']--;
            }

            CartHelper::setGuestCart($guestCart);
        }

        /*
        |--------------------------------------------------------------------------
        | Reload Cart
        |--------------------------------------------------------------------------
        */

        $this->loadCart();

        $this->dispatch(
            'cartUpdated',
            total: $this->totalPrice,
            count: count($this->cartItems)
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Remove Item
    |--------------------------------------------------------------------------
    */

    public function removeItem($cartId)
    {
        if (auth()->check()) {

            Cart::where('user_id', auth()->id())
                ->where('id', $cartId)
                ->delete();

        } else {

            CartHelper::removeItem($cartId);
        }

        $this->loadCart();

        $this->dispatch(
            'cartUpdated',
            total: $this->totalPrice,
            count: count($this->cartItems)
        );

        $this->dispatch(
            'message',
            text: 'Product removed from cart.',
            type: 'success',
            status: 200
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Clear Cart
    |--------------------------------------------------------------------------
    */

    public function clearCart()
    {
        if (auth()->check()) {

            Cart::where('user_id', auth()->id())
                ->delete();

        } else {

            CartHelper::setGuestCart([]);
        }

        $this->loadCart();

        $this->dispatch(
            'cartUpdated',
            total: $this->totalPrice,
            count: count($this->cartItems)
        );

        $this->dispatch(
            'message',
            text: 'Cart cleared successfully.',
            type: 'success',
            status: 200
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Render
    |--------------------------------------------------------------------------
    */

    public function render()
    {
        return view('livewire.frontend.cart.cart-show', [
            'items' => $this->cartItems,
            'total' => $this->totalPrice
        ]);
    }
}