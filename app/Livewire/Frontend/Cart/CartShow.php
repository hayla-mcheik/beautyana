<?php
namespace App\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Product;
use App\Helpers\CartHelper;

class CartShow extends Component
{
    public $cartItems = [];
    public $totalPrice = 0;

    protected $listeners = [
        'CartAddedUpdated' => 'loadCart',
        'cartUpdated' => 'loadCart' // Listen for cart updates from other components
    ];

    public function mount()
    {
        $this->loadCart();
    }

public function loadCart()
{
    $items = [];

    if (auth()->check()) {

        $dbCarts = \App\Models\Cart::where('user_id', auth()->id())
            ->with('product.productImages', 'product.category')
            ->get();

        foreach ($dbCarts as $cart) {

            // Remove deleted, hidden or out-of-stock products
            if (
                !$cart->product ||
                $cart->product->status != '0' ||
                $cart->product->quantity <= 0
            ) {
                $cart->delete();
                continue;
            }

            // Adjust quantity if stock has decreased
            if ($cart->quantity > $cart->product->quantity) {

                $cart->update([
                    'quantity' => $cart->product->quantity
                ]);

                $cart->refresh();
            }

            $items[] = [
                'id' => $cart->id,
                'product_id' => $cart->product->id,
                'name' => $cart->product->name,
                'slug' => $cart->product->slug,
                'price' => $cart->product->selling_price,
                'quantity' => $cart->quantity,
                'image' => $cart->product->productImages->first()->image ?? null,
                'category_slug' => $cart->product->category->slug ?? 'all'
            ];
        }

    } else {

        $guestCart = CartHelper::getGuestCart();

        foreach ($guestCart as $productId => $data) {

            $product = Product::with('productImages', 'category')->find($productId);

            // Remove invalid products
            if (
                !$product ||
                $product->status != '0' ||
                $product->quantity <= 0
            ) {
                unset($guestCart[$productId]);
                continue;
            }

            // Adjust quantity if stock has decreased
            if ($data['quantity'] > $product->quantity) {

                $guestCart[$productId]['quantity'] = $product->quantity;
            }

            $items[] = [
                'id' => $productId,
                'product_id' => $productId,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->selling_price,
                'quantity' => $guestCart[$productId]['quantity'],
                'image' => $product->productImages->first()->image ?? null,
                'category_slug' => $product->category->slug ?? 'all'
            ];
        }

        // Save cleaned guest cart
        CartHelper::setGuestCart($guestCart);
    }

    $this->cartItems = $items;

    $this->calculateTotal();
}

    public function calculateTotal()
    {
        $this->totalPrice = collect($this->cartItems)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
    }

 public function updateQuantity($productId, $action)
{
    if (auth()->check()) {

        $cart = \App\Models\Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->first();

        if ($cart) {

            if ($action === 'increase') {

                // Product out of stock
                if ($cart->product->quantity <= 0) {

                    $this->dispatch(
                        'message',
                        text: 'This product is currently out of stock.',
                        type: 'warning',
                        status: 200
                    );

                    return;
                }

                // Maximum quantity reached
                if ($cart->quantity >= $cart->product->quantity) {

                    $this->dispatch(
                        'message',
                        text: "Maximum available quantity is {$cart->product->quantity}.",
                        type: 'warning',
                        status: 200
                    );

                    return;
                }

                $cart->increment('quantity');

            } elseif ($action === 'decrease' && $cart->quantity > 1) {

                $cart->decrement('quantity');

            }
        }

    } else {

        $guestCart = CartHelper::getGuestCart();
        $product = Product::find($productId);

        if (isset($guestCart[$productId]) && $product) {

            if ($action === 'increase') {

                // Product out of stock
                if ($product->quantity <= 0) {

                    $this->dispatch(
                        'message',
                        text: 'This product is currently out of stock.',
                        type: 'warning',
                        status: 200
                    );

                    return;
                }

                // Maximum quantity reached
                if ($guestCart[$productId]['quantity'] >= $product->quantity) {

                    $this->dispatch(
                        'message',
                        text: "Maximum available quantity is {$product->quantity}.",
                        type: 'warning',
                        status: 200
                    );

                    return;
                }

                $guestCart[$productId]['quantity']++;

            } elseif ($action === 'decrease' && $guestCart[$productId]['quantity'] > 1) {

                $guestCart[$productId]['quantity']--;

            }

            CartHelper::setGuestCart($guestCart);
        }
    }

    // Reload cart
    $this->loadCart();

    // Update header/cart icon
    $this->dispatch(
        'cartUpdated',
        total: $this->totalPrice,
        count: count($this->cartItems)
    );
}
 public function removeItem($productId)
{
    if (auth()->check()) {
        \App\Models\Cart::where('user_id', auth()->id())
            ->where('product_id', $productId)
            ->delete();
    } else {
        CartHelper::removeItem($productId);
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
    public function clearCart()
{
    if (auth()->check()) {
        \App\Models\Cart::where('user_id', auth()->id())->delete();
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
    public function render()
    {
        return view('livewire.frontend.cart.cart-show', [
            'items' => $this->cartItems,
            'total' => $this->totalPrice
        ]);
    }
}