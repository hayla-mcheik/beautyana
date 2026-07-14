<div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Roboto:wght@300;400;500;700&display=swap');

        :root {
            --demanto-gold: #B39256;
            --demanto-gold-light: #F7F4EB;
            --demanto-dark: #232323;
            --demanto-bg: #FDFBF7;
            --demanto-muted: #6E6E6E;
            --luxury-border: rgba(179, 146, 86, 0.25);
            --transition-smooth: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }


        /* =========================================================
           PRODUCT SINGLE AREA
        ========================================================= */

        .product-single-area {
            background: linear-gradient(135deg, #FDFBF7 0%, #ffffff 100%);
            position: relative;
            overflow: hidden;
            padding: 30px 0 50px;
        }


        /* =========================================================
           PRODUCT CONTAINER
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

            overflow: hidden;
        }


        /* =========================================================
           MAIN SWIPER
        ========================================================= */

        .single-product-thumb-content {
            width: 100%;

            height: 500px;

            margin-bottom: 15px;

            border-radius: 15px;

            overflow: hidden;

            background: var(--demanto-gold-light);
        }


        .single-product-thumb-content .swiper-wrapper {
            width: 100%;
            height: 100%;
        }


        /*
         * Important:
         *
         * Swiper can add inline width values to slides.
         *
         * width:100%!important overrides these values.
         */

        .single-product-thumb-content .swiper-slide {
            width: 100% !important;
            height: 100%;

            position: relative;

            overflow: hidden;
        }


        /* =========================================================
           ZOOM CONTAINER
        ========================================================= */

        .zoom-hover {
            position: relative;

            display: block;

            width: 100%;
            height: 100%;

            overflow: hidden;

            cursor: crosshair;
        }


        /*
         * Anchor must fill the complete container.
         */

        .zoom-hover .lightbox-image {
            display: block;

            width: 100%;
            height: 100%;

            overflow: hidden;
        }


        /* =========================================================
           MAIN IMAGE
        ========================================================= */

        #main-image {
            display: block;

            width: 100% !important;
            height: 100% !important;

            max-width: none !important;
            max-height: none !important;

            margin: 0 !important;
            padding: 0 !important;

            object-fit: cover !important;
            object-position: center;

            transition: transform 0.5s ease;
        }


        /*
         * jQuery Zoom generates another image inside .zoom-hover.
         *
         * Do NOT give that generated image width:100%.
         */

        .zoom-hover > img:not(#main-image) {
            max-width: none !important;
            max-height: none !important;
        }


        /* =========================================================
           THUMBNAIL SWIPER
        ========================================================= */

        .single-product-nav-content {
            width: 100%;

            margin-top: 15px;

            overflow: hidden;
        }


        .single-product-nav-content .swiper-wrapper {
            align-items: stretch;
        }


        .single-product-nav-content .swiper-slide {
            height: auto;
        }


        /* =========================================================
           THUMBNAIL CARD
        ========================================================= */

        .thumb-img-wrapper {
            width: 100%;
            height: 95px;

            padding: 5px;

            background: #ffffff;

            border: 2px solid transparent;

            border-radius: 10px;

            overflow: hidden;

            cursor: pointer;

            transition: var(--transition-smooth);
        }


        .thumb-img-wrapper:hover,
        .swiper-slide-thumb-active .thumb-img-wrapper {
            border-color: var(--demanto-gold);

            box-shadow:
                0 5px 15px
                rgba(179, 146, 86, 0.15);
        }


        /* =========================================================
           THUMBNAIL IMAGE
        ========================================================= */

        .thumbnail-image {
            display: block;

            width: 100% !important;
            height: 100% !important;

            max-width: none !important;

            margin: 0 !important;
            padding: 0 !important;

            object-fit: cover;

            object-position: center;

            transition: transform 0.3s ease;
        }


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

            border-bottom:
                1px solid
                var(--luxury-border);
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
           STOCK
        ========================================================= */

        .stock-status {
            display: block;

            margin-bottom: 20px;
        }


        .stock-badge {
            display: inline-block;

            padding: 6px 15px;

            border-radius: 20px;

            font-size: 10px;

            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: 1px;
        }


        .stock-badge.in-stock {
            background: var(--demanto-gold);

            color: #ffffff;
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

            font-size: 10px;
        }


        /* =========================================================
           CART
        ========================================================= */

        .product-quick-action {
            margin-top: 25px;

            padding-top: 20px;

            border-top:
                1px solid
                var(--luxury-border);
        }


        .white-bg {
            margin-bottom: 12px;
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 991px) {

            .product-single-info {
                padding-left: 0;

                margin-top: 30px;
            }


            .single-product-thumb-content {
                height: 450px;
            }


            .product-single-info .title {
                font-size: 27px;
            }


            .price {
                font-size: 23px;
            }


            .thumb-img-wrapper {
                height: 85px;
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


            .single-product-thumb-content {
                height: 400px;
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


            .thumb-img-wrapper {
                height: 75px;
            }


            .product-desc-list li {
                font-size: 13px;
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


            .single-product-thumb-content {
                height: 350px;
            }


            .thumb-img-wrapper {
                height: 65px;
            }


            .product-single-info .title {
                font-size: 22px;
            }


            .price {
                font-size: 19px;
            }
        }


        /* =========================================================
           ANIMATION
        ========================================================= */

        @keyframes productFade {

            from {
                opacity: 0;

                transform:
                    translateY(20px);
            }


            to {
                opacity: 1;

                transform:
                    translateY(0);
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
                            ================================================== -->

                            <div class="col-md-6">


                                <div wire:ignore>


                                    @if($product->productImages && $product->productImages->count() > 0)


                                        <div class="product-thumb">


                                            <!-- MAIN IMAGE -->

                                            <div class="swiper-container single-product-thumb-content single-product-thumb-slider2">


                                                <div class="swiper-wrapper">


                                                    <div class="swiper-slide zoom zoom-hover">


                                                        <a
                                                            class="lightbox-image"
                                                            data-fancybox="gallery"
                                                            href="{{ asset($product->productImages->first()->image) }}"
                                                            id="main-image-link"
                                                        >


                                                            <img
                                                                src="{{ asset($product->productImages->first()->image) }}"
                                                                alt="{{ $product->name }}"
                                                                id="main-image"
                                                            >


                                                        </a>


                                                    </div>


                                                </div>


                                            </div>



                                            <!-- =================================================
                                                 THUMBNAILS
                                            ================================================== -->

                                            <div class="swiper-container single-product-nav-content single-product-nav-slider2">


                                                <div class="swiper-wrapper">


                                                    @foreach($product->productImages as $index => $itemImg)


                                                        <div class="swiper-slide">


                                                            <div class="thumb-img-wrapper">


                                                                <img
                                                                    src="{{ asset($itemImg->image) }}"
                                                                    class="thumbnail-image"
                                                                    alt="{{ $product->name }}"
                                                                    data-index="{{ $index }}"
                                                                    data-image="{{ asset($itemImg->image) }}"
                                                                >


                                                            </div>


                                                        </div>


                                                    @endforeach


                                                </div>


                                            </div>


                                        </div>


                                    @else


                                        <div class="product-thumb">


                                            <div class="text-center py-5">


                                                <p class="mb-0">

                                                    No product images available.

                                                </p>


                                            </div>


                                        </div>


                                    @endif


                                </div>


                            </div>



                            <!-- =================================================
                                 PRODUCT INFORMATION
                            ================================================== -->

                            <div class="col-md-6">


                                <div class="product-single-info">


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


                                            @if($product->small_description)


                                                <li>

                                                    {{ $product->small_description }}

                                                </li>


                                            @endif



                                            @if($product->description)


                                                <li>

                                                    {{ $product->description }}

                                                </li>


                                            @endif


                                        </ul>


                                    </div>



                                    <!-- CART -->

                                    <div class="product-quick-action">


                                        <div class="white-bg">


                                            <livewire:frontend.cart.add-to-cart
                                                :product="$product"
                                            />


                                        </div>


                                    </div>


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
    ========================================================= -->

    @push('scripts')

        <script>

            document.addEventListener('DOMContentLoaded', function () {


                /*
                |--------------------------------------------------------------------------
                | ELEMENTS
                |--------------------------------------------------------------------------
                */


                const mainImage =
                    document.getElementById('main-image');


                const mainImageLink =
                    document.getElementById('main-image-link');


                const thumbnails =
                    document.querySelectorAll('.thumbnail-image');



                /*
                |--------------------------------------------------------------------------
                | INITIALIZE ZOOM
                |--------------------------------------------------------------------------
                */


                function initializeZoom() {


                    if (
                        !mainImage
                        ||
                        !mainImageLink
                        ||
                        typeof $.fn.zoom === 'undefined'
                    ) {

                        return;

                    }


                    $('.zoom-hover')
                        .trigger('zoom.destroy');


                    $('.zoom-hover')
                        .zoom({

                            url:
                                mainImageLink.getAttribute('href')

                        });

                }



                /*
                |--------------------------------------------------------------------------
                | INITIALIZE FANCYBOX
                |--------------------------------------------------------------------------
                */


                function initializeFancybox() {


                    if (
                        typeof $
                        ===
                        'undefined'
                    ) {

                        return;

                    }


                    if (
                        typeof $.fancybox
                        ===
                        'undefined'
                    ) {

                        return;

                    }


                    $.fancybox.destroy();


                    $('[data-fancybox="gallery"]')
                        .fancybox();

                }



                /*
                |--------------------------------------------------------------------------
                | INITIAL LOAD
                |--------------------------------------------------------------------------
                */


                if (mainImage) {


                    if (mainImage.complete) {


                        initializeZoom();


                    } else {


                        mainImage.addEventListener(

                            'load',

                            function () {


                                initializeZoom();


                            },

                            {
                                once: true
                            }

                        );


                    }


                }



                initializeFancybox();



                /*
                |--------------------------------------------------------------------------
                | THUMBNAIL CLICK
                |--------------------------------------------------------------------------
                */


                thumbnails.forEach(function (thumbnail) {


                    thumbnail.addEventListener(


                        'click',


                        function () {


                            if (
                                !mainImage
                                ||
                                !mainImageLink
                            ) {

                                return;

                            }


                            const newImageSrc =

                                this.getAttribute(

                                    'data-image'

                                );


                            if (!newImageSrc) {

                                return;

                            }



                            /*
                             * Destroy existing zoom.
                             */


                            if (
                                typeof $
                                !==
                                'undefined'
                                &&
                                typeof $.fn.zoom
                                !==
                                'undefined'
                            ) {


                                $('.zoom-hover')
                                    .trigger('zoom.destroy');


                            }



                            /*
                             * Change image.
                             */


                            mainImageLink.href =
                                newImageSrc;


                            mainImage.src =
                                newImageSrc;



                            /*
                             * Initialize zoom after the
                             * new image finishes loading.
                             */


                            if (mainImage.complete) {


                                initializeZoom();


                            } else {


                                mainImage.onload =
                                    function () {


                                        initializeZoom();


                                    };


                            }



                            /*
                             * Update active thumbnail.
                             */


                            document
                                .querySelectorAll(
                                    '.thumb-img-wrapper'
                                )
                                .forEach(
                                    function (wrapper) {


                                        wrapper.classList
                                            .remove('active');


                                    }
                                );


                            this
                                .closest(
                                    '.thumb-img-wrapper'
                                )
                                .classList
                                .add('active');



                            /*
                             * Reinitialize Fancybox.
                             */


                            initializeFancybox();


                        }


                    );


                });


            });

        </script>

    @endpush


</div>