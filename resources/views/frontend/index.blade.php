@extends('layouts.app')
@section('title','Home Page')
@section('content')



<section class="home-slider-area pt-0 p-0">
    <div class="container-fluid p-0 pt-2 pb-2">
        <div class="row g-0 align-items-center">
            
     

            <div class="col-12 col-lg-12 p-1">
                <div class="swiper-container swiper-pagination-style dots-bg-light home-slider-container default-slider-container" style="height: 70vh;">
                    <div class="swiper-wrapper home-slider-wrapper slider-default">
                        
                        @foreach ($sliders as $key => $sliderItem)
                        <div class="swiper-slide">
                            @if ($sliderItem->image)
                            <div class="slider-content-area" 
                                 style="height: 100%; background-image: url('{{ asset($sliderItem->image) }}'); background-size: cover; background-position: center; position: relative;">
                                
                                <div class="slider-overlay"></div>

                                <div class="container h-100" style="position: relative; z-index: 2;">
                                    <div class="row h-100 align-items-center justify-content-center justify-content-lg-start">
                                        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                                            <div class="slider-content slider-content-light text-center text-lg-start">
                                                <h2 class="slider-title ani-left">
                                                    {{ $sliderItem->title }}
                                                </h2>
                                                <p class="slider-desc ani-right">
                                                    {{ $sliderItem->description }}
                                                </p>
                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    /* 1. Base Layout */
    .featured-banner-left { border-right: 1px solid #f2f2f2; }
    .home-slider-container { border-radius: 0; overflow: hidden; }

    /* Desktop Overlay (Left to Right Fade) */
    .slider-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0) 100%);
        z-index: 1;
    }

    /* 2. Typography & UI */
    .slider-title {
        color: #fff;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .slider-desc {
        color: rgba(255,255,255,0.9);
        font-size: 14px;
        line-height: 1.6;
    }

    .custom-slider-btn {
        border-radius: 0;
        padding: 12px 35px;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        border-width: 2px;
        margin-top: 30px;
    }

    .custom-slider-btn:hover {
        background-color: #fff !important;
        color: #000 !important;
        transform: translateY(-3px);
    }

    /* 3. Animations */
    .slider-title, .slider-desc, .slider-btn {
        opacity: 0;
        visibility: hidden;
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    /* Desktop slide directions */
    .ani-left   { transform: translateX(-60px); }
    .ani-right  { transform: translateX(60px); }
    .ani-bottom { transform: translateY(40px); }

    .swiper-slide-active .slider-title,
    .swiper-slide-active .slider-desc,
    .swiper-slide-active .slider-btn {
        opacity: 1;
        visibility: visible;
        transform: translate(0, 0);
    }

    .swiper-slide-active .slider-title { transition-delay: 0.3s; }
    .swiper-slide-active .slider-desc  { transition-delay: 0.5s; }
    .swiper-slide-active .slider-btn   { transition-delay: 0.7s; }

    /* 4. Responsive (Mobile & Tablet) */
    @media (max-width: 991px) {
        .home-slider-container, .featured-banner-left { height: 450px !important; }
    }

    @media (max-width: 767px) {
        .home-slider-container { height: 350px !important; }

        /* Darken entire overlay for mobile text readability */
        .slider-overlay {
            background: rgba(0,0,0,0.45) !important;
        }

        .slider-title { font-size: 22px !important; }
        .slider-desc { font-size: 12px !important; padding: 0 10px; }

        /* Change slide direction on mobile to vertical for cleaner look */
        .ani-left   { transform: translateY(-30px); }
        .ani-right  { transform: translateY(30px); }
    }
    
    /* Hover effect for side banner */
    .featured-banner-left img { transition: transform 1.5s ease; }
    .featured-banner-left:hover img { transform: scale(1.05); }
    .slider-content h2 , .slider-content p{
        text-align: start;
        padding: 0px;
    }
    

/* ============================================================
   EXHIBITIONS
============================================================ */

.exhibitions-area {
    padding: 28px 0 32px;

    overflow: hidden;

    background: #fff4f4;
}

.signature-collections {

    background: #f7f2eb;

    padding: 0px 0;

    overflow: hidden;
}


/*==================================================
    CONTAINER
==================================================*/

.collections-container {

    padding-left: 40px;

    padding-right: 40px;
}


/*==================================================
    TITLE
==================================================*/

.collections-title {

    text-align: center;

    margin-bottom: 0;
}


.collections-title > span {

    display: block;

    font-family: 'Roboto';

    font-weight: 600;

    font-size: 20px;

    letter-spacing: 4px;

    color: var(--boutique-dark);

    text-transform: uppercase;
}


/*==================================================
    DIVIDER
==================================================*/

.divider {

    width: 120px;

    height: 25px;

    margin: 0 auto;

    position: relative;
}


.divider::before {

    content: "";

    position: absolute;

    left: 0;

    right: 0;

    top: 50%;

    height: 1px;

    background: #d7c4a2;
}


.divider span {

    position: absolute;

    left: 50%;

    top: 50%;

    width: 12px;

    height: 12px;

    background: #b39256;

    transform: translate(-50%, -50%) rotate(45deg);
}


/*==================================================
    SWIPER WRAPPER
==================================================*/

.collections-slider-wrapper {

    position: relative;

    width: 100%;

    overflow: hidden;
}


.section-title-demanto {
    color: #B39256;

    font-family:
        "Cormorant Garamond",
        serif;

    font-size: 28px;
    font-weight: 500;

    letter-spacing: 1.5px;
}


.demanto-exhibition-link {
    display: block;

    text-decoration: none;
}


.demanto-exhibition-item {
    width: 100%;

    overflow: hidden;

    border-radius: 15px;

    background: #F4F0E8;
}


.demanto-exhibition-item img {
    display: block;

    width: 100%;
    height: 400px;

    object-fit: cover;

    transition:
        transform 0.5s ease,
        opacity 0.5s ease;
}


.demanto-exhibition-item:hover img {
    transform: scale(1.05);
}


.swiper-slide-prev
.demanto-exhibition-item img,

.swiper-slide-next
.demanto-exhibition-item img {
    opacity: 0.60;
}


/* ============================================================
   EXHIBITION NAVIGATION
============================================================ */

.demanto-prev,
.demanto-next {
    position: absolute;

    top: 50%;

    z-index: 10;

    width: 35px;
    height: 35px;

    display: flex;

    align-items: center;
    justify-content: center;

    border: 1px solid #D7C7A4;

    border-radius: 50%;

    background: #FFFFFF;

    color: #B39256;

    cursor: pointer;

    transform: translateY(-50%);

    transition: var(--transition-smooth);
}


.demanto-prev {
    left: -10px;
}


.demanto-next {
    right: -10px;
}


.demanto-prev:hover,
.demanto-next:hover {
    border-color: #B39256;

    background: #B39256;

    color: #FFFFFF;
}


.btn-demanto {
    position: relative;
    z-index: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 9px 24px;
    overflow: hidden;
    border: 0;
    border-radius: 25px;
    background: linear-gradient(135deg, var(--logo-pink-dark), var(--logo-pink-dark));
    color: #FFFFFF !important;
    font-family: "Montserrat", sans-serif;
    font-size: 10px;
    font-weight: 500;
    line-height: 1.4;
    letter-spacing: 1.5px;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    cursor: pointer;
    transition: var(--transition-smooth);
}
</style>

<section>
    <div class="about-editorial-root py-2 position-relative overflow-hidden">
        @if($about)
        <div class="art-background-layer">
            
            <div class="large-bg-text">{{ $about->title ?? 'About Us' }}</div>
            <svg class="botanical-svg" viewBox="0 0 100 100" fill="none">
                <path d="M10 80C30 80 80 60 90 10M10 80C40 70 80 40 90 10" stroke="#b95c19" stroke-width="0.2" opacity="0.2"/>
            </svg>
        </div>

        <div class="wide-content-wrapper px-4 px-md-5 position-relative z-2">
            
            <div class="header-minimal mb-4">
                <h2 class="display-title mt-2">{{ $about->title ?? 'About Us' }}</h2>
 
            </div>

            <div class="description-full-width">
                <p class="editorial-text" v-html="">{!! nl2br(e($about->description)) !!}
                </p>
            </div>

            <div class="footer-compact mt-5 d-flex align-items-center gap-4">
                <div class="signature-wrap">
                    <img src="/assets/img/logo.png" alt="Signature" class="about-sig-logo">
            
                </div>
            
                <span class="motto mt-4">{{ $about->title ?? 'About Us' }}</span>
            </div>
            
        </div>
        @else
        <div class="container py-5 text-center">
            <p>About Us content is currently being updated.</p>
        </div>
    @endif
    </div>
  </section>

<script setup>
defineProps({ about: Object });
</script>

<style >
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,900;1,400&family=Montserrat:wght@300;400;600;700&display=swap');

.about-editorial-root {
    background-color: #ffffff;
    color: #51555A;
    font-family: 'Montserrat', sans-serif;
    width: 100%;
    min-height: 20vh;
    display: flex;
    align-items: center;
}

/* Background "Polish It" Text Styling */
.art-background-layer {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 1;
}

.large-bg-text {
    position: absolute;
    top: 50%;
    left: 13%;
    transform: translateY(-50%);
    font-size: 10vw;
    font-weight: 900;
    color: #e0a4a40d !important; /* Extremely subtle grey-white */
    letter-spacing: 1px;
    line-height: 0.8;
    white-space: nowrap;
    z-index: 1;
}

.botanical-svg {
    position: absolute;
    width: 25%;
    top: 10%;
    right: -2%;
    z-index: 1;
    transform: rotate(-15deg);
}

/* Content Layout */
.wide-content-wrapper {
    width: 100%;
    z-index: 2;
}

/* Typography - Small & Refined */
.eyebrow {
    font-size: 0.6rem;
    text-transform: uppercase;
    letter-spacing: 4px;
    color: #e0a4a4 !important;
    font-weight: 700;
}

.display-title {
    font-size: 24px; /* Reduced for elegance */
    font-weight: 700;
    color: #51555A;
    text-transform: capitalize;
}

.accent-line {
    width: 40px;
    height: 1px;
    background-color: #e0a4a4 !important;
}

.editorial-text {
    /* Small font size matching footer (approx 13px) */
    font-size: 0.75rem; 
    line-height: 2.2;
    color: #51555A;
    font-weight: 400;

    letter-spacing: 0.4px;
}

/* Signature & Logo Styling */
.about-sig-logo {
    width: 55px;
    height: auto;
    opacity: 0.9;
}

.sig-font {
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    font-style: italic;
    color: #1a1a1a;
}

.dot-divider {
    width: 4px;
    height: 4px;
    background-color: #e0a4a4 !important;
    border-radius: 50%;
}

.motto {
    font-size: 9px;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #999;
}

@media (max-width: 768px) {
    .large-bg-text { font-size: 10vw; left: 4%;letter-spacing: 1px;}
    .display-title { font-size: 1.1rem; margin-top: 20px !important; }
    .editorial-text { font-size: 0.7rem; max-width: 100%; }
    .footer-compact { flex-direction: column; align-items: flex-start; gap: 15px; }
    .dot-divider { display: none; }
}
</style>

<section class="product-area">
    <div class="container pb-0">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="section-title text-center mb-1">
                    <h2 class="title" style="text-transform: capitalize;">Our Products</h2>
                </div>
            </div>
        </div>
        
        <div class="row">
            {{-- Using newArrivalsProducts and taking only 6 items --}}
            @forelse ($newArrivalsProducts->take(6) as $product)
                <div class="col-6 col-md-4 col-lg-3 mb-30 p-0">
                    <div class="product-item">
                        <div class="inner-content">
                            <div class="product-thumb">
                                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                    @if($product->productImages->count() > 0)
                                        <img src="{{ asset($product->productImages[0]->image) }}" alt="product-img">                        
                                        <img class="second-image" src="{{ asset($product->productImages[1]->image ?? $product->productImages[0]->image) }}" alt="product-img">
                                    @endif 
                                </a>
                                
                                {{-- <livewire:frontend.indexwish :product="$product"/>
                                 --}}
                                {{-- <div class="white-bg">                            
                                    <livewire:frontend.cart.add-to-cart :product="$product"/>
                                </div> --}}

                                <ul class="product-flag">
                                    <li class="new" style="font-size: 10px;">
                                        @if ($product->quantity > 0)
                                            <span>In Stock</span>
                                        @else
                                            Out of Stock
                                        @endif
                                    </li>
                                    
                                    {{-- Correct Discount Calculation --}}
                                    @if($product->original_price && $product->original_price > $product->selling_price)
                                        @php
                                            $discount = (($product->original_price - $product->selling_price) / $product->original_price ) * 100;
                                        @endphp
                                        <li class="discount" style="font-size: 9px;">-{{ round($discount, 0) }}%</li>
                                    @endif
                                </ul>
                            </div>
<div class="product-desc" style="padding: 0px 0;">
    <div class="product-info">
        <div class="d-flex justify-content-between align-items-center px-4 pt-2 pb-2">
            <h4 class="title" style="margin-bottom: 0;">
                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" 
                   style="color:#51555a; font-size: 0.75rem; font-weight: 700;">
                    {{ $product->name }}
                </a>
            </h4>
            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" 
               style="color: #fff; font-size: 12px;">
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        {{-- <div class="prices mt-1">
            @if($product->original_price > $product->selling_price)
                <span class="price-old" style="font-size: 10px; color: #51555a; text-decoration: line-through; margin-right: 5px;">€{{ $product->original_price }}</span>
            @endif
            <span class="price" style="font-size: 12px; font-weight: 600; color: #e0a4a4;">€{{ $product->selling_price }}</span>
        </div> --}}
    </div>
</div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No Products Available</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

  <!--== End Popup Product  ==-->
{{-- <section class="divider-area divider-product-discount-area bg-img" data-bg-img="{{ asset('assets/img/banner-home.jpg')}}">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="divider-style2-wrap">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-9 col-sm-12">
              <div class="accessory-banner-content animate-fadeInUp">
                <h6 class="banner-sub-title">The Art of Detail</h6>
                <h2 class="banner-main-title">Elevate Your <br class="d-none d-md-block">Everyday Look</h2>
                <p class="banner-description">
                  Discover a curated collection of accessories designed to celebrate your unique elegance. From morning coffee to midnight stars.
                </p>
                <div class="banner-action">
                  <a class="btn-boutique" href="{{ url('collections') }}">Explore Collection</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
  /* Base Desktop Styling */
  .divider-product-discount-area {
    padding: 100px 0;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    min-height: 450px;
    display: flex;
    align-items: center;
  }

  .accessory-banner-content {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    padding: 35px; /* Reduced padding for cleaner look */
    border-radius: 2px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
  }

  /* Small Typography Aesthetic */
  .banner-sub-title {
    font-size: 9px !important; /* Extremely small for luxury feel */
    text-transform: uppercase;
    letter-spacing: 3px;
    color: #e0a4a4;
    margin-bottom: 12px;
    font-weight: 700;
  }

  .banner-main-title {
    font-size: 24px; /* Smaller main title */
    font-weight: 700;
    line-height: 1.2;
    color: #51555A;
    margin-bottom: 15px;
  }

  .banner-description {
    font-size: 0.75rem; /* Reduced description size */
    color: #51555A;
    line-height: 1.6;
    margin-bottom: 25px;
    font-weight: 300;
    max-width: 85%;
  }

  .btn-boutique {
    font-size: 9px; /* Smallest button text */
    text-transform: uppercase;
    letter-spacing: 2px;
    background: #51555A;
    color: #fff;
    padding: 12px 25px;
    display: inline-block;
    transition: 0.3s;
    text-decoration: none;
    font-weight: 600;
  }

  /* --- MOBILE RESPONSIVE --- */

  @media (max-width: 767px) {
    .divider-product-discount-area {
      padding: 50px 0;
      min-height: auto;
      background-attachment: scroll; /* Critical for mobile performance */
    }
      .divider-style2-wrap{
    margin-top: 10%;
  }
    .accessory-banner-content {
      padding: 25px 20px;
      text-align: center;
      width: 90%;
      margin: 0 auto;
    }

    .banner-main-title {
      font-size: 1rem; /* Scaled down for mobile */
      margin-bottom: 10px;
    }

    .banner-description {
      font-size: 10px; /* Smallest readable description */
      max-width: 100%;
      margin-bottom: 20px;
    }

    .banner-sub-title {
      font-size: 8px !important;
      letter-spacing: 2px;
    }

    .btn-boutique {
      padding: 10px 20px;
      width: 100%; /* Easy to click on touch screens */
    }
  }

</style> --}}


{{-- <section class="product-area">
    <div class="container pt-95 pt-lg-70 pb-lg-60">
        <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="section-title text-center mb-1">
                    <h2 class="title" style="text-transform: capitalize; font-size: 20px; letter-spacing: 1px;">Featured Products</h2>
       
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-slider owl-carousel owl-theme">
                    @if($featuredProducts)
                        @foreach ($featuredProducts as $productItem)
                            <div class="item">
                                <div class="product-item">
                                    <div class="inner-content">
                                        <div class="product-thumb">
                                            @if($productItem->productImages->count() > 0)    
                                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                                    @if($productItem->productImages->count() > 1)
                                                        <img class="second-image" src="{{ asset($productItem->productImages[1]->image) }}" alt="{{ $productItem->name }}">
                                                    @endif
                                                </a>
                                            @endif
                                            
                                    
                                            
                                            <div class="white-bg">                            
                                                <livewire:frontend.cart.add-to-cart :product="$productItem"/>
                                            </div>

                                            <ul class="product-flag">
                                                <li class="new" style="font-size: 10px;">
                                                    @if ($productItem->quantity > 0)
                                                        <span>In Stock</span>
                                                    @else
                                                        <span style="background: #999;">Out of Stock</span>
                                                    @endif
                                                </li>
                                                @if($productItem->original_price && $productItem->original_price > $productItem->selling_price)
                                                    @php
                                                        $discount = (($productItem->original_price - $productItem->selling_price) / $productItem->original_price ) * 100;
                                                    @endphp
                                                    <li class="discount" style="font-size: 9px;">-{{ round($discount , 0) }}%</li>
                                                @endif
                                            </ul>
                                        </div>

                                        <div class="product-desc" style="padding: 10px 0;">
                                            <div class="product-info text-center">
                                                <h4 class="title" style="margin-bottom: 5px;">
                                                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" 
                                                       style="color:#51555a; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3px;">
                                                       {{ $productItem->name }}
                                                    </a>
                                                </h4>
                                                <div class="prices">
                                                    @if($productItem->original_price && $productItem->original_price > $productItem->selling_price)
                                                        <span class="price-old" style="font-size: 10px; color: #999; text-decoration: line-through; margin-right: 5px;">
                                                            €{{ $productItem->original_price }}
                                                        </span>
                                                    @endif
                                                    <span class="price" style="font-size: 12px; font-weight: 600; color: #e0a4a4;">
                                                        €{{ $productItem->selling_price }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section> --}}
  <!-- Exhibitions Section - UNCHANGED -->
<section class="exhibitions-area">
    <div class="container">
        <div class="collections-title mb-3">

            <span>EXHIBITIONS & EVENTS</span>

            <div class="divider">
                <span></span>
            </div>

        </div>
        <div class="position-relative">
            <div class="swiper exhibitions-slider">
                <div class="swiper-wrapper">
@foreach($blogs as $exhibition)
<div class="swiper-slide">

    <a href="{{ url('blog/details/'.$exhibition->id) }}"
       class="demanto-exhibition-link">

        <div class="demanto-exhibition-item">

            <img src="{{ asset($exhibition->image) }}"
                 alt="{{ $exhibition->title }}">

 

        </div>

    </a>

</div>
@endforeach
                </div>
            </div>
            <div class="demanto-prev"><i class="fa fa-angle-left"></i></div>
            <div class="demanto-next"><i class="fa fa-angle-right"></i></div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('/blogs') }}" class="btn-demanto">VIEW ALL </a>
        </div>
    </div>
</section>

{{-- <section class="instagram-shop-area py-5">
    <div class="container-fluid text-center">
                <div class="row">
            <div class="col-sm-8 m-auto">
                <div class="section-title text-center mb-1">
                    <h2 class="title" style="text-transform: capitalize;">Shop Our Instagram</h2>
                </div>
            </div>
        </div>
        <div class="row g-3">
            @foreach($instaFeeds as $item)
                <div class="col-6 col-md-3">
                    <div class="insta-card position-relative overflow-hidden">
                        <img src="{{ asset($item->image) }}" class="w-100 h-100 object-fit-cover" style="aspect-ratio: 1/1;">
                        
                        <div class="insta-overlay">
                            <div class="d-flex flex-column gap-2">
                                <a href="{{ url('collections/'.$item->product->category->slug.'/'.$item->product->slug) }}" class="btn btn-light btn-sm">
                                    Shop {{ $item->product->name }}<br>
                                    <strong>${{ $item->product->selling_price }}</strong>
                                </a>

                                @if($item->insta_link)
                                    <a href="{{ $item->insta_link }}" target="_blank" class="btn btn-outline-light btn-sm">
                                        <i class="fa fa-instagram"></i> View on Instagram
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<style>
.insta-card .insta-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: 0.3s;
}
.insta-card:hover .insta-overlay { opacity: 1; }
.insta-overlay .btn{
background: var(--logo-pink-dark);
color: white;
border: transparent;
font-size: 12px;
}
</style> --}}

<style>
   .product-item{
  margin: 10px;
 }
</style>
      
      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      
      <script>
        $(document).ready(function(){
          $('.btn-quick-vieww').click(function(){
            $('#exampleModal').modal('show');
          });
        });
      </script>
@endsection



@section('script')
<script>
  $('.four-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
  </script>
  <style>
.banner-overlay-text h6 , .banner-overlay-text h4{
  color: white;
}
.testimonial-area{
  background: #fbfbfb;
}
.firstActiveItem .testimonial-item .testi-inner-content .testi-content {
  background: white;
}
  </style>

@endsection




