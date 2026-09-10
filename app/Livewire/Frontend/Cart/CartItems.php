<?php

namespace App\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductVariant;
use App\Helpers\CartHelper;

class CartItems extends Component
{
    public $cartData = [];
    public $total = 0;
    public $count = 0;

    protected $listeners = [
        'CartAddedUpdated' => 'loadCart',
        'cartUpdated' => 'handleCartUpdate'
    ];

    public function mount()
    {
        $this->loadCart();
    }

    /*
    |--------------------------------------------------------------------------
    | Handle Cart Update
    |--------------------------------------------------------------------------
    */

    public function handleCartUpdate($total = null, $count = null)
    {
        if ($total !== null) {
            $this->total = $total;
            $this->count = $count;

            $this->loadCartData();
        } else {
            $this->loadCart();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Load Cart
    |--------------------------------------------------------------------------
    */

    public function loadCart()
    {
        $this->loadCartData();
        $this->calculateTotals();

        $this->dispatch(
            'cartUpdated',
            total: $this->total,
            count: $this->count
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Load Cart Data
    |--------------------------------------------------------------------------
    */

    public function loadCartData()
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
                    | Adjust Quantity Based On Variant Stock
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

                        'image' => $variant->image
                            ?: ($product->productImages->first()->image ?? null),

                        'color' => $variant->color->name ?? null,
                        'size' => $variant->size->name ?? null,

                        'category_slug' =>
                            $product->category->slug ?? 'all'
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

                    'category_slug' =>
                        $product->category->slug ?? 'all'
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
                    'category'
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
                        'size'
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
                    | Adjust Quantity Based On Variant Stock
                    |--------------------------------------------------------------------------
                    */

                    if ($data['quantity'] > $variant->quantity) {

                        $guestCart[$cartKey]['quantity'] =
                            $variant->quantity;
                    }

                }

                /*
                |--------------------------------------------------------------------------
                | Normal Product
                |--------------------------------------------------------------------------
                */

                else {

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
                | Add Item
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

                    'category_slug' =>
                        $product->category->slug ?? 'all'
                ];
            }

            /*
            |--------------------------------------------------------------------------
            | Save Cleaned Guest Cart
            |--------------------------------------------------------------------------
            */

            CartHelper::setGuestCart($guestCart);
        }

        $this->cartData = $items;
    }

    /*
    |--------------------------------------------------------------------------
    | Calculate Totals
    |--------------------------------------------------------------------------
    */

    public function calculateTotals()
    {
        $this->total = collect($this->cartData)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $this->count = count($this->cartData);

        \Log::info('CartItems totals calculated', [
            'total' => $this->total,
            'count' => $this->count,
            'items' => $this->cartData
        ]);
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

            $cart = CartHelper::getGuestCart();

            if (isset($cart[$cartId])) {

                unset($cart[$cartId]);

                CartHelper::setGuestCart($cart);
            }
        }

        $this->loadCart();
    }

    /*
    |--------------------------------------------------------------------------
    | Render
    |--------------------------------------------------------------------------
    */

    public function render()
    {
        return view('livewire.frontend.cart.cart-items', [
            'items' => $this->cartData,
            'total' => $this->total,
            'count' => $this->count
        ]);
    }
}