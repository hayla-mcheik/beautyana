@extends('layouts.app')
@section('title', 'Home Page')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap');
    :root {
       
        --demanto-gold-light: #F7F4EB;
    --demanto-gold:#C5A15A;
    --demanto-dark:#4F4033;
    --demanto-bg:#FDFBF7;
    --demanto-muted:#85715F;
        --luxury-border: rgba(179, 146, 86, 0.25);
        --transition-smooth: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        --box-shadow-luxury: 0 25px 45px rgba(179, 146, 86, 0.1);
    }

    body {
        background-color: var(--demanto-bg);
        color: var(--demanto-dark);
        font-family:"Cormorant Garamond",serif;
        overflow-x: hidden;
        font-size: 13px;
    }

    /* Typography - Minimized */
    .luxury-heading {
    font-family:"Cormorant Garamond",serif;
        font-weight: 500;
          color:#6E5A46;
        letter-spacing: 1px;
        text-transform: uppercase;
        background: linear-gradient(135deg, var(--demanto-dark) 0%, var(--demanto-gold) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 32px !important;
    }

    .luxury-sub {
        font-size: 9px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--demanto-gold);
        font-weight: 500;
        display: inline-block;
        position: relative;
        padding-bottom: 4px;
    }
    
    .luxury-sub::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 25px;
        height: 1.5px;
        background: var(--demanto-gold);
    }

    .luxury-section-title {
        text-align: center;
        margin-bottom: 25px;
        position: relative;
    }
    
    /* Buttons - Minimized */
    .btn-demanto {
        background: linear-gradient(135deg, var(--demanto-dark) 0%, #9a7b45 100%);
        color: #fff !important;
        font-size: 9px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 8px 22px;
        border: none;
        border-radius: 25px;
        transition: var(--transition-smooth);
        display: inline-block;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    
    .btn-demanto::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--demanto-dark) 0%, #1a1a1a 100%);
        transition: all 0.5s ease;
        z-index: -1;
        border-radius: 25px;
    }
    
    .btn-demanto:hover::before {
        left: 0;
    }
    
    .btn-demanto:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(179, 146, 86, 0.3);
    }

    .btn-demanto-outline {
        border: 1.5px solid var(--demanto-gold);
        color: var(--demanto-gold);
        font-size: 9px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 8px 20px;
        background: transparent;
        border-radius: 25px;
        transition: var(--transition-smooth);
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-demanto-outline:hover {
        background: var(--demanto-gold);
        color: #fff !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(179, 146, 86, 0.2);
    }
    /* About Section - Minimized */
    .about-editorial-section {
        background: linear-gradient(135deg, #FBF9F4 0%, #fff 100%);
        position: relative;
        overflow: hidden;
        padding: 30px 0;
    }
    
    .about-title {
        font-family:"Cormorant Garamond",serif;
        font-size: 24px;
        line-height: 1.2;
        color: var(--demanto-dark);
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        display: inline-block;
        margin-bottom: 12px;
    }
    
    .about-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 40px;
        height: 2px;
        background: linear-gradient(90deg, var(--demanto-gold), transparent);
    }
    
    .about-description {
        color: #666;
        font-size: 14px;
        line-height: 1.6;
        margin-top: 15px;
    }
    
    .metric-number {
        color: var(--demanto-gold);
        font-size: 22px;
        margin-bottom: 4px;
        font-weight: 600;
        font-family:"Cormorant Garamond",serif;
    }
    
    .metric-item i {
        font-size: 22px;
        color: var(--demanto-gold);
        transition: all 0.3s ease;
    }
    
    .metric-label {
        font-size: 8px;
        letter-spacing: 1px;
        color: #333;
        text-transform: uppercase;
        line-height: 1.3;
        font-weight: 500;
        margin-top: 6px;
    }

    /* Featured Products - Minimized */
    .featured-products {
        background: linear-gradient(180deg, #fff, #faf8f3);
        overflow: hidden;
        padding: 0px 0;
    }
    
    .featured-product-card {
        background: #fff;
        border-radius: 20px;
        border: 1px solid rgba(179, 146, 86, 0.15);
        overflow: hidden;
        transition: 0.4s;
        height: 100%;
    }
    
    .featured-product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(179, 146, 86, 0.12);
    }
    
    .featured-image {
        height: 300px;
        background: #f8f5ef;
        overflow: hidden;
        position: relative;
    }
    
    .featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        padding: 20px;
        transition: 0.5s;
    }
    
    .featured-product-card:hover img {
        transform: scale(1.05);
    }
    
    .featured-content {
        padding: 15px;
        text-align: center;
    }
    
    .featured-content h4 {
        font-family:"Cormorant Garamond",serif;
        font-size: 14px;
        margin-bottom: 6px;
        color: var(--boutique-dark);
    }
    
    .featured-content a {
        color: var(--boutique-text);
        text-decoration: none;
        text-transform: uppercase;
        font-size: 9px;
        letter-spacing: 1px;
    }

    /* Exhibitions Section - UNCHANGED */
    .exhibitions-area {
        background: #FBF9F4;
        padding: 10px 0;
    }
    
    .section-title-demanto {
        font-family:"Cormorant Garamond",serif;
        color: #B39256;
        font-size: 28px;
        letter-spacing: 1.5px;
        font-weight: 500;
    }
    
    .demanto-exhibition-item {
        overflow: hidden;
        border-radius: 15px;
    }
    
    .demanto-exhibition-item img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        transition: 0.5s;
    }
    
    .demanto-exhibition-item:hover img {
        transform: scale(1.05);
    }
    
    .swiper-slide-prev .demanto-exhibition-item img,
    .swiper-slide-next .demanto-exhibition-item img {
        opacity: 0.6;
    }
    
    .demanto-prev,
    .demanto-next {
        width: 35px;
        height: 35px;
        border: 1px solid #d7c7a4;
        border-radius: 50%;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        color: #b39256;
        cursor: pointer;
        transition: 0.3s;
    }
    
    .demanto-prev {
        left: -10px;
    }
    
    .demanto-next {
        right: -10px;
    }
    
    .demanto-prev:hover,
    .demanto-next:hover {
        background: #B39256;
        color: #fff;
    }

    /* Appointment Section - Minimized */
    .appointment-marquee {
        background: linear-gradient(135deg, rgba(179, 146, 86, 0.05) 0%, rgba(179, 146, 86, 0.02) 100%);
        border-top: 1px solid var(--luxury-border);
        border-bottom: 1px solid var(--luxury-border);
        position: relative;
        overflow: hidden;
        padding: 10px 0;
    }
    
    .appointment-marquee::before {
        content: '✧';
        position: absolute;
        top: 15px;
        left: 15px;
        font-size: 80px;
        color: var(--demanto-gold);
        opacity: 0.03;
        font-family: serif;
    }
    
    .appointment-marquee::after {
        content: '✧';
        position: absolute;
        bottom: 15px;
        right: 15px;
        font-size: 80px;
        color: var(--demanto-gold);
        opacity: 0.03;
        font-family: serif;
    }

    /* Loading Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    section {
        animation: fadeInUp 0.6s ease-out;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .slider-title { font-size: 30px; }
        .about-title { font-size: 22px; }
        .metric-number { font-size: 20px; }
        .luxury-heading { font-size: 20px !important; }
    }
    
    @media (max-width: 991px) {
        .home-slider-area, .home-slider-container { height: 600px !important; }
        .slider-title { font-size: 28px; }
        .collection-image { height: 180px; }
        .featured-image { height: 2800px; }
        .demanto-exhibition-item img { height: 340px; }
    }
    
    @media (max-width: 768px) {
        .home-slider-area, .home-slider-container { height: 500px !important; }
        .slider-title { font-size: 22px !important; letter-spacing: 1px; }
        .slider-desc { font-size: 12px !important; }
        .luxury-heading { font-size: 18px !important; }
        .about-title { font-size: 20px; }
        .metric-number { font-size: 18px; }
        .collection-image { height: 150px; padding: 15px; }
        .collection-content h4 { font-size: 13px; }
        .btn-demanto, .btn-demanto-outline { padding: 6px 16px; font-size: 8px; }
        .featured-image { height: 280px; }
        .demanto-exhibition-item img { height: 200px; }
    }
    
    @media (max-width: 576px) {
        .slider-title { font-size: 18px !important; }
        .luxury-section-title { margin-bottom: 20px; }
        .metric-number { font-size: 16px; }
        .metric-label { font-size: 7px; }
        .collection-image { height: 120px; padding: 12px; }
        .collection-content h4 { font-size: 12px; }
    }

    /* Custom Scrollbar */
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
    
    ::-webkit-scrollbar-thumb:hover {
        background: #9a7b45;
    }

    .appointment-marquee {
        position: relative;
        min-height: 200px;
        background: url('{{ asset("assets/img/appoint.jpg") }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        align-items: center;
    }

    .appointment-overlay {
        position: absolute;
        background: linear-gradient(rgb(14 14 14 / 64%), rgb(98 98 98 / 45%));
        z-index: 1;
    }

    .appointment-text {
        color: #fff;
        font-size: 13px;
        line-height: 1.6;
    }

    .luxury-sub {
        color: #fff;
        letter-spacing: 4px;
    }

    .appointment-marquee .btn-demanto {
        min-width: 180px;
        padding: 10px 25px;
        letter-spacing: 2px;
        font-size: 9px;
    }

    .appointment-marquee .btn-demanto-outline {
        min-width: 180px;
        padding: 10px 25px;
        letter-spacing: 2px;
        font-size: 9px;
    }
    /* Additional utility classes */
.header-area.header-default {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1050; 
    background: transparent;
}

.home-slider-area {
    position: relative;
    z-index: 1;
}

/*=========================================
        HERO IMAGE
=========================================*/

.home-banner{

    position:relative;

    width:100%;

    height:50vh;

    min-height:500px;

    overflow:hidden;
}

.hero-banner-image{

    position:relative;

    width:100%;

    height:100%;

    background-size:cover;

    background-repeat:no-repeat;

    background-position:center center;

    display:flex;

    align-items:center;
}
.slider-overlay{

    position:absolute;

    inset:0;

    z-index:2;

    background:linear-gradient(
        160deg,
        rgba(248,245,240,.98) 0%,
        rgba(251, 251, 251, 0.85) 25%,
        rgba(248,245,240,.18) 55%,
        rgba(0, 0, 0, 0) 85%
    );
}
.slider-content{

    position:relative;

    z-index:5;

    max-width:620px;

    padding-top:30px;
}

.slider-title{
    font-family:"Cormorant Garamond",serif;
    font-size:50px;
text-transform: uppercase;
    color:var(--boutique-text);

    margin-bottom:10px;
}

.slider-desc{
font-family:"Cormorant Garamond",serif;
    max-width:300px;

    font-size:15px;
    color:var(--boutique-dark);

    margin-bottom:15px;
}
@media(max-width:1200px){

.home-banner{

    min-height:650px;
}

.slider-title{

    font-size:56px;
}

}

@media(max-width:991px){

.home-banner{

    min-height:580px;
}

.hero-banner-image{

    background-position:65% center;
}

.slider-content{

    text-align:start;

    margin:auto;

    padding-top:10px;
}

.slider-title{

    font-size:42px;
}

.slider-desc{

    margin:auto auto 30px;

    font-size:16px;
}

.slider-btn{

    display:flex;

    justify-content:start;
}

}

@media(max-width:768px){

.home-banner{

    min-height:500px;
}

.hero-banner-image{

    background-position:70% center;
}

.slider-title{

    font-size:30px;
}

.slider-desc{

    font-size:14px;
}

.btn-demanto{

    padding:12px 28px;

    font-size:11px;
}

}

@media(max-width:480px){

.home-banner{

    min-height:430px;
}

.slider-title{

    font-size:24px;
}

.slider-desc{

    font-size:13px;
}

.btn-demanto{

    width:100%;

    max-width:240px;
}

}
.hero-banner-image{
    position:relative;
    overflow:hidden;
}

.hero-dark-overlay{
    position:absolute;
    inset:0;
  background:rgba(0,0,0,.45);
    z-index:1;
}
        .appointment-section{

    position:relative;

    padding:20px 0;

    background:url('assets/img/appointment.jpg') center center;

    background-size:cover;
}

.appointment-overlay{

    position:absolute;

    inset:0;

}

.appointment-section .container{

    position:relative;

    z-index:2;
}

.appointment-label{

    color:#B39256;

    font-size:11px;

    letter-spacing:4px;

    text-transform:uppercase;
}

.appointment-section h2{

    color:#fff;

    font-size:36px;

    margin:15px 0;

    font-weight:500;
}

.appointment-section p{

    color:#d7d7d7;

    font-size:14px;

    line-height:28px;

    max-width:420px;
}

.appointment-form{

    background:rgba(255,255,255,.96);

    padding:40px;

    border-radius:10px;
}

.appointment-form .form-control{

    height:48px;

    border:none;

    border-bottom:1px solid #ddd;

    border-radius:0;

    background:transparent;

    font-size:13px;

    box-shadow:none;
}

.appointment-form textarea.form-control{

    height:120px;

    resize:none;
}

.appointment-form .form-control:focus{

    border-color:#B39256;

    box-shadow:none;
}

.appointment-btn{

    background:#B39256;

    color:#fff;

    border:none;

    padding:14px 45px;

    font-size:12px;

    letter-spacing:3px;

    transition:.3s;
}

.appointment-btn:hover{

    background:#232323;
}
@media(max-width:991px){

.appointment-section{

    padding:70px 0;
}

.appointment-section h2{

    font-size:28px;

    text-align:center;
}

.appointment-section p{

    text-align:center;

    margin:auto auto 30px;

    font-size:13px;
}

.appointment-label{

    display:block;

    text-align:center;
}

.appointment-form{

    padding:25px;
}

.appointment-btn{

    width:100%;
}

}
 .default-slider-container{
    width:100%;
    height:100%;
}

.default-slider-container .swiper-slide{
    height:auto;
}

.home-banner{
    position:relative;
    overflow:hidden;
}

.default-slider-container .swiper-pagination{
    bottom:30px !important;
}

.default-slider-container .swiper-pagination-bullet{
    width:12px;
    height:12px;
    background:#fff;
    opacity:.45;
    transition:.3s;
}

.default-slider-container .swiper-pagination-bullet-active{
    opacity:1;
    background:#B39256;
    width:32px;
    border-radius:20px;
}
</style>

<!-- Hero Slider Section -->
<!-- Hero Slider Section -->
<!-- Hero Banner -->
<section class="home-banner">

    <div class="swiper default-slider-container">
        <div class="swiper-wrapper">

            @forelse($sliders as $hero)

                <div class="swiper-slide">

                    <div class="hero-banner-image"
                         style="background-image:url('{{ $hero->image ? asset($hero->image) : asset('assets/img/slider-placeholder.jpg') }}');">

                        <div class="hero-dark-overlay"></div>

                        <div class="slider-overlay"></div>

                        <div class="container h-100 p-4">

                            <div class="row h-100 align-items-center">

                                <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">

                                    <div class="slider-content">

                                        <h1 class="slider-title ani-left">
                                            {{ $hero->title }}
                                        </h1>

                                        <p class="slider-desc ani-right">
                                            {{ $hero->description }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="swiper-slide">

                    <div class="hero-banner-image"
                         style="background-image:url('{{ asset('assets/img/slider-placeholder.jpg') }}');">

                        <div class="hero-dark-overlay"></div>
                        <div class="slider-overlay"></div>

                        <div class="container h-100 p-4">

                            <div class="row h-100 align-items-center">

                                <div class="col-lg-7">

                                    <div class="slider-content">

                                        <h1 class="slider-title">
                                            Timeless Luxury
                                        </h1>

                                        <p class="slider-desc">
                                            Where diamonds become timeless masterpieces.
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

<!-- Signature Collections Section -->
@include('frontend.collections.category.index')

<!-- About Editorial Section -->
<section class="about-editorial-section">
    <div class="container p-3">
        <div class="row align-items-start g-3">
            <div class="col-lg-6">
                <div class="row g-2">
                    <div class="col-7">
                        <div class="position-relative overflow-hidden" style="border-radius: 12px;">
                            <img src="{{ ($aboutData && $aboutData->imgone) ? asset('storage/'.$aboutData->imgone) : asset('assets/img/craft-1.jpg') }}"
                                 class="w-100" style="height: 350px; object-fit: cover; transition: transform 0.5s ease;"
                                 alt="Luxury Craftsmanship" loading="lazy">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-2 overflow-hidden" style="border-radius: 12px;">
                            <img src="{{ ($aboutData && $aboutData->imgtwo) ? asset('storage/'.$aboutData->imgtwo) : asset('assets/img/craft-2.jpg') }}"
                                 class="w-100" style="height: 170px; object-fit: cover; transition: transform 0.5s ease;"
                                 alt="Fine Jewelry" loading="lazy">
                        </div>
                        <div class="overflow-hidden" style="border-radius: 12px;">
                            <img src="{{ ($aboutData && $aboutData->imgthree) ? asset('storage/'.$aboutData->imgthree) : asset('assets/img/craft-3.jpg') }}"
                                 class="w-100" style="height: 170px; object-fit: cover; transition: transform 0.5s ease;"
                                 alt="Expert Craftsmanship" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ps-lg-3">
                <h2 class="about-title">
                    {{ $aboutData->title ?? 'Crafting Timeless Elegance Since 2005' }}
                </h2>
                <div class="about-description">
                    {!! nl2br(e($aboutData->description ?? 'With more than 20 years of expertise, DEMANTO is a leading name in fine jewelry manufacturing.')) !!}
                </div>
                
                <hr class="my-2" style="border-color: var(--luxury-border);">
                
            

                <div class="mt-3">
                    <a href="{{ url('/aboutus') }}" class="btn-demanto">Discover Our Story</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="featured-products">
    <div class="container">
        <div class="collections-title mb-3">

            <span>Featured Pieces</span>

            <div class="divider">
                <span></span>
            </div>

        </div>

        <div class="position-relative">
            <div class="swiper featured-products-slider">
                <div class="swiper-wrapper">
                    @foreach($newArrivalsProducts as $product)
                    <div class="swiper-slide">
                        <div class="featured-product-card">
                            <div class="featured-image">
                                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                    @if($product->productImages->count())
                                        <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="{{ asset('assets/img/placeholder.jpg') }}" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="featured-content">
                                <h4>{{ $product->name }}</h4>
                                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">Discover Details →</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="featured-pagination mt-2"></div>
            </div>
            <div class="featured-prev"><i class="fa fa-angle-left"></i></div>
            <div class="featured-next"><i class="fa fa-angle-right"></i></div>
        </div>

        <div class="text-center mt-3">
            <a href="{{ url('/categories') }}" class="btn-demanto">View All</a>
        </div>
    </div>
</section>

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

            <div class="demanto-exhibition-overlay">
                <span>View Event</span>
            </div>

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

<!-- Private Appointment Section -->
<section class="appointment-section">

    <div class="appointment-overlay"></div>

    <div class="container position-relative">

        <div class="row align-items-center">

            <div class="col-lg-5 mb-5 mb-lg-0">

                {{-- <span class="appointment-label">
                    PRIVATE CONSULTATION
                </span> --}}

                <h2>Book An Appointment</h2>

                <p>
                    Reserve a private consultation with one of our specialists and discover our exclusive collections in a personalized luxury experience.
                </p>

            </div>

            <div class="col-lg-7">

            <div class="appointment-form">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fa fa-check-circle me-2"></i>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    <form action="{{ url('/book-appointment') }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Full Name"
                    value="{{ old('name') }}"
                    required>
            </div>

            <div class="col-md-6 mb-3">
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Email Address"
                    value="{{ old('email') }}">
            </div>

            <div class="col-md-6 mb-3">
                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    placeholder="Phone Number"
                    value="{{ old('phone') }}"
                    required>
            </div>

            <div class="col-md-6 mb-3">
                <input
                    type="text"
                    name="subject"
                    class="form-control"
                    placeholder="Subject"
                    value="{{ old('subject') }}"
                    required>
            </div>

            <div class="col-md-6 mb-3">
                <input
                    type="date"
                    name="appointment_date"
                    class="form-control"
                    value="{{ old('appointment_date') }}"
                    required>
            </div>

            <div class="col-md-6 mb-3">
                <input
                    type="time"
                    name="appointment_time"
                    class="form-control"
                    value="{{ old('appointment_time') }}"
                    required>
            </div>

            <div class="col-12 mb-4">
                <textarea
                    class="form-control"
                    rows="4"
                    name="message"
                    placeholder="Your Message"
                    required>{{ old('message') }}</textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-demanto">
                    BOOK APPOINTMENT
                </button>
            </div>

        </div>

    </form>

</div>

            </div>

        </div>

    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('loaded');
                imageObserver.unobserve(img);
            }
        });
    });
    images.forEach(img => imageObserver.observe(img));
});
</script>

<style>


</style>
@endsection
