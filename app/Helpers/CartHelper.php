<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CartHelper
{
    public static function getGuestCart()
    {
        $cookieValue = request()->cookie('guest_cart');

        if (empty($cookieValue)) {
            return [];
        }

        Log::debug('CartHelper: Raw cookie', [
            'value' => $cookieValue
        ]);

        $decoded = json_decode($cookieValue, true);

        if (is_array($decoded)) {

            Log::debug('CartHelper: Successfully decoded', [
                'cart' => $decoded
            ]);

            return $decoded;
        }

        if (str_contains($cookieValue, '%7B')) {

            $decoded = urldecode($cookieValue);

            Log::debug('CartHelper: URL decoded', [
                'decoded' => $decoded
            ]);

            return json_decode($decoded, true) ?? [];
        }

        return [];
    }

    public static function setGuestCart($cartData)
    {
        $jsonData = json_encode($cartData);

        Log::debug('CartHelper: Setting cookie', [
            'cart' => $cartData,
            'json' => $jsonData
        ]);

        cookie()->queue('guest_cart', $jsonData, 10080); // 7 days

        request()->cookies->set('guest_cart', $jsonData);

        if (PHP_SAPI !== 'cli') {
            $_COOKIE['guest_cart'] = $jsonData;
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Add Item
    |--------------------------------------------------------------------------
    */

    public static function addItem($productId, $quantity = 1)
    {
        $product = Product::find($productId);

        if (
            !$product ||
            $product->status != '0' ||
            $product->quantity <= 0
        ) {
            return false;
        }

        $cart = self::getGuestCart();

        $currentQty = $cart[$productId]['quantity'] ?? 0;

        $newQty = min(
            $currentQty + $quantity,
            $product->quantity
        );

        $cart[$productId] = [
            'quantity' => $newQty
        ];

        self::setGuestCart($cart);

        return true;
    }

    /*
    |--------------------------------------------------------------------------
    | Remove Item
    |--------------------------------------------------------------------------
    */

    public static function removeItem($productId)
    {
        $cart = self::getGuestCart();

        if (isset($cart[$productId])) {

            unset($cart[$productId]);

            self::setGuestCart($cart);
        }

        return $cart;
    }

    /*
    |--------------------------------------------------------------------------
    | Update Quantity
    |--------------------------------------------------------------------------
    */

    public static function updateQuantity($productId, $quantity)
    {
        $cart = self::getGuestCart();

        if (isset($cart[$productId])) {

            $product = Product::find($productId);

            if (
                !$product ||
                $product->status != '0' ||
                $product->quantity <= 0
            ) {

                unset($cart[$productId]);

            } else {

                $cart[$productId]['quantity'] = max(
                    1,
                    min($quantity, $product->quantity)
                );
            }
        }

        self::setGuestCart($cart);

        return $cart;
    }

    /*
    |--------------------------------------------------------------------------
    | Clear Cart
    |--------------------------------------------------------------------------
    */

    public static function clearCart()
    {
        self::forgetGuestCart();
    }

    /*
    |--------------------------------------------------------------------------
    | Forget Guest Cart
    |--------------------------------------------------------------------------
    */

    public static function forgetGuestCart()
    {
        cookie()->queue(cookie()->forget('guest_cart'));

        request()->cookies->remove('guest_cart');

        if (isset($_COOKIE['guest_cart'])) {
            unset($_COOKIE['guest_cart']);
        }

        Log::debug('CartHelper: Guest cart forgotten');
    }

    /*
    |--------------------------------------------------------------------------
    | Cart Count
    |--------------------------------------------------------------------------
    */

    public static function getCartCount()
    {
        $cart = self::getGuestCart();

        foreach ($cart as $productId => $item) {

            $product = Product::find($productId);

            if (
                !$product ||
                $product->status != '0' ||
                $product->quantity <= 0
            ) {

                unset($cart[$productId]);

            } else {

                if ($item['quantity'] > $product->quantity) {

                    $cart[$productId]['quantity'] = $product->quantity;
                }
            }
        }

        self::setGuestCart($cart);

        return count($cart);
    }

    /*
    |--------------------------------------------------------------------------
    | Get Cart Items
    |--------------------------------------------------------------------------
    */

    public static function getCartItems()
    {
        $cart = self::getGuestCart();

        foreach ($cart as $productId => $item) {

            $product = Product::find($productId);

            if (
                !$product ||
                $product->status != '0' ||
                $product->quantity <= 0
            ) {

                unset($cart[$productId]);

            } else {

                if ($item['quantity'] > $product->quantity) {

                    $cart[$productId]['quantity'] = $product->quantity;
                }
            }
        }

        self::setGuestCart($cart);

        return $cart;
    }
}