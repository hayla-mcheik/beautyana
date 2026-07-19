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
           MAIN SWIPER - NO CROPPING (UPDATED)
        ========================================================= */

        .single-product-thumb-content {
            width: 100%;
            height: 500px;
            margin-bottom: 15px;
            border-radius: 15px;
            overflow: hidden;
            background: var(--demanto-gold-light);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .single-product-thumb-content .swiper-wrapper {
            width: 100%;
            height: 100%;
        }

        .single-product-thumb-content .swiper-slide {
            width: 100% !important;
            height: 100%;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* =========================================================
           MAIN IMAGE - NO CROPPING (UPDATED)
        ========================================================= */

        #main-image {
            display: block;
            width: 100% !important;
            height: 100% !important;
            max-width: 100% !important;
            max-height: 100% !important;
            margin: 0 auto !important;
            padding: 20px !important;
            object-fit: contain !important; /* NO CROPPING */
            object-position: center;
            transition: transform 0.5s ease;
        }

        /* =========================================================
           LIGHTBOX LINK
        ========================================================= */

        .lightbox-image {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        /* =========================================================
           THUMBNAIL SWIPER - NO CROPPING (UPDATED)
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
            width: auto !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* =========================================================
           THUMBNAIL CARD - NO CROPPING (UPDATED)
        ========================================================= */

        .thumb-img-wrapper {
            width: 100%;
            height: 95px;
            padding: 8px;
            background: #ffffff;
            border: 2px solid transparent;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition-smooth);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .thumb-img-wrapper:hover,
        .swiper-slide-thumb-active .thumb-img-wrapper,
        .thumb-img-wrapper.active {
            border-color: var(--demanto-gold);
            box-shadow: 0 5px 15px rgba(179, 146, 86, 0.15);
        }

        /* =========================================================
           THUMBNAIL IMAGE - NO CROPPING (UPDATED)
        ========================================================= */

        .thumbnail-image {
            display: block;
            width: 100% !important;
            height: 100% !important;
            max-width: 100% !important;
            max-height: 100% !important;
            margin: 0 auto !important;
            padding: 2px !important;
            object-fit: contain !important; /* NO CROPPING */
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
            margin-top: 10px;
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

   
        .white-bg {
            margin-bottom: 12px;
        }

        /* =========================================================
           TABLET - NO CROPPING
        ========================================================= */

        @media (max-width: 991px) {
            .product-single-info {
                padding-left: 0;
                margin-top: 30px;
            }

            .single-product-thumb-content {
                height: 450px;
            }

            #main-image {
                padding: 15px !important;
                object-fit: contain !important;
            }

            .product-single-info .title {
                font-size: 27px;
            }

            .price {
                font-size: 23px;
            }

            .thumb-img-wrapper {
                height: 85px;
                padding: 6px;
            }
        }

        /* =========================================================
           MOBILE - NO CROPPING (UPDATED)
        ========================================================= */

        @media (max-width: 768px) {
            .product-single-area {
                padding: 20px 0 35px;
            }

            .product-thumb {
                padding: 15px;
            }

            .single-product-thumb-content {
                height: 350px !important;
                min-height: 250px;
            }

            #main-image {
                padding: 15px !important;
                object-fit: contain !important;
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
                height: 65px;
                width: 65px;
                min-width: 65px;
                padding: 4px;
            }

            .thumbnail-image {
                padding: 2px !important;
                object-fit: contain !important;
            }

            .product-desc-list li {
                font-size: 13px;
            }

            .single-product-nav-content .swiper-slide {
                width: 75px !important;
                flex-shrink: 0;
            }
        }

        /* =========================================================
           SMALL MOBILE - NO CROPPING (UPDATED)
        ========================================================= */

        @media (max-width: 576px) {
            .product-single-area {
                padding-top: 15px;
            }

            .product-thumb {
                padding: 10px;
            }

            .single-product-thumb-content {
                height: 280px !important;
                min-height: 200px;
            }

            #main-image {
                padding: 12px !important;
                object-fit: contain !important;
            }

            .thumb-img-wrapper {
                height: 55px;
                width: 55px;
                min-width: 55px;
                padding: 3px;
            }

            .thumbnail-image {
                padding: 2px !important;
            }

            .product-single-info .title {
                font-size: 20px;
            }

            .price {
                font-size: 18px;
            }

            .single-product-nav-content .swiper-slide {
                width: 65px !important;
            }

            .row.g-3 {
                --bs-gutter-y: 1rem;
            }

            .product-thumb {
                padding: 8px;
            }
        }

        /* =========================================================
           EXTRA SMALL MOBILE - NO CROPPING (UPDATED)
        ========================================================= */

        @media (max-width: 400px) {
            .single-product-thumb-content {
                height: 220px !important;
                min-height: 180px;
            }

            #main-image {
                padding: 8px !important;
            }

            .thumb-img-wrapper {
                height: 45px;
                width: 45px;
                min-width: 45px;
                padding: 2px;
            }

            .thumbnail-image {
                padding: 1px !important;
            }

            .single-product-nav-content .swiper-slide {
                width: 55px !important;
            }

            .product-thumb {
                padding: 5px;
                border-radius: 12px;
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
           FIX FOR FANCYBOX ON MOBILE
        ========================================================= */

        .fancybox-slide--image {
            padding: 0 !important;
        }

        .fancybox-image {
            object-fit: contain !important;
        }
        .btn-appoint{
            background-color: var(--demanto-gold) !important;
            color: white !important;
        }
        .btn-appoint::before{
            display: none !important;
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
                                 PRODUCT IMAGES - NO CROPPING
                            ================================================== -->
                            <div class="col-md-6">
                                <div wire:ignore>
                                    @if($product->productImages && $product->productImages->count() > 0)
                                        <div class="product-thumb">
                                            <!-- MAIN IMAGE -->
                                            <div class="swiper-container single-product-thumb-content single-product-thumb-slider2">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
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
                                                                loading="lazy"
                                                            >
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- =================================================
                                                 THUMBNAILS - NO CROPPING
                                            ================================================== -->
                                            <div class="swiper-container single-product-nav-content single-product-nav-slider2">
                                                <div class="swiper-wrapper">
                                                    @foreach($product->productImages as $index => $itemImg)
                                                        <div class="swiper-slide">
                                                            <div class="thumb-img-wrapper {{ $index === 0 ? 'active' : '' }}">
                                                                <img
                                                                    src="{{ asset($itemImg->image) }}"
                                                                    class="thumbnail-image"
                                                                    alt="{{ $product->name }}"
                                                                    data-index="{{ $index }}"
                                                                    data-image="{{ asset($itemImg->image) }}"
                                                                    loading="lazy"
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
                                                <p class="mb-0">No product images available.</p>
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
                                    <h1 class="title">{{ $product->name }}</h1>

                                    <!-- PRICES -->
                                    <div class="prices">
                                        @if($product->original_price > $product->selling_price)
                                            <span class="old_price">${{ number_format($product->original_price, 2) }}</span>
                                        @endif
                                        <span class="price">${{ number_format($product->selling_price, 2) }}</span>
                                    </div>

                                    <!-- STOCK STATUS -->
                                    <div class="stock-status">
                                        @if($product->quantity > 0)
                                            <span class="stock-badge in-stock">
                                                <i class="fa fa-check-circle"></i> In Stock
                                            </span>
                                        @else
                                            <span class="stock-badge out-stock">
                                                <i class="fa fa-times-circle"></i> Out of Stock
                                            </span>
                                        @endif
                                    </div>

                                    <!-- DESCRIPTION -->
                                    <div class="product-description">
                                        <ul class="product-desc-list">
                                            @if($product->small_description)
                                                <li>{{ $product->small_description }}</li>
                                            @endif
                                            @if($product->description)
                                                <li>{{ $product->description }}</li>
                                            @endif
                                        </ul>
                                    </div>

                                    <!-- CART -->
                                    <div class="product-quick-action">
                                        <div class="white-bg ">
                                            <livewire:frontend.cart.add-to-cart :product="$product" />
                                        </div>
                                    </div>
                                    <!-- apppointment -->
                                        <div class="product-quick-action">
                                        <div class="white-bg">
                                            <div>
  <a
    href="{{ url('/appointment') }}"
    class="btn-product-add btn-appoint">

    Book Appointment

</a>
</div>
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
         JAVASCRIPT - UPDATED FOR NO CROPPING
    ========================================================= -->

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const mainImage = document.getElementById('main-image');
                const mainImageLink = document.getElementById('main-image-link');
                const thumbnails = document.querySelectorAll('.thumbnail-image');

                // Function to initialize zoom with proper sizing
                function initializeZoom() {
                    if (!mainImage || !mainImageLink || typeof $.fn.zoom === 'undefined') {
                        return;
                    }

                    // Destroy existing zoom
                    $('.zoom-hover').trigger('zoom.destroy');

                    // Initialize zoom with proper options
                    $('.zoom-hover').zoom({
                        url: mainImageLink.getAttribute('href'),
                        magnify: 1.5,
                        touch: true // Enable touch support for mobile
                    });
                }

                // Function to initialize fancybox
                function initializeFancybox() {
                    if (typeof $ === 'undefined' || typeof $.fancybox === 'undefined') {
                        return;
                    }

                    $.fancybox.destroy();
                    $('[data-fancybox="gallery"]').fancybox({
                        protect: true,
                        touch: {
                            vertical: true,
                            momentum: true
                        },
                        thumbs: {
                            autoStart: true
                        }
                    });
                }

                // Initialize on load
                if (mainImage) {
                    if (mainImage.complete) {
                        initializeZoom();
                    } else {
                        mainImage.addEventListener('load', function () {
                            initializeZoom();
                        }, { once: true });
                    }
                }

                initializeFancybox();

                // Handle thumbnail clicks with mobile support
                thumbnails.forEach(function (thumbnail) {
                    thumbnail.addEventListener('click', function (e) {
                        if (!mainImage || !mainImageLink) return;

                        const newImageSrc = this.getAttribute('data-image');
                        if (!newImageSrc) return;

                        // Destroy existing zoom
                        if (typeof $ !== 'undefined' && typeof $.fn.zoom !== 'undefined') {
                            $('.zoom-hover').trigger('zoom.destroy');
                        }

                        // Update image
                        mainImageLink.href = newImageSrc;
                        mainImage.src = newImageSrc;

                        // Reinitialize zoom after image loads
                        if (mainImage.complete) {
                            setTimeout(initializeZoom, 100);
                        } else {
                            mainImage.onload = function () {
                                setTimeout(initializeZoom, 100);
                            };
                        }

                        // Update active thumbnail
                        document.querySelectorAll('.thumb-img-wrapper').forEach(function (wrapper) {
                            wrapper.classList.remove('active');
                        });
                        this.closest('.thumb-img-wrapper').classList.add('active');

                        // Reinitialize fancybox
                        setTimeout(initializeFancybox, 200);
                    });

                    // Add touch support for mobile
                    thumbnail.addEventListener('touchstart', function (e) {
                        // Allow touch events to pass through
                    }, { passive: true });
                });

                // Fix for Swiper on mobile - ensure proper sizing
                if (typeof Swiper !== 'undefined') {
                    setTimeout(function () {
                        const thumbSwiper = document.querySelector('.single-product-nav-content');
                        if (thumbSwiper && thumbSwiper.swiper) {
                            thumbSwiper.swiper.update();
                        }
                    }, 500);
                }
            });

            // Fix for window resize on mobile
            window.addEventListener('resize', function () {
                const mainImage = document.getElementById('main-image');
                if (mainImage && window.innerWidth <= 768) {
                    mainImage.style.objectFit = 'contain';
                }
            });
        </script>
    @endpush
</div>