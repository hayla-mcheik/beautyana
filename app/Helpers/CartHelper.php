<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Log;

class CartHelper
{
    /*
    |--------------------------------------------------------------------------
    | Get Guest Cart
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | Set Guest Cart
    |--------------------------------------------------------------------------
    */

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

    public static function addItem($productId, $variantId = null, $quantity = 1)
    {
        $product = Product::find($productId);

        if (
            !$product ||
            $product->status != '0'
        ) {
            return false;
        }

        /*
        |--------------------------------------------------------------------------
        | Variant Product
        |--------------------------------------------------------------------------
        */

        if ($variantId) {

            $variant = ProductVariant::where('id', $variantId)
                ->where('product_id', $productId)
                ->first();

            if (!$variant || $variant->quantity <= 0) {
                return false;
            }

            $cart = self::getGuestCart();

            /*
            | Each product + variant combination gets its own cart row.
            */

            $cartKey = $productId . '_' . $variantId;

            $currentQty = $cart[$cartKey]['quantity'] ?? 0;

            $newQty = min(
                $currentQty + $quantity,
                $variant->quantity
            );

            $cart[$cartKey] = [
                'product_id' => $productId,
                'variant_id' => $variantId,
                'quantity' => $newQty,
            ];

            self::setGuestCart($cart);

            return true;
        }

        /*
        |--------------------------------------------------------------------------
        | Normal Product Without Variant
        |--------------------------------------------------------------------------
        */

        if ($product->quantity <= 0) {
            return false;
        }

        $cart = self::getGuestCart();

        $cartKey = (string) $productId;

        $currentQty = $cart[$cartKey]['quantity'] ?? 0;

        $newQty = min(
            $currentQty + $quantity,
            $product->quantity
        );

        $cart[$cartKey] = [
            'product_id' => $productId,
            'variant_id' => null,
            'quantity' => $newQty,
        ];

        self::setGuestCart($cart);

        return true;
    }

    /*
    |--------------------------------------------------------------------------
    | Remove Item
    |--------------------------------------------------------------------------
    */

    public static function removeItem($productId, $variantId = null)
    {
        $cart = self::getGuestCart();

        $cartKey = $variantId
            ? $productId . '_' . $variantId
            : (string) $productId;

        if (isset($cart[$cartKey])) {

            unset($cart[$cartKey]);

            self::setGuestCart($cart);
        }

        return $cart;
    }

    /*
    |--------------------------------------------------------------------------
    | Update Quantity
    |--------------------------------------------------------------------------
    */

    public static function updateQuantity(
        $productId,
        $quantity,
        $variantId = null
    ) {
        $cart = self::getGuestCart();

        $cartKey = $variantId
            ? $productId . '_' . $variantId
            : (string) $productId;

        if (isset($cart[$cartKey])) {

            $product = Product::find($productId);

            if (
                !$product ||
                $product->status != '0'
            ) {

                unset($cart[$cartKey]);

            } else {

                /*
                |--------------------------------------------------------------------------
                | Variant Quantity
                |--------------------------------------------------------------------------
                */

                if ($variantId) {

                    $variant = ProductVariant::where('id', $variantId)
                        ->where('product_id', $productId)
                        ->first();

                    if (!$variant || $variant->quantity <= 0) {

                        unset($cart[$cartKey]);

                    } else {

                        $cart[$cartKey]['quantity'] = max(
                            1,
                            min($quantity, $variant->quantity)
                        );
                    }

                }

                /*
                |--------------------------------------------------------------------------
                | Normal Product Quantity
                |--------------------------------------------------------------------------
                */

                else {

                    if ($product->quantity <= 0) {

                        unset($cart[$cartKey]);

                    } else {

                        $cart[$cartKey]['quantity'] = max(
                            1,
                            min($quantity, $product->quantity)
                        );
                    }
                }
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

        foreach ($cart as $cartKey => $item) {

            $productId = $item['product_id'] ?? null;
            $variantId = $item['variant_id'] ?? null;

            if (!$productId) {
                unset($cart[$cartKey]);
                continue;
            }

            $product = Product::find($productId);

            if (
                !$product ||
                $product->status != '0'
            ) {

                unset($cart[$cartKey]);
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Variant
            |--------------------------------------------------------------------------
            */

            if ($variantId) {

                $variant = ProductVariant::where('id', $variantId)
                    ->where('product_id', $productId)
                    ->first();

                if (!$variant || $variant->quantity <= 0) {

                    unset($cart[$cartKey]);
                    continue;
                }

                if ($item['quantity'] > $variant->quantity) {
                    $cart[$cartKey]['quantity'] = $variant->quantity;
                }

            }

            /*
            |--------------------------------------------------------------------------
            | Normal Product
            |--------------------------------------------------------------------------
            */

            else {

                if ($product->quantity <= 0) {

                    unset($cart[$cartKey]);
                    continue;
                }

                if ($item['quantity'] > $product->quantity) {
                    $cart[$cartKey]['quantity'] = $product->quantity;
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

        foreach ($cart as $cartKey => $item) {

            $productId = $item['product_id'] ?? null;
            $variantId = $item['variant_id'] ?? null;

            if (!$productId) {
                unset($cart[$cartKey]);
                continue;
            }

            $product = Product::find($productId);

            if (
                !$product ||
                $product->status != '0'
            ) {

                unset($cart[$cartKey]);
                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | Variant
            |--------------------------------------------------------------------------
            */

            if ($variantId) {

                $variant = ProductVariant::where('id', $variantId)
                    ->where('product_id', $productId)
                    ->first();

                if (!$variant || $variant->quantity <= 0) {

                    unset($cart[$cartKey]);
                    continue;
                }

                if ($item['quantity'] > $variant->quantity) {
                    $cart[$cartKey]['quantity'] = $variant->quantity;
                }

            }

            /*
            |--------------------------------------------------------------------------
            | Normal Product
            |--------------------------------------------------------------------------
            */

            else {

                if ($product->quantity <= 0) {

                    unset($cart[$cartKey]);
                    continue;
                }

                if ($item['quantity'] > $product->quantity) {
                    $cart[$cartKey]['quantity'] = $product->quantity;
                }
            }
        }

        self::setGuestCart($cart);

        return $cart;
    }
}