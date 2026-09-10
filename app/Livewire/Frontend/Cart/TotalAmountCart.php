<?php

namespace App\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Helpers\CartHelper;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;

class TotalAmountCart extends Component
{
    public $totalcartamount = 0;

    protected $listeners = [
        'CartAddedUpdated' => 'updateTotal',
        'cartUpdated' => 'updateTotal'
    ];

    public function mount()
    {
        $this->updateTotal();
    }

    /*
    |--------------------------------------------------------------------------
    | Update Total
    |--------------------------------------------------------------------------
    */

    public function updateTotal()
    {
        $total = 0;

        /*
        |--------------------------------------------------------------------------
        | Logged In User
        |--------------------------------------------------------------------------
        */

        if (auth()->check()) {

            $carts = Cart::where('user_id', auth()->id())
                ->with([
                    'product',
                    'productVariant'
                ])
                ->get();

            foreach ($carts as $cart) {

                if (!$cart->product) {
                    continue;
                }

                $total +=
                    ($cart->product->selling_price ?? 0)
                    * $cart->quantity;
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
                $quantity = (int) ($data['quantity'] ?? 0);

                if (!$productId || $quantity <= 0) {
                    continue;
                }

                $product = Product::find($productId);

                if (!$product) {
                    continue;
                }

                $total +=
                    ($product->selling_price ?? 0)
                    * $quantity;
            }
        }

        $this->totalcartamount = $total;
    }

    /*
    |--------------------------------------------------------------------------
    | Render
    |--------------------------------------------------------------------------
    */

    public function render()
    {
        return view('livewire.frontend.cart.total-amount-cart');
    }
}