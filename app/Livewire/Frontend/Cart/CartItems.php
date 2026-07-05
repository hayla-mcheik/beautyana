<?php
namespace App\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Product;
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

    public function handleCartUpdate($total, $count)
    {
        // If we receive the total from the event, use it directly
        if ($total !== null) {
            $this->total = $total;
            $this->count = $count;
            // Still reload cart data to ensure items are correct
            $this->loadCartData();
        } else {
            // Fallback to full reload
            $this->loadCart();
        }
    }

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

public function loadCartData()
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

            // Adjust quantity if stock has changed
            if ($cart->quantity > $cart->product->quantity) {

                $cart->update([
                    'quantity' => $cart->product->quantity
                ]);

                $cart->refresh();
            }

            $items[] = [
                'id' => $cart->product->id,
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

            // Adjust guest cart quantity
            if ($data['quantity'] > $product->quantity) {

                $guestCart[$productId]['quantity'] = $product->quantity;
            }

            $items[] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->selling_price,
                'quantity' => $guestCart[$productId]['quantity'],
                'image' => $product->productImages->first()->image ?? null,
                'category_slug' => $product->category->slug ?? 'all'
            ];
        }

        // Save updated guest cart
        CartHelper::setGuestCart($guestCart);
    }

    $this->cartData = $items;
}

    public function calculateTotals()
    {
        $this->total = collect($this->cartData)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        $this->count = count($this->cartData);
        
        // Log for debugging (remove in production)
        \Log::info('CartItems totals calculated', [
            'total' => $this->total,
            'count' => $this->count,
            'items' => $this->cartData
        ]);
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
        
        $this->loadCart(); // This will recalculate and dispatch events
    }

    public function render()
    {
        return view('livewire.frontend.cart.cart-items', [
            'items' => $this->cartData,
            'total' => $this->total,
            'count' => $this->count
        ]);
    }
}