<div>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Roboto:wght@300;400;500;700&display=swap');


        /* =========================================================
           VARIABLES
        ========================================================= */

  


        /* =========================================================
           PRODUCT SINGLE AREA
        ========================================================= */

        .product-single-area {
            background: linear-gradient(
                135deg,
                #FDFBF7 0%,
                #ffffff 100%
            );

            position: relative;

            overflow: hidden;

            padding: 30px 0 50px;
        }


        /* =========================================================
           PRODUCT ITEM
        ========================================================= */

        .product-single-item {
            width: 100%;

            animation: productFade 0.5s ease;
        }


        /* =========================================================
           PRODUCT IMAGE CARD
        ========================================================= */

        .product-thumb {
            width: 100%;

            background: linear-gradient(
                135deg,
                #faf8f3 0%,
                #ffffff 100%
            );

            border-radius: 20px;

            padding: 20px;

            border: 1px solid var(--luxury-border);

            /*
             * Keep thumbnails visible.
             */
            overflow: visible;
        }


        /* =========================================================
           MAIN IMAGE CONTAINER
           
           CLIENT IMAGES ARE ALWAYS:
           1200px x 1200px

           Therefore:
           1 / 1 aspect ratio
        ========================================================= */

        .single-product-thumb-content {
            width: 100% !important;

            aspect-ratio: 1 / 1 !important;

            height: auto !important;

            min-height: 0 !important;

            margin: 0 0 15px 0 !important;

            padding: 0 !important;

            border-radius: 15px;

            overflow: hidden;

            background: transparent;

            position: relative;

            display: block !important;

            box-sizing: border-box;
        }


        /* =========================================================
           MAIN IMAGE LINK
        ========================================================= */

        .lightbox-image {
            display: block !important;

            width: 100% !important;

            height: 100% !important;

            margin: 0 !important;

            padding: 0 !important;

            line-height: 0;

            text-decoration: none;
        }


        /* =========================================================
           MAIN IMAGE
           
           1200 x 1200
           
           FULL WIDTH
           FULL HEIGHT
           NO CROPPING
           NO DISTORTION
        ========================================================= */

        #main-image {
            display: block !important;

            width: 100% !important;

            height: 100% !important;

            max-width: 100% !important;

            max-height: 100% !important;

            margin: 0 !important;

            padding: 0 !important;

            border: none !important;

            /*
             * Since images are always 1200x1200,
             * contain will display the complete image.
             */
            object-fit: cover !important;

            object-position: center center !important;

            transition: transform 0.5s ease;
        }


        /* =========================================================
           THUMBNAILS CONTAINER
        ========================================================= */

        .single-product-nav-content {
            display: block !important;

            width: 100% !important;

            height: auto !important;

            margin-top: 15px !important;

            margin-bottom: 0 !important;

            padding: 0 !important;

            overflow: visible !important;

            position: relative;

            clear: both;
        }


        /* =========================================================
           THUMBNAIL LIST
           
           Custom flex layout instead of Bootstrap row/col.
        ========================================================= */

        .thumbnail-list {
            display: flex !important;

            flex-wrap: wrap !important;

            align-items: center;

            justify-content: flex-start;

            gap: 10px;

            width: 100% !important;

            height: auto !important;

            margin: 0 !important;

            padding: 0 !important;

            box-sizing: border-box;
        }


        /* =========================================================
           THUMBNAIL ITEM
        ========================================================= */

        .thumbnail-item {
            display: block !important;

            width: 80px !important;

            height: 80px !important;

            min-width: 80px !important;

            max-width: 80px !important;

            flex: 0 0 80px !important;

            margin: 0 !important;

            padding: 0 !important;

            visibility: visible !important;

            opacity: 1 !important;

            box-sizing: border-box;
        }


        /* =========================================================
           THUMBNAIL WRAPPER
        ========================================================= */

        .thumb-img-wrapper {
            position: relative !important;

            display: flex !important;

            align-items: center !important;

            justify-content: center !important;

            width: 80px !important;

            height: 80px !important;

            min-width: 80px !important;

            min-height: 80px !important;

            max-width: 80px !important;

            max-height: 80px !important;

            margin: 0 !important;

            padding: 3px !important;

            background: #ffffff !important;

            border: 2px solid transparent !important;

            border-radius: 10px !important;

            overflow: hidden !important;

            box-sizing: border-box !important;

            cursor: pointer;

            transition: var(--transition-smooth);

            visibility: visible !important;

            opacity: 1 !important;
        }


        /* =========================================================
           ACTIVE THUMBNAIL
        ========================================================= */

        .thumb-img-wrapper.active {
            border-color: var(--demanto-gold) !important;

            box-shadow:
                0 5px 15px rgba(
                    179,
                    146,
                    86,
                    0.15
                );
        }


        /* =========================================================
           THUMBNAIL HOVER
        ========================================================= */

        .thumb-img-wrapper:hover {
            border-color: var(--demanto-gold) !important;

            box-shadow:
                0 5px 15px rgba(
                    179,
                    146,
                    86,
                    0.15
                );
        }


        /* =========================================================
           THUMBNAIL IMAGE
        ========================================================= */

        .thumbnail-image {
            display: block !important;

            width: 100% !important;

            height: 100% !important;

            max-width: 100% !important;

            max-height: 100% !important;

            margin: 0 !important;

            padding: 0 !important;

            border: none !important;

            object-fit: contain !important;

            object-position: center center !important;

            position: relative !important;

            z-index: 2 !important;

            visibility: visible !important;

            opacity: 1 !important;

            transition: transform 0.3s ease;
        }


        /* =========================================================
           THUMBNAIL HOVER IMAGE
        ========================================================= */

        .thumb-img-wrapper:hover .thumbnail-image {
            transform: scale(1.05);
        }


        /* =========================================================
           PRODUCT INFORMATION
        ========================================================= */

        .product-single-info {
            padding-left: 25px;
        }


        .product-single-info .title {
            font-family: "Cormorant Garamond", serif;

            font-size: 32px;

            font-weight: 500;

            color: var(--demanto-dark);

            margin-bottom: 18px;

            letter-spacing: 0.5px;
        }


        /* =========================================================
           PRICES
        ========================================================= */

        .prices {
            display: flex;

            align-items: center;

            gap: 15px;

            margin-bottom: 15px;

            padding-bottom: 15px;

            border-bottom: 1px solid var(--luxury-border);
        }


        .price {
            font-family: "Cormorant Garamond", serif;

            font-size: 27px;

            font-weight: 600;

            color: var(--demanto-gold);
        }


        .old_price {
            font-family: "Cormorant Garamond", serif;

            font-size: 18px;

            color: #aaaaaa;

            text-decoration: line-through;
        }


        /* =========================================================
           STOCK STATUS
        ========================================================= */

        .stock-status {
            display: block;

            margin-bottom: 20px;
        }


        .stock-badge {
            display: inline-block;

            padding: 6px 15px;

            border-radius: 20px;

            font-size: 14px;

            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: 1px;

            margin-top: 10px;
        }
        .stock-badge.out-stock {
            background: #999999;

            color: #ffffff;
        }


        /* =========================================================
           DESCRIPTION
        ========================================================= */

        .product-description {
            margin: 20px 0;
        }


        .product-desc-list {
            list-style: none;

            padding: 0;

            margin: 0;
        }


        .product-desc-list li {
            color: var(--demanto-muted);

            font-size: 14px;

            line-height: 1.7;

            margin-bottom: 10px;

            position: relative;

            padding-left: 20px;
        }


        .product-desc-list li::before {
            content: '✧';

            position: absolute;

            left: 0;

            top: 2px;

            color: var(--demanto-gold);

            font-size: 14px;
        }


        /* =========================================================
           CART
        ========================================================= */

        .white-bg {
            margin-bottom: 12px;
        }


        /* =========================================================
           APPOINTMENT
        ========================================================= */

        .btn-appoint {
            background-color: var(--demanto-gold) !important;

            color: white !important;
        }


        .btn-appoint::before {
            display: none !important;
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 991px) {

            .product-single-info {
                padding-left: 0;

                margin-top: 30px;
            }


            .product-single-info .title {
                font-size: 27px;
            }


            .price {
                font-size: 23px;
            }


            .single-product-thumb-content {
                aspect-ratio: 1 / 1 !important;
            }


            #main-image {
                width: 100% !important;

                height: 100% !important;
            }
        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 768px) {

            .product-single-area {
                padding: 20px 0 35px;
            }


            .product-thumb {
                padding: 15px;
            }


            .product-single-info .title {
                font-size: 24px;
            }


            .price {
                font-size: 21px;
            }


            .old_price {
                font-size: 15px;
            }


            .product-desc-list li {
                font-size: 13px;
            }


            .single-product-thumb-content {
                aspect-ratio: 1 / 1 !important;
            }


            #main-image {
                width: 100% !important;

                height: 100% !important;
            }


            /* Thumbnails */

            .thumbnail-list {
                gap: 8px;
            }


            .thumbnail-item {
                width: 65px !important;

                height: 65px !important;

                min-width: 65px !important;

                max-width: 65px !important;

                flex: 0 0 65px !important;
            }


            .thumb-img-wrapper {
                width: 65px !important;

                height: 65px !important;

                min-width: 65px !important;

                min-height: 65px !important;

                max-width: 65px !important;

                max-height: 65px !important;
            }
        }


        /* =========================================================
           SMALL MOBILE
        ========================================================= */

        @media (max-width: 576px) {

            .product-single-area {
                padding-top: 15px;
            }


            .product-thumb {
                padding: 10px;
            }


            .product-single-info .title {
                font-size: 20px;
            }


            .price {
                font-size: 18px;
            }


            .single-product-thumb-content {
                aspect-ratio: 1 / 1 !important;
            }


            #main-image {
                width: 100% !important;

                height: 100% !important;
            }


            .thumbnail-list {
                gap: 7px;
            }


            .thumbnail-item {
                width: 58px !important;

                height: 58px !important;

                min-width: 58px !important;

                max-width: 58px !important;

                flex: 0 0 58px !important;
            }


            .thumb-img-wrapper {
                width: 58px !important;

                height: 58px !important;

                min-width: 58px !important;

                min-height: 58px !important;

                max-width: 58px !important;

                max-height: 58px !important;
            }
        }


        /* =========================================================
           EXTRA SMALL MOBILE
        ========================================================= */

        @media (max-width: 400px) {

            .product-thumb {
                padding: 7px;

                border-radius: 12px;
            }


            .single-product-thumb-content {
                aspect-ratio: 1 / 1 !important;
            }


            #main-image {
                width: 100% !important;

                height: 100% !important;
            }


            .thumbnail-list {
                gap: 5px;
            }


            .thumbnail-item {
                width: 52px !important;

                height: 52px !important;

                min-width: 52px !important;

                max-width: 52px !important;

                flex: 0 0 52px !important;
            }


            .thumb-img-wrapper {
                width: 52px !important;

                height: 52px !important;

                min-width: 52px !important;

                min-height: 52px !important;

                max-width: 52px !important;

                max-height: 52px !important;
            }
        }


        /* =========================================================
           ANIMATION
        ========================================================= */

        @keyframes productFade {

            from {
                opacity: 0;

                transform: translateY(20px);
            }

            to {
                opacity: 1;

                transform: translateY(0);
            }
        }


        /* =========================================================
           SCROLLBAR
        ========================================================= */

        ::-webkit-scrollbar {
            width: 6px;
        }


        ::-webkit-scrollbar-track {
            background: var(--demanto-bg);
        }


        ::-webkit-scrollbar-thumb {
            background: var(--demanto-gold);

            border-radius: 3px;
        }


        /* =========================================================
           FANCYBOX
        ========================================================= */

        .fancybox-slide--image {
            padding: 0 !important;
        }


        .fancybox-image {
            object-fit: contain !important;
        }
/* =========================================================
   PRODUCT VARIANTS
========================================================= */
/* =========================================================
   PRODUCT VARIANTS — LUXURY DESIGN
========================================================= */

.product-variants {
    margin: 24px 0 22px;
    padding: 22px 0 20px;
    border-top: 1px solid var(--luxury-border);
    border-bottom: 1px solid var(--luxury-border);
}

/* ---------------------------------------------------------
   VARIANT GROUP
--------------------------------------------------------- */

.variant-group {
    margin-bottom: 24px;
}

.variant-group:last-child {
    margin-bottom: 0;
}

/* ---------------------------------------------------------
   VARIANT HEADER
--------------------------------------------------------- */

.variant-title-row {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 14px;
}

.variant-label {
    font-family: "Cormorant Garamond", serif;
    font-size: 21px;
    font-weight: 600;
    color: var(--demanto-dark);
    letter-spacing: 0.3px;
}

.selected-value {
    position: relative;
    padding-left: 12px;
    font-family: "Roboto", sans-serif;
    font-size: 13px;
    font-weight: 400;
    color: #8b806f;
}

.selected-value::before {
    content: "";
    position: absolute;
    left: 0;
    top: 50%;
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: var(--demanto-gold);
    transform: translateY(-50%);
}

/* =========================================================
   COLORS
========================================================= */

.color-options {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.color-option {
    position: relative;

    display: inline-flex;
    align-items: center;
    gap: 9px;

    min-height: 43px;
    padding: 6px 13px;

    background: #fff;

    border: 1px solid #e3ddd3;
    border-radius: 8px;

    color: var(--demanto-dark);

    cursor: pointer;

    transition:
        border-color 0.25s ease,
        box-shadow 0.25s ease,
        transform 0.25s ease,
        background 0.25s ease;
}

.color-option:hover {
    border-color: var(--demanto-gold);
    background: #fffdf9;
    transform: translateY(-1px);
}

.color-option.selected {
    border-color: var(--demanto-gold);

    background: #fffdf8;

    box-shadow:
        0 0 0 1px var(--demanto-gold),
        0 5px 15px rgba(179, 146, 86, 0.10);
}

/* Color circle */

.color-circle {
    width: 25px;
    height: 25px;

    flex: 0 0 25px;

    border-radius: 50%;

    border: 2px solid #fff;

    box-shadow:
        0 0 0 1px #d8d1c6,
        0 2px 5px rgba(0, 0, 0, 0.08);

    display: inline-block;

    transition: transform 0.25s ease;
}

.color-option:hover .color-circle {
    transform: scale(1.08);
}

.color-option.selected .color-circle {
    box-shadow:
        0 0 0 2px var(--demanto-gold),
        0 2px 7px rgba(179, 146, 86, 0.20);
}

.color-name {
    font-family: "Roboto", sans-serif;
    font-size: 13px;
    font-weight: 500;
    line-height: 1;
    white-space: nowrap;
}

.color-check {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 16px;
    height: 16px;

    margin-left: 2px;

    border-radius: 50%;

    background: var(--demanto-gold);
    color: #fff;

    font-size: 10px;
    font-weight: 700;
}

/* =========================================================
   SIZE
========================================================= */

.size-options {
    display: flex;
    flex-wrap: wrap;
    gap: 9px;
}

.size-option {
    position: relative;

    min-width: 58px;
    height: 43px;

    padding: 0 17px;

    background: #fff;

    border: 1px solid #e1dbd2;
    border-radius: 8px;

    color: var(--demanto-dark);

    font-family: "Roboto", sans-serif;
    font-size: 13px;
    font-weight: 500;

    cursor: pointer;

    transition:
        background 0.25s ease,
        border-color 0.25s ease,
        color 0.25s ease,
        transform 0.25s ease,
        box-shadow 0.25s ease;
}

.size-option:hover:not(.disabled) {
    border-color: var(--demanto-gold);
    background: #fffdf9;
    transform: translateY(-1px);
}

.size-option.selected {
    background: var(--demanto-gold);
    border-color: var(--demanto-gold);

    color: #fff;

    box-shadow:
        0 5px 14px rgba(179, 146, 86, 0.22);
}

.size-option.disabled {
    opacity: 0.32;
    cursor: not-allowed;
    text-decoration: line-through;
    background: #f8f7f5;
}

/* =========================================================
   AVAILABILITY
========================================================= */

.variant-availability {
    display: flex;
    align-items: center;

    margin-top: 13px;
    padding: 9px 12px;

    background: #faf8f3;

    border-left: 3px solid var(--demanto-gold);
    border-radius: 5px;

    font-family: "Roboto", sans-serif;
    font-size: 13px;

    color: #777;
}

.variant-availability strong {
    margin-left: 4px;

    color: var(--demanto-dark);

    font-weight: 600;
}

.unavailable-text {
    color: #a34a4a;
    font-weight: 600;
}

/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 576px) {

    .product-variants {
        margin: 18px 0;
        padding: 18px 0;
    }

    .variant-group {
        margin-bottom: 20px;
    }

    .variant-title-row {
        margin-bottom: 11px;
    }

    .variant-label {
        font-size: 19px;
    }

    .selected-value {
        font-size: 12px;
    }

    .color-options {
        gap: 8px;
    }

    .color-option {
        min-height: 40px;
        padding: 5px 10px;
        gap: 7px;
    }

    .color-circle {
        width: 22px;
        height: 22px;
        flex-basis: 22px;
    }

    .color-name {
        font-size: 12px;
    }

    .color-check {
        width: 15px;
        height: 15px;
        font-size: 9px;
    }

    .size-options {
        gap: 7px;
    }

    .size-option {
        min-width: 50px;
        height: 39px;
        padding: 0 13px;
        font-size: 12px;
    }

    .variant-availability {
        font-size: 12px;
        padding: 8px 10px;
    }
}
    </style>


    <!-- =========================================================
         BREADCRUMB
    ========================================================= -->

    @include('layouts.inc.frontend.breadcrumb', [

        'breadcrumbs' => [

            [
                'title' => 'Collections',
                'url' => url('/categories')
            ],

            [
                'title' => $category->name,
                'url' => url('/collections/' . $category->slug)
            ],

            [
                'title' => $product->name,
                'url' => '#'
            ]

        ]

    ])


    <!-- =========================================================
         PRODUCT SINGLE AREA
    ========================================================= -->

    <section class="product-area product-single-area">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="product-single-item">

                        <div class="row g-3">


                            <!-- =================================================
                                 PRODUCT IMAGES
                            ================================================= -->

                            <div class="col-md-6">

                         <div>

                                    @if($product->productImages && $product->productImages->count())

                                        <div class="product-thumb">


                                            <!-- =================================================
                                                 MAIN IMAGE
                                            ================================================= -->

                                            <div class="single-product-thumb-content">

                             <a
    id="main-image-link"
    href="{{ $selectedColorImage ?: asset($product->productImages->first()->image) }}"
    data-fancybox="gallery"
    data-caption="{{ $product->name }}"
    class="lightbox-image"
>
                                  <img
    id="main-image"
    src="{{ $selectedColorImage ?: asset($product->productImages->first()->image) }}"
    alt="{{ $product->name }}"
>

                                                </a>

                                            </div>


                                            <!-- =================================================
                                                 THUMBNAILS
                                            ================================================= -->

                                            <div class="single-product-nav-content">

                                                <div class="thumbnail-list">

                                                    @foreach($product->productImages as $index => $image)

                                                        <div class="thumbnail-item">

                                                            <div
                                                                class="thumb-img-wrapper {{ $index == 0 ? 'active' : '' }}"
                                                                data-image="{{ asset($image->image) }}"
                                                            >

                                                                <img
                                                                    src="{{ asset($image->image) }}"
                                                                    class="thumbnail-image"
                                                                    alt="{{ $product->name }}"
                                                                >

                                                            </div>

                                                        </div>

                                                    @endforeach

                                                </div>

                                            </div>


                                            <!-- =================================================
                                                 HIDDEN IMAGES FOR FANCYBOX
                                            ================================================= -->

                                            <div style="display:none">

                                                @foreach($product->productImages as $image)

                                                    <a
                                                        href="{{ asset($image->image) }}"
                                                        data-fancybox="gallery"
                                                        data-caption="{{ $product->name }}"
                                                    ></a>

                                                @endforeach

                                            </div>


                                        </div>

                                    @else

                                        <div class="product-thumb">

                                            <div class="text-center py-5">

                                                <p>
                                                    No product images available.
                                                </p>

                                            </div>

                                        </div>

                                    @endif

                                </div>

                            </div>


                            <!-- =================================================
                                 PRODUCT INFORMATION
                            ================================================= -->

                            <div class="col-md-6">

                                <div class="product-single-info">


                                    <!-- PRODUCT NAME -->

                                    <h1 class="title">
                                        {{ $product->name }}
                                    </h1>


                                    <!-- PRICES -->

                                    <div class="prices">

                                        @if($product->original_price > $product->selling_price)

                                            <span class="old_price">
                                                ${{ number_format($product->original_price, 2) }}
                                            </span>

                                        @endif


                                        <span class="price">
                                            ${{ number_format($product->selling_price, 2) }}
                                        </span>

                                    </div>


                                    {{-- =========================================================
     PRODUCT VARIANTS
========================================================= --}}
@if($product->productVariants->count() > 0)

    <div class="product-variants">

        {{-- =====================================================
             COLOR
        ====================================================== --}}

        @php
            $colors = $product->productVariants
                ->whereNotNull('color_id')
                ->filter(fn($variant) => $variant->color)
                ->pluck('color')
                ->unique('id');
        @endphp

        @if($colors->count() > 0)

            <div class="variant-group">

                <div class="variant-title-row">
                    <span class="variant-label">
                        Color
                    </span>

                    @if($selectedColorId)
                        @php
                            $selectedColor = $colors->firstWhere('id', $selectedColorId);
                        @endphp

                        @if($selectedColor)
                            <span class="selected-value">
                                {{ $selectedColor->name }}
                            </span>
                        @endif
                    @endif
                </div>


                <div class="color-options">

                    @foreach($colors as $color)

                        <button
                            type="button"
                            wire:click="selectColor({{ $color->id }})"
                            wire:key="color-{{ $color->id }}"
                            class="color-option
                                {{ $selectedColorId == $color->id ? 'selected' : '' }}"
                            title="{{ $color->name }}"
                        >

                            <span
                                class="color-circle"
                                style="background-color: {{ $color->code ?: '#ffffff' }};"
                            ></span>

                            <span class="color-name">
                                {{ $color->name }}
                            </span>

                            @if($selectedColorId == $color->id)
                                <span class="color-check">
                                    ✓
                                </span>
                            @endif

                        </button>

                    @endforeach

                </div>

            </div>

        @endif


        {{-- =====================================================
             SIZE
        ====================================================== --}}

        @php
            $sizes = $product->productVariants
                ->whereNotNull('size_id')
                ->filter(fn($variant) => $variant->size)
                ->pluck('size')
                ->unique('id');
        @endphp

        @if($sizes->count() > 0)

            <div class="variant-group">

                <div class="variant-title-row">

                    <span class="variant-label">
                        Size
                    </span>

                    @if($selectedSizeId)

                        @php
                            $selectedSize = $sizes->firstWhere('id', $selectedSizeId);
                        @endphp

                        @if($selectedSize)
                            <span class="selected-value">
                                {{ $selectedSize->name }}
                            </span>
                        @endif

                    @endif

                </div>


                <div class="size-options">

                    @foreach($sizes as $size)

                        @php
                            $sizeAvailable = $this->isSizeAvailable($size->id);
                        @endphp

                        <button
                            type="button"
                            wire:click="selectSize({{ $size->id }})"
                            wire:key="size-{{ $size->id }}"
                            class="size-option
                                {{ $selectedSizeId == $size->id ? 'selected' : '' }}
                                {{ !$sizeAvailable ? 'disabled' : '' }}"
                            @if(!$sizeAvailable)
                                disabled
                            @endif
                        >
                            {{ $size->name }}
                        </button>

                    @endforeach

                </div>

            </div>

        @endif


        {{-- =====================================================
             AVAILABLE QUANTITY
        ====================================================== --}}

        @if($selectedVariantId)

            <div class="variant-availability">

                @if($availableQuantity > 0)

                    <span>
                        Available Quantity:
                        <strong>{{ $availableQuantity }}</strong>
                    </span>

                @else

                    <span class="unavailable-text">
                        Out of Stock
                    </span>

                @endif

            </div>

        @endif

    </div>

@endif

                                    <!-- STOCK STATUS -->

                                    <div class="stock-status">

                                        @if($product->quantity > 0)

                                            <span class="stock-badge in-stock">

                                                <i class="fa fa-check-circle"></i>

                                                In Stock

                                            </span>

                                        @else

                                            <span class="stock-badge out-stock">

                                                <i class="fa fa-times-circle"></i>

                                                Out of Stock

                                            </span>

                                        @endif

                                    </div>


                                    <!-- DESCRIPTION -->

                                    <div class="product-description">

                                        <ul class="product-desc-list">
                                            @if($product->description)

                                                <li>
                                                    {{ $product->description }}
                                                </li>

                                            @endif

                                        </ul>

                                    </div>


                                    <!-- ADD TO CART -->

                                    <div class="product-quick-action">

                                        <div class="white-bg mt-4">

                             <livewire:frontend.cart.add-to-cart
    :product="$product"
    :variantId="$selectedVariantId"
    :quantity="$quantityCount"
/>

                                        </div>

                                    </div>


                                    <!-- BOOK APPOINTMENT -->

                                    {{-- <div class="product-quick-action">

                                        <div class="white-bg">

                                            <a
                                                href="{{ url('/appointment') }}"
                                                class="btn-product-add btn-appoint"
                                            >
                                                Book Appointment
                                            </a>

                                        </div>

                                    </div> --}}


                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================================
         JAVASCRIPT
         
         ONLY:
         1. Fancybox
         2. Thumbnail switching
         
         NO ASPECT RATIO CALCULATION
    ========================================================= -->

    @push('scripts')

        <script>

            document.addEventListener(
                "DOMContentLoaded",
                function () {


                    /* =====================================================
                       FANCYBOX
                    ===================================================== */

                    if (typeof Fancybox !== 'undefined') {

                        Fancybox.bind(
                            '[data-fancybox="gallery"]',
                            {
                                Thumbs: {
                                    autoStart: true
                                }
                            }
                        );

                    }


                    /* =====================================================
                       MAIN IMAGE
                    ===================================================== */

                    const mainImage =
                        document.getElementById(
                            "main-image"
                        );


                    const mainLink =
                        document.getElementById(
                            "main-image-link"
                        );


                    /* =====================================================
                       THUMBNAIL CLICK
                    ===================================================== */

                    document
                        .querySelectorAll(
                            ".thumb-img-wrapper"
                        )
                        .forEach(
                            function (item) {


                                item.addEventListener(
                                    "click",
                                    function () {


                                        /* ---------------------------------
                                           REMOVE ACTIVE CLASS
                                        --------------------------------- */

                                        document
                                            .querySelectorAll(
                                                ".thumb-img-wrapper"
                                            )
                                            .forEach(
                                                function (el) {

                                                    el.classList.remove(
                                                        "active"
                                                    );

                                                }
                                            );


                                        /* ---------------------------------
                                           ADD ACTIVE CLASS
                                        --------------------------------- */

                                        this.classList.add(
                                            "active"
                                        );


                                        /* ---------------------------------
                                           GET IMAGE URL
                                        --------------------------------- */

                                        const img =
                                            this.getAttribute(
                                                "data-image"
                                            );


                                        /* ---------------------------------
                                           CHANGE MAIN IMAGE
                                        --------------------------------- */

                                        if (
                                            mainImage &&
                                            img
                                        ) {

                                            mainImage.src =
                                                img;

                                        }


                                        /* ---------------------------------
                                           CHANGE FANCYBOX LINK
                                        --------------------------------- */

                                        if (
                                            mainLink &&
                                            img
                                        ) {

                                            mainLink.href =
                                                img;

                                        }

                                    }
                                );

                            }
                        );

                }
            );

        </script>

    @endpush

</div>