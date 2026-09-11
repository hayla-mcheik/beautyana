<?php

namespace App\Livewire\Frontend\Product;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Cart;

class View extends Component
{
    public $category;
    public $product;

    public $selectedColorId = null;
    public $selectedSizeId = null;

    public $selectedVariantId = null;
    public $availableQuantity = 0;

    public $selectedColorImage = null;

    public $quantityCount = 1;
    public $selectedImageIndex = 0;


public function mount($category, $product)
{
    $this->category = $category;

    $this->product = $product->load([
        'productImages',
        'productVariants.color',
        'productVariants.size',
    ]);

    /*
    |--------------------------------------------------------------------------
    | DEFAULT COLOR
    |--------------------------------------------------------------------------
    */

    $colors = $this->product->productVariants
        ->whereNotNull('color_id')
        ->filter(fn($variant) => $variant->color)
        ->pluck('color')
        ->unique('id');

    if ($colors->count() > 0) {

        // Try Black first
        $defaultColor = $colors->first(function ($color) {
            return strtolower(trim($color->name)) === 'black';
        });

        // If Black doesn't exist, use first color
        if (!$defaultColor) {
            $defaultColor = $colors->first();
        }

        // This also automatically selects the default variant
        $this->selectColor($defaultColor->id);
    }
}

    /*
    |--------------------------------------------------------------------------
    | SELECT COLOR
    |--------------------------------------------------------------------------
    */
public function selectColor($colorId)
{
    $this->selectedColorId = $colorId;

    /*
    |--------------------------------------------------------------------------
    | COLOR IMAGE
    |--------------------------------------------------------------------------
    */

    $variantWithImage = $this->product->productVariants
        ->where('color_id', $colorId)
        ->first(function ($variant) {
            return !empty($variant->image);
        });

    if ($variantWithImage) {
        $this->selectedColorImage = asset($variantWithImage->image);
    } else {
        $this->selectedColorImage = null;
    }

    /*
    |--------------------------------------------------------------------------
    | RESET
    |--------------------------------------------------------------------------
    */

    $this->selectedSizeId = null;
    $this->selectedVariantId = null;
    $this->availableQuantity = 0;
    $this->quantityCount = 1;

    /*
    |--------------------------------------------------------------------------
    | FIND FIRST AVAILABLE VARIANT
    |--------------------------------------------------------------------------
    */

    $variants = $this->product->productVariants
        ->where('color_id', $colorId)
        ->where('quantity', '>', 0);

    if ($variants->count() === 0) {
        return;
    }

    /*
    |--------------------------------------------------------------------------
    | IF NO SIZE WAS ENTERED BY ADMIN
    |--------------------------------------------------------------------------
    */

    $noSizeVariant = $variants->firstWhere('size_id', null);

    if ($noSizeVariant) {

        $this->selectedSizeId = null;
        $this->selectedVariantId = $noSizeVariant->id;
        $this->availableQuantity = (int) $noSizeVariant->quantity;

        if (!empty($noSizeVariant->image)) {
            $this->selectedColorImage = asset($noSizeVariant->image);
        }

        return;
    }

    /*
    |--------------------------------------------------------------------------
    | OTHERWISE SELECT FIRST SIZE
    |--------------------------------------------------------------------------
    */

    $defaultVariant = $variants->first();

    $this->selectedSizeId = $defaultVariant->size_id;
    $this->selectedVariantId = $defaultVariant->id;
    $this->availableQuantity = (int) $defaultVariant->quantity;

    if (!empty($defaultVariant->image)) {
        $this->selectedColorImage = asset($defaultVariant->image);
    }
}


    /*
    |--------------------------------------------------------------------------
    | SELECT SIZE
    |--------------------------------------------------------------------------
    */

public function selectSize($sizeId)
{
    if (!$this->selectedColorId) {
        return;
    }

    $variant = $this->product->productVariants
        ->where('color_id', $this->selectedColorId)
        ->where('size_id', $sizeId)
        ->first();

    if (!$variant) {
        $this->selectedSizeId = null;
        $this->selectedVariantId = null;
        $this->availableQuantity = 0;
        return;
    }

    $this->selectedSizeId = $sizeId;
    $this->selectedVariantId = $variant->id;
    $this->availableQuantity = (int) $variant->quantity;
    $this->quantityCount = 1;

    // If this exact variant has an image, use it
    if (!empty($variant->image)) {
        $this->selectedColorImage = asset($variant->image);
    }
}

    /*
    |--------------------------------------------------------------------------
    | CHECK IF SIZE IS AVAILABLE FOR SELECTED COLOR
    |--------------------------------------------------------------------------
    */

    public function isSizeAvailable($sizeId)
    {
        if (!$this->selectedColorId) {
            return true;
        }

        return $this->product->productVariants
            ->where('color_id', $this->selectedColorId)
            ->where('size_id', $sizeId)
            ->where('quantity', '>', 0)
            ->count() > 0;
    }


    /*
    |--------------------------------------------------------------------------
    | QUANTITY
    |--------------------------------------------------------------------------
    */

    public function incrementQuantity()
    {
        if (
            $this->availableQuantity > 0 &&
            $this->quantityCount < $this->availableQuantity
        ) {
            $this->quantityCount++;
        }
    }


    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | IMAGE
    |--------------------------------------------------------------------------
    */

    public function selectImage($index)
    {
        $this->selectedImageIndex = $index;
    }


    /*
    |--------------------------------------------------------------------------
    | WISHLIST
    |--------------------------------------------------------------------------
    */

    public function addToWishList($productId)
    {
        if (!Auth::check()) {

            $this->dispatch(
                'message',
                text: 'Please Login to Continue',
                type: 'info',
                status: 401
            );

            return;
        }

        if (
            Wishlist::where('user_id', auth()->id())
                ->where('product_id', $productId)
                ->exists()
        ) {

            $this->dispatch(
                'message',
                text: 'Already added to wishlist',
                type: 'warning',
                status: 409
            );

            return;
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
        ]);

        $this->dispatch('wishlistAddedUpdated');

        $this->dispatch(
            'message',
            text: 'Wishlist Added successfully',
            type: 'success',
            status: 200
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ADD TO CART
    |--------------------------------------------------------------------------
    */

    public function addToCart(int $productId)
    {
        if (!Auth::check()) {

            $this->dispatch(
                'message',
                text: 'Please Login to add to cart',
                type: 'info',
                status: 401
            );

            return;
        }

        if (Auth::user()->role_as == '1') {

            $this->dispatch(
                'message',
                text: 'Only User can add to cart',
                type: 'warning',
                status: 200
            );

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | PRODUCT HAS VARIANTS
        |--------------------------------------------------------------------------
        */

        if ($this->product->productVariants->count() > 0) {

            if (!$this->selectedColorId) {

                $this->dispatch(
                    'message',
                    text: 'Please select a color',
                    type: 'warning',
                    status: 400
                );

                return;
            }



            if (!$this->selectedVariantId) {

                $this->dispatch(
                    'message',
                    text: 'This color and size combination is not available',
                    type: 'warning',
                    status: 400
                );

                return;
            }


            if ($this->availableQuantity <= 0) {

                $this->dispatch(
                    'message',
                    text: 'This combination is out of stock',
                    type: 'warning',
                    status: 404
                );

                return;
            }


            if ($this->quantityCount > $this->availableQuantity) {

                $this->dispatch(
                    'message',
                    text: 'Only ' . $this->availableQuantity . ' available',
                    type: 'warning',
                    status: 404
                );

                return;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | NORMAL PRODUCT WITHOUT VARIANTS
        |--------------------------------------------------------------------------
        */

        if (
            $this->product->productVariants->count() == 0 &&
            $this->product->quantity <= 0
        ) {

            $this->dispatch(
                'message',
                text: 'Out of Stock',
                type: 'warning',
                status: 404
            );

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | CART
        |--------------------------------------------------------------------------
        */

        $cartQuery = Cart::where('user_id', auth()->id())
            ->where('product_id', $productId);

        if ($this->selectedVariantId) {

            $cartQuery->where(
                'product_variant_id',
                $this->selectedVariantId
            );

        } else {

            $cartQuery->whereNull('product_variant_id');
        }

        $existingCart = $cartQuery->exists();

        if ($existingCart) {

            $this->dispatch(
                'message',
                text: 'This product option is already in your cart',
                type: 'warning',
                status: 200
            );

            return;
        }

        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'product_variant_id' => $this->selectedVariantId,
            'quantity' => $this->quantityCount,
        ]);

        $this->dispatch('CartAddedUpdated');

        $this->dispatch(
            'message',
            text: 'Product Added to Cart',
            type: 'success',
            status: 200
        );
    }

    public function render()
    {
        return view(
            'livewire.frontend.product.view',
            [
                'category' => $this->category,
                'product' => $this->product,
            ]
        );
    }
}