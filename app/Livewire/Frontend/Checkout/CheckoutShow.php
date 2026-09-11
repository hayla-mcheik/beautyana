<?php

namespace App\Livewire\Frontend\Checkout;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\PromoCode;
use App\Models\ProductVariant;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Mail\PlaceOrderMailable;
use Illuminate\Support\Facades\Mail;
use App\Helpers\CartHelper;
use Illuminate\Support\Facades\DB;

class CheckoutShow extends Component
{
    public $carts;

    public $totalProductAmount = 0;

    public $fullname;
    public $phone;
    public $address;
    public $email;

    public $payment_mode = null;
    public $payment_id = null;

    public $promoCode;
    public $promoCodeApplied = false;

    public $isPersonalInfoValid = false;


    /*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    */

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'phone' => 'required|string|max:15|min:8',
            'address' => 'required|string|max:500',
            'email' => 'nullable|email|max:255',
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Mount
    |--------------------------------------------------------------------------
    */

    public function mount()
    {
        if (auth()->check()) {

            $user = auth()->user();

            $this->fullname = $user->name;

            $this->email = $user->email;

            if ($user->userDetail) {

                $this->phone = $user->userDetail->phone;

                $this->address = $user->userDetail->address;
            }
        }

        $this->calculateTotal();
    }


    /*
    |--------------------------------------------------------------------------
    | Validate Personal Information
    |--------------------------------------------------------------------------
    */

    public function validatePersonalInformation()
    {
        $validatedData = $this->validate([
            'fullname' => 'required|string|max:121',
            'phone' => 'required|string|max:15|min:8',
            'address' => 'required|string|max:500',
            'email' => 'nullable|email|max:255',
        ]);

        $this->isPersonalInfoValid = true;

        $this->dispatch('personalInfoValidated');

        $this->dispatch(
            'message',
            text: 'Personal information saved successfully',
            type: 'success',
            status: 200
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Promo Code
    |--------------------------------------------------------------------------
    */

    public function applyPromoCode()
    {
        if ($this->promoCodeApplied) {

            $this->dispatch(
                'message',
                text: 'Promo code already applied.',
                type: 'error',
                status: 200
            );

            return;
        }


        $promo = PromoCode::where('code', $this->promoCode)
            ->where('valid_from', '<=', now())
            ->where('valid_to', '>=', now())
            ->first();


        if (!$promo) {

            $this->dispatch(
                'message',
                text: 'Invalid or expired promo code.',
                type: 'error',
                status: 200
            );

            return;
        }


        $discountAmount =
            $this->totalProductAmount * $promo->discount_amount;


        if ($discountAmount <= 0) {

            $this->dispatch(
                'message',
                text: 'Promo code discount is invalid.',
                type: 'error',
                status: 200
            );

            return;
        }


        $this->totalProductAmount -= $discountAmount;

        $this->promoCodeApplied = true;


        $this->dispatch(
            'message',
            text: 'Promo code applied successfully',
            type: 'success',
            status: 200
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Calculate Cart Total
    |--------------------------------------------------------------------------
    */

    public function calculateTotal()
    {
        $this->totalProductAmount = 0;


        /*
        |--------------------------------------------------------------------------
        | Logged In User
        |--------------------------------------------------------------------------
        */

        if (auth()->check()) {

            $this->carts = Cart::where(
                    'user_id',
                    auth()->id()
                )
                ->with([
                    'product',
                    'productVariant.color',
                    'productVariant.size',
                ])
                ->get();

        }


        /*
        |--------------------------------------------------------------------------
        | Guest User
        |--------------------------------------------------------------------------
        */

        else {

            $guestCart = CartHelper::getCartItems();

            $this->carts = collect();


            foreach ($guestCart as $cartKey => $cartData) {

                /*
                |--------------------------------------------------------------------------
                | Cart key examples:
                |
                | 18
                | 18_5
                |
                | 18 = product ID
                | 5  = variant ID
                |--------------------------------------------------------------------------
                */

                $parts = explode(
                    '_',
                    (string) $cartKey
                );


                $productId = (int) $parts[0];


                $variantId = null;

                if (
                    isset($parts[1]) &&
                    is_numeric($parts[1])
                ) {
                    $variantId = (int) $parts[1];
                }


                /*
                |--------------------------------------------------------------------------
                | Load Product
                |--------------------------------------------------------------------------
                */

                $product = Product::find($productId);


                if (!$product) {
                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | Load Variant
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


                    /*
                    |--------------------------------------------------------------------------
                    | Invalid variant
                    |--------------------------------------------------------------------------
                    */

                    if (!$variant) {
                        continue;
                    }
                }


                /*
                |--------------------------------------------------------------------------
                | Create cart object
                |--------------------------------------------------------------------------
                */

                $this->carts->push(
                    (object) [

                        'product_id' => $product->id,

                        'product' => $product,

                        'product_variant_id' => $variantId,

                        'productVariant' => $variant,

                        'product_color_id' =>
                            $variant
                                ? $variant->color_id
                                : null,

                        'quantity' =>
                            (int) (
                                $cartData['quantity'] ?? 1
                            ),
                    ]
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Calculate Total
        |--------------------------------------------------------------------------
        */

        foreach ($this->carts as $cartItem) {

            if (!$cartItem->product) {
                continue;
            }


            $price =
                $cartItem->product->selling_price;


            $this->totalProductAmount +=
                $price * $cartItem->quantity;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Place Order
    |--------------------------------------------------------------------------
    */

    public function placeOrder()
    {
        /*
        |--------------------------------------------------------------------------
        | Personal Information
        |--------------------------------------------------------------------------
        */

        if (!$this->isPersonalInfoValid) {

            $this->dispatch(
                'message',
                text: 'Please complete your personal information first',
                type: 'warning',
                status: 200
            );

            return null;
        }


        /*
        |--------------------------------------------------------------------------
        | Refresh Cart
        |--------------------------------------------------------------------------
        */

        $this->calculateTotal();


        /*
        |--------------------------------------------------------------------------
        | Validate Cart
        |--------------------------------------------------------------------------
        */

        foreach ($this->carts as $cartItem) {

            $product = $cartItem->product;


            /*
            |--------------------------------------------------------------------------
            | Product no longer exists / unavailable
            |--------------------------------------------------------------------------
            */

            if (
                !$product ||
                $product->status != '0'
            ) {

                if (auth()->check()) {

                    Cart::where(
                        'user_id',
                        auth()->id()
                    )
                    ->where(
                        'product_id',
                        $cartItem->product_id
                    )
                    ->when(
                        $cartItem->product_variant_id,
                        function ($query) use ($cartItem) {

                            $query->where(
                                'product_variant_id',
                                $cartItem->product_variant_id
                            );
                        },
                        function ($query) {

                            $query->whereNull(
                                'product_variant_id'
                            );
                        }
                    )
                    ->delete();
                }


                $this->dispatch(
                    'message',
                    text: 'A product in your cart is no longer available and has been removed.',
                    type: 'warning',
                    status: 200
                );

                return null;
            }


            /*
            |--------------------------------------------------------------------------
            | VARIANT PRODUCT
            |--------------------------------------------------------------------------
            */

            if ($cartItem->product_variant_id) {

                $variant = ProductVariant::find(
                    $cartItem->product_variant_id
                );


                /*
                |--------------------------------------------------------------------------
                | Variant no longer exists
                |--------------------------------------------------------------------------
                */

                if (
                    !$variant ||
                    $variant->product_id != $product->id
                ) {

                    if (auth()->check()) {

                        Cart::where(
                            'user_id',
                            auth()->id()
                        )
                        ->where(
                            'product_id',
                            $product->id
                        )
                        ->where(
                            'product_variant_id',
                            $cartItem->product_variant_id
                        )
                        ->delete();
                    }


                    $this->dispatch(
                        'message',
                        text: "{$product->name} option is no longer available.",
                        type: 'warning',
                        status: 200
                    );

                    return null;
                }


                /*
                |--------------------------------------------------------------------------
                | Variant out of stock
                |--------------------------------------------------------------------------
                */

                if ((int) $variant->quantity <= 0) {

                    if (auth()->check()) {

                        Cart::where(
                            'user_id',
                            auth()->id()
                        )
                        ->where(
                            'product_id',
                            $product->id
                        )
                        ->where(
                            'product_variant_id',
                            $variant->id
                        )
                        ->delete();
                    }


                    $color = $variant->color
                        ? $variant->color->name
                        : '';

                    $size = $variant->size
                        ? $variant->size->name
                        : '';


                    $option = trim(
                        $color .
                        ($color && $size ? ' / ' : '') .
                        $size
                    );


                    $message =
                        $product->name .
                        ($option
                            ? " ({$option})"
                            : '') .
                        ' is out of stock and has been removed from your cart.';


                    $this->dispatch(
                        'message',
                        text: $message,
                        type: 'warning',
                        status: 200
                    );

                    return null;
                }


                /*
                |--------------------------------------------------------------------------
                | Cart quantity exceeds variant stock
                |--------------------------------------------------------------------------
                */

                if (
                    $cartItem->quantity >
                    $variant->quantity
                ) {

                    if (auth()->check()) {

                        Cart::where(
                            'user_id',
                            auth()->id()
                        )
                        ->where(
                            'product_id',
                            $product->id
                        )
                        ->where(
                            'product_variant_id',
                            $variant->id
                        )
                        ->update([
                            'quantity' => $variant->quantity,
                        ]);
                    }


                    $this->dispatch(
                        'message',
                        text: "Only {$variant->quantity} item(s) of {$product->name} are available for this option.",
                        type: 'warning',
                        status: 200
                    );

                    return null;
                }
            }


            /*
            |--------------------------------------------------------------------------
            | NORMAL PRODUCT WITHOUT VARIANT
            |--------------------------------------------------------------------------
            */

            else {

                if ((int) $product->quantity <= 0) {

                    if (auth()->check()) {

                        Cart::where(
                            'user_id',
                            auth()->id()
                        )
                        ->where(
                            'product_id',
                            $product->id
                        )
                        ->whereNull(
                            'product_variant_id'
                        )
                        ->delete();
                    }


                    $this->dispatch(
                        'message',
                        text: "{$product->name} is out of stock and has been removed from your cart.",
                        type: 'warning',
                        status: 200
                    );

                    return null;
                }


                /*
                |--------------------------------------------------------------------------
                | Quantity exceeds product stock
                |--------------------------------------------------------------------------
                */

                if (
                    $cartItem->quantity >
                    $product->quantity
                ) {

                    if (auth()->check()) {

                        Cart::where(
                            'user_id',
                            auth()->id()
                        )
                        ->where(
                            'product_id',
                            $product->id
                        )
                        ->whereNull(
                            'product_variant_id'
                        )
                        ->update([
                            'quantity' => $product->quantity,
                        ]);
                    }


                    $this->dispatch(
                        'message',
                        text: "Only {$product->quantity} item(s) of {$product->name} are available.",
                        type: 'warning',
                        status: 200
                    );

                    return null;
                }
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Create Order
        |--------------------------------------------------------------------------
        */

        return DB::transaction(function () {

            $order = Order::create([

                'user_id' =>
                    auth()->check()
                        ? auth()->id()
                        : null,

                'tracking_no' =>
                    'DEM-' .
                    now()->format('Ymd') .
                    '-' .
                    strtoupper(
                        Str::random(6)
                    ),

                'fullname' =>
                    $this->fullname,

                'email' =>
                    !empty($this->email)
                        ? $this->email
                        : null,

                'phone' =>
                    $this->phone,

                'address' =>
                    $this->address,

                'status_message' =>
                    'pending',

                'payment_mode' =>
                    $this->payment_mode,

                'payment_id' =>
                    $this->payment_id,

                'total_price' =>
                    $this->totalProductAmount,
            ]);


            /*
            |--------------------------------------------------------------------------
            | Create Order Items
            |--------------------------------------------------------------------------
            */

            foreach ($this->carts as $cartItem) {

                /*
                |--------------------------------------------------------------------------
                | NORMAL PRODUCT
                |--------------------------------------------------------------------------
                */

                if (!$cartItem->product_variant_id) {

                    $product = Product::lockForUpdate()
                        ->find($cartItem->product_id);


                    if (
                        !$product ||
                        $product->status != '0' ||
                        $product->quantity < $cartItem->quantity
                    ) {

                        throw new \Exception(
                            "Stock changed while placing the order."
                        );
                    }


                    OrderItem::create([

                        'order_id' =>
                            $order->id,

                        'product_id' =>
                            $product->id,

                        'product_variant_id' =>
                            null,

                        'product_color_id' =>
                            null,

                        'quantity' =>
                            $cartItem->quantity,

                        'price' =>
                            $product->selling_price,
                    ]);


                    /*
                    |--------------------------------------------------------------------------
                    | Decrease normal product stock
                    |--------------------------------------------------------------------------
                    */

                    $product->decrement(
                        'quantity',
                        $cartItem->quantity
                    );
                }


                /*
                |--------------------------------------------------------------------------
                | VARIANT PRODUCT
                |--------------------------------------------------------------------------
                */

                else {

                    $variant = ProductVariant::lockForUpdate()
                        ->with([
                            'color',
                            'size',
                        ])
                        ->find(
                            $cartItem->product_variant_id
                        );


                    if (
                        !$variant ||
                        $variant->product_id != $cartItem->product_id ||
                        $variant->quantity < $cartItem->quantity
                    ) {

                        throw new \Exception(
                            "Stock changed while placing the order."
                        );
                    }


                    $product = Product::find(
                        $cartItem->product_id
                    );


                    if (
                        !$product ||
                        $product->status != '0'
                    ) {

                        throw new \Exception(
                            "Product is no longer available."
                        );
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | Create Order Item
                    |--------------------------------------------------------------------------
                    */

                    OrderItem::create([

                        'order_id' =>
                            $order->id,

                        'product_id' =>
                            $product->id,

                        'product_variant_id' =>
                            $variant->id,

                        'product_color_id' =>
                            $variant->color_id,

                        'quantity' =>
                            $cartItem->quantity,

                        'price' =>
                            $product->selling_price,
                    ]);


                    /*
                    |--------------------------------------------------------------------------
                    | Decrease VARIANT stock
                    |--------------------------------------------------------------------------
                    */

                    $variant->decrement(
                        'quantity',
                        $cartItem->quantity
                    );
                }
            }


            return $order;
        });
    }


    /*
    |--------------------------------------------------------------------------
    | Cash On Delivery
    |--------------------------------------------------------------------------
    */

    public function codOrder()
    {
        /*
        |--------------------------------------------------------------------------
        | Validate Personal Information
        |--------------------------------------------------------------------------
        */

        if (!$this->isPersonalInfoValid) {

            $this->dispatch(
                'message',
                text: 'Please complete your personal information first.',
                type: 'warning',
                status: 200
            );

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Payment Mode
        |--------------------------------------------------------------------------
        */

        $this->payment_mode = 'Cash on Delivery';


        try {

            /*
            |--------------------------------------------------------------------------
            | Create Order
            |--------------------------------------------------------------------------
            */

            $order = $this->placeOrder();


            if (!$order) {
                return;
            }


            /*
            |--------------------------------------------------------------------------
            | Clear Cart
            |--------------------------------------------------------------------------
            */

            if (auth()->check()) {

                Cart::where(
                    'user_id',
                    auth()->id()
                )->delete();

            } else {

                CartHelper::forgetGuestCart();
            }


            /*
            |--------------------------------------------------------------------------
            | Send Confirmation Email
            |--------------------------------------------------------------------------
            */

            if (!empty($order->email)) {

                try {

                    Mail::to($order->email)
                        ->send(
                            new PlaceOrderMailable($order)
                        );

                } catch (\Exception $mailException) {

                    \Log::error(
                        'Order Confirmation Email Error: ' .
                        $mailException->getMessage()
                    );
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Success Message
            |--------------------------------------------------------------------------
            */

            $this->dispatch(
                'message',
                text: 'Thank you! Your order has been placed successfully.',
                type: 'success',
                status: 200
            );


            return redirect()->to(
                'thank-you'
            );

        } catch (\Exception $e) {

            \Log::error(
                'Order Placement Error: ' .
                $e->getMessage()
            );


            $this->dispatch(
                'message',
                text: 'Sorry, we could not place your order. Please try again.',
                type: 'error',
                status: 500
            );


            return;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Render
    |--------------------------------------------------------------------------
    */

    public function render()
    {
        return view(
            'livewire.frontend.checkout.checkout-show',
            [
                'isPersonalInfoValid' =>
                    $this->isPersonalInfoValid
            ]
        );
    }
}