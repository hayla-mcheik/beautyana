@extends('layouts.app')
@section('title', 'Home Page')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap');


/* ============================================================
   DEMANTO HOME PAGE — COMPLETE CLEAN CSS
============================================================ */

:root {
    --demanto-gold: #C5A15A;
    --demanto-gold-light: #F7F4EB;
    --demanto-dark: #4F4033;
    --demanto-bg: #FDFBF7;
    --demanto-muted: #85715F;

    --luxury-border: rgba(179, 146, 86, 0.25);

    --transition-smooth:
        all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);

    --box-shadow-luxury:
        0 25px 45px rgba(179, 146, 86, 0.10);
}


/* ============================================================
   GLOBAL
============================================================ */

html,
body {
    width: 100%;
    overflow-x: hidden;
}


body {
    margin: 0;

    background:
        var(--demanto-bg);

    color:
        var(--demanto-dark);

    font-family:
        "Cormorant Garamond",
        serif;

    font-size:
        13px;
}


section {
    animation:
        fadeInUp 0.6s ease-out;
}


@keyframes fadeInUp {

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


/* ============================================================
   GENERAL TYPOGRAPHY
============================================================ */

.luxury-heading {
    margin: 0;

    font-family:
        "Cormorant Garamond",
        serif;

    font-size:
        32px;

    font-weight:
        500;

    letter-spacing:
        1px;

    text-transform:
        uppercase;

    color:
        #6E5A46;

    background:
        linear-gradient(
            135deg,
            var(--demanto-dark) 0%,
            var(--demanto-gold) 100%
        );

    -webkit-background-clip:
        text;

    -webkit-text-fill-color:
        transparent;

    background-clip:
        text;
}


.luxury-section-title {
    position:
        relative;

    margin-bottom:
        25px;

    text-align:
        center;
}


.luxury-sub {
    position:
        relative;

    display:
        inline-block;

    padding-bottom:
        4px;

    font-size:
        9px;

    font-weight:
        500;

    letter-spacing:
        2px;

    text-transform:
        uppercase;

    color:
        var(--demanto-gold);
}


.luxury-sub::after {
    content:
        "";

    position:
        absolute;

    left:
        50%;

    bottom:
        0;

    width:
        25px;

    height:
        1.5px;

    transform:
        translateX(-50%);

    background:
        var(--demanto-gold);
}


/* ============================================================
   BUTTONS
============================================================ */

.btn-demanto {
    position:
        relative;

    z-index:
        1;

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    padding:
        9px 24px;

    overflow:
        hidden;

    border:
        0;

    border-radius:
        25px;

    background:
        linear-gradient(
            135deg,
            var(--demanto-dark) 0%,
            #9A7B45 100%
        );

    color:
        #FFFFFF !important;

    font-family:
        "Montserrat",
        sans-serif;

    font-size:
        9px;

    font-weight:
        500;

    line-height:
        1.4;

    letter-spacing:
        1.5px;

    text-align:
        center;

    text-decoration:
        none;

    text-transform:
        uppercase;

    cursor:
        pointer;

    transition:
        var(--transition-smooth);
}


.btn-demanto::before {
    content:
        "";

    position:
        absolute;

    top:
        0;

    left:
        -100%;

    width:
        100%;

    height:
        100%;

    z-index:
        -1;

    border-radius:
        inherit;

    background:
        linear-gradient(
            135deg,
            var(--demanto-dark) 0%,
            #1A1A1A 100%
        );

    transition:
        left 0.5s ease;
}


.btn-demanto:hover::before {
    left:
        0;
}


.btn-demanto:hover {
    color:
        #FFFFFF !important;

    transform:
        translateY(-2px);

    box-shadow:
        0 5px 15px rgba(179, 146, 86, 0.30);
}


.btn-demanto-outline {
    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    padding:
        8px 20px;

    border:
        1.5px solid var(--demanto-gold);

    border-radius:
        25px;

    background:
        transparent;

    color:
        var(--demanto-gold);

    font-family:
        "Montserrat",
        sans-serif;

    font-size:
        9px;

    font-weight:
        500;

    letter-spacing:
        1.5px;

    text-decoration:
        none;

    text-transform:
        uppercase;

    transition:
        var(--transition-smooth);
}


.btn-demanto-outline:hover {
    background:
        var(--demanto-gold);

    color:
        #FFFFFF !important;

    transform:
        translateY(-2px);

    box-shadow:
        0 5px 15px rgba(179, 146, 86, 0.20);
}


/* ============================================================
   HEADER POSITION ON HOME PAGE
============================================================ */

.header-area.header-default {
    position:
        absolute;

    top:
        0;

    left:
        0;

    width:
        100%;

    z-index:
        1050;

    background:
        transparent;
}


/* ============================================================
   HERO
============================================================ */

.home-banner {
    position:
        relative;

    width:
        100%;

    height:
        52vh;

    min-height:
        500px;

    max-height:
        760px;

    overflow:
        hidden;

    z-index:
        1;
}


.default-slider-container,
.default-slider-container .swiper-wrapper,
.default-slider-container .swiper-slide {
    width:
        100%;

    height:
        100%;
}


.default-slider-container .swiper-slide {
    position:
        relative;
}


.hero-banner-image {
    position:
        relative;

    width:
        100%;

    height:
        100%;

    display:
        flex;

    align-items:
        center;

    overflow:
        hidden;

    isolation:
        isolate;

    background-size:
        cover;

    background-repeat:
        no-repeat;

    background-position:
        58% center;
}


/* ============================================================
   HERO OVERLAY
============================================================ */

.slider-overlay {
    position:
        absolute;

    inset:
        0;

    z-index:
        1;

    pointer-events:
        none;

    background:
        linear-gradient(
            90deg,
            rgba(18, 27, 22, 0.78) 0%,
            rgba(18, 27, 22, 0.60) 25%,
            rgba(18, 27, 22, 0.28) 50%,
            rgba(18, 27, 22, 0.06) 72%,
            rgba(18, 27, 22, 0) 100%
        );
}


.hero-dark-overlay {
    position:
        absolute;

    inset:
        0;

    z-index:
        1;

    pointer-events:
        none;

    background:
        rgba(0, 0, 0, 0.35);
}


/* ============================================================
   HERO CONTENT
============================================================ */

.hero-banner-image > .container {
    position:
        relative;

    z-index:
        5;
}


.slider-content {
    position:
        relative;

    z-index:
        5;

    width:
        100%;

    max-width:
        540px;

    padding-top:
        70px;
}


.slider-title {
    margin:
        0 0 18px;

    font-family:
        "Cormorant Garamond",
        serif;

    font-size:
        clamp(42px, 4vw, 68px);

    font-weight:
        500;

    line-height:
        0.98;

    letter-spacing:
        2px;

    text-transform:
        uppercase;

    color:
        #F4E5C3;

    text-shadow:
        0 2px 12px rgba(0, 0, 0, 0.28);
}


.slider-desc {
    max-width:
        400px;

    margin:
        0;

    font-family:
        "Montserrat",
        sans-serif;

    font-size:
        14px;

    font-weight:
        400;

    line-height:
        1.8;

    letter-spacing:
        0.3px;

    color:
        rgba(255, 255, 255, 0.92);
}


/* ============================================================
   HERO PAGINATION
============================================================ */

.default-slider-container .swiper-pagination {
    bottom:
        30px !important;

    z-index:
        10;
}


.default-slider-container .swiper-pagination-bullet {
    width:
        9px;

    height:
        9px;

    margin:
        0 5px !important;

    border-radius:
        50%;

    background:
        #FFFFFF;

    opacity:
        0.50;

    transition:
        all 0.3s ease;
}


.default-slider-container
.swiper-pagination-bullet-active {

    width:
        30px;

    border-radius:
        20px;

    opacity:
        1;

    background:
        var(--demanto-gold);
}


/* ============================================================
   WHATSAPP BUTTON
============================================================ */

.whatsapp-btn {
    position:
        fixed;

    right:
        30px;

    bottom:
        30px;

    width:
        45px;

    height:
        45px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        50%;

    background:
        var(--demanto-gold);

    color:
        #FFFFFF;

    font-size:
        23px;

    text-decoration:
        none;

    box-shadow:
        0 5px 20px rgba(0, 0, 0, 0.25);

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;

    z-index:
        9999;
}


.whatsapp-btn:hover {
    color:
        #FFFFFF;

    transform:
        translateY(-3px);

    box-shadow:
        0 8px 25px rgba(0, 0, 0, 0.30);
}


/* ============================================================
   ABOUT SECTION
============================================================ */

.about-editorial-section {
    position:
        relative;

    padding:
        30px 0;

    overflow:
        hidden;

    background:
        linear-gradient(
            135deg,
            #FBF9F4 0%,
            #FFFFFF 100%
        );
}


.about-editorial-section img {
    display:
        block;

    width:
        100%;

    transition:
        transform 0.5s ease;
}


.about-editorial-section img:hover {
    transform:
        scale(1.025);
}


.about-title {
    position:
        relative;

    display:
        inline-block;

    margin:
        0 0 18px;

    font-family:
        "Cormorant Garamond",
        serif;

    font-size:
        26px;

    font-weight:
        500;

    line-height:
        1.2;

    letter-spacing:
        1px;

    text-transform:
        uppercase;

    color:
        var(--demanto-dark);
}


.about-title::after {
    content:
        "";

    position:
        absolute;

    left:
        0;

    bottom:
        -8px;

    width:
        40px;

    height:
        2px;

    background:
        linear-gradient(
            90deg,
            var(--demanto-gold),
            transparent
        );
}


.about-description {
    max-width:
        90%;

    margin-top:
        15px;

    color:
        var(--demanto-dark);

    font-family:
        "Cormorant Garamond",
        serif;

    font-size:
        16px;

    line-height:
        1.7;
}


/* ============================================================
   METRICS
============================================================ */

.metric-number {
    margin-bottom:
        4px;

    color:
        var(--demanto-gold);

    font-family:
        "Cormorant Garamond",
        serif;

    font-size:
        22px;

    font-weight:
        600;
}


.metric-item i {
    color:
        var(--demanto-gold);

    font-size:
        22px;

    transition:
        transform 0.3s ease;
}


.metric-item:hover i {
    transform:
        translateY(-2px);
}


.metric-label {
    margin-top:
        6px;

    color:
        #333333;

    font-family:
        "Montserrat",
        sans-serif;

    font-size:
        8px;

    font-weight:
        500;

    line-height:
        1.3;

    letter-spacing:
        1px;

    text-transform:
        uppercase;
}


/* ============================================================
   FEATURED PRODUCTS
============================================================ */

.featured-products {
    padding:
        28px 0 32px;

    overflow:
        hidden;

    background:
        linear-gradient(
            180deg,
            #FFFFFF,
            #FAF8F3
        );
}


.featured-products .position-relative {
    padding:
        0 2px;
}


.featured-products-slider {
    overflow:
        hidden;
}


.featured-products-slider .swiper-slide {
    height:
        auto;

    padding-bottom:
        4px;
}


.featured-product-card {
    height:
        100%;

    overflow:
        hidden;

    border:
        1px solid rgba(179, 146, 86, 0.15);

    border-radius:
        20px;

    background:
        #FFFFFF;

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease;
}


.featured-product-card:hover {
    transform:
        translateY(-5px);

    box-shadow:
        0 15px 30px rgba(179, 146, 86, 0.12);
}


.featured-image {
    position:
        relative;

    width:
        100%;

    height:
        300px;

    overflow:
        hidden;

    background:
        #F8F5EF;
}


.featured-image a {
    display:
        block;

    width:
        100%;

    height:
        100%;
}


.featured-image img {
    display:
        block;

    width:
        100%;

    height:
        100%;

    padding:
        20px;

    object-fit:
        contain;

    transition:
        transform 0.5s ease;
}


.featured-product-card:hover
.featured-image img {

    transform:
        scale(1.05);
}


.featured-content {
    padding:
        15px;

    text-align:
        center;
}


.featured-content h4 {
    margin:
        0 0 7px;

    color:
        var(--demanto-dark);

    font-family:
        "Cormorant Garamond",
        serif;

    font-size:
        16px;

    font-weight:
        600;

    line-height:
        1.3;
}


.featured-content a {
    color:
        var(--demanto-muted);

    font-family:
        "Montserrat",
        sans-serif;

    font-size:
        9px;

    font-weight:
        500;

    letter-spacing:
        1px;

    text-decoration:
        none;

    text-transform:
        uppercase;

    transition:
        color 0.3s ease;
}


.featured-content a:hover {
    color:
        var(--demanto-gold);
}


/* ============================================================
   FEATURED PRODUCTS PAGINATION
============================================================ */

.featured-pagination {
    position:
        relative;

    text-align:
        center;
}


.featured-pagination
.swiper-pagination-bullet {

    width:
        7px;

    height:
        7px;

    margin:
        0 4px !important;

    background:
        var(--demanto-muted);

    opacity:
        0.35;

    transition:
        all 0.3s ease;
}


.featured-pagination
.swiper-pagination-bullet-active {

    width:
        22px;

    border-radius:
        20px;

    background:
        var(--demanto-gold);

    opacity:
        1;
}


/* ============================================================
   FEATURED NAVIGATION BUTTONS
============================================================ */

.featured-prev,
.featured-next {
    position:
        absolute;

    top:
        50%;

    z-index:
        10;

    width:
        36px;

    height:
        36px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border:
        1px solid rgba(197, 161, 90, 0.35);

    border-radius:
        50%;

    background:
        rgba(255, 255, 255, 0.95);

    color:
        var(--demanto-gold);

    cursor:
        pointer;

    transform:
        translateY(-50%);

    transition:
        var(--transition-smooth);
}


.featured-prev {
    left:
        -14px;
}


.featured-next {
    right:
        -14px;
}


.featured-prev:hover,
.featured-next:hover {
    border-color:
        var(--demanto-gold);

    background:
        var(--demanto-gold);

    color:
        #FFFFFF;
}


/* ============================================================
   EXHIBITIONS
============================================================ */

.exhibitions-area {
    padding:
        28px 0 32px;

    overflow:
        hidden;

    background:
        #FBF9F4;
}


.section-title-demanto {
    color:
        #B39256;

    font-family:
        "Cormorant Garamond",
        serif;

    font-size:
        28px;

    font-weight:
        500;

    letter-spacing:
        1.5px;
}


.demanto-exhibition-link {
    display:
        block;

    text-decoration:
        none;
}


.demanto-exhibition-item {
    width:
        100%;

    overflow:
        hidden;

    border-radius:
        15px;

    background:
        #F4F0E8;
}


.demanto-exhibition-item img {
    display:
        block;

    width:
        100%;

    height:
        400px;

    object-fit:
        cover;

    transition:
        transform 0.5s ease,
        opacity 0.5s ease;
}


.demanto-exhibition-item:hover img {
    transform:
        scale(1.05);
}


.swiper-slide-prev
.demanto-exhibition-item img,

.swiper-slide-next
.demanto-exhibition-item img {

    opacity:
        0.60;
}


/* ============================================================
   EXHIBITION NAVIGATION
============================================================ */

.demanto-prev,
.demanto-next {
    position:
        absolute;

    top:
        50%;

    z-index:
        10;

    width:
        35px;

    height:
        35px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border:
        1px solid #D7C7A4;

    border-radius:
        50%;

    background:
        #FFFFFF;

    color:
        #B39256;

    cursor:
        pointer;

    transform:
        translateY(-50%);

    transition:
        var(--transition-smooth);
}


.demanto-prev {
    left:
        -10px;
}


.demanto-next {
    right:
        -10px;
}


.demanto-prev:hover,
.demanto-next:hover {
    border-color:
        #B39256;

    background:
        #B39256;

    color:
        #FFFFFF;
}


/* ============================================================
   APPOINTMENT SECTION
============================================================ */

.appointment-section {
    position:
        relative;

    padding:
        45px 0;

    overflow:
        hidden;

    background:
        url('assets/img/appointment.jpg')
        center center / cover
        no-repeat;
}


.appointment-overlay {
    position:
        absolute;

    inset:
        0;

    z-index:
        1;

    background:
        linear-gradient(
            90deg,
            rgba(14, 14, 14, 0.72),
            rgba(50, 45, 39, 0.52)
        );
}


.appointment-section .container {
    position:
        relative;

    z-index:
        2;
}


.appointment-label {
    color:
        #B39256;

    font-family:
        "Montserrat",
        sans-serif;

    font-size:
        11px;

    letter-spacing:
        4px;

    text-transform:
        uppercase;
}


.appointment-section h2 {
    margin:
        15px 0;

    color:
        #FFFFFF;

    font-family:
        "Cormorant Garamond",
        serif;

    font-size:
        38px;

    font-weight:
        500;

    line-height:
        1.1;
}


.appointment-section p {
    max-width:
        420px;

    margin:
        0;

    color:
        #E0E0E0;

    font-family:
        "Montserrat",
        sans-serif;

    font-size:
        14px;

    line-height:
        1.9;
}


/* ============================================================
   APPOINTMENT FORM
============================================================ */

.appointment-form {
    padding:
        38px;

    border:
        1px solid rgba(197, 161, 90, 0.14);

    border-radius:
        10px;

    background:
        rgba(255, 255, 255, 0.97);

    box-shadow:
        0 20px 50px rgba(0, 0, 0, 0.12);
}


.appointment-form .form-control {
    width:
        100%;

    height:
        50px;

    padding:
        10px 12px;

    border:
        0;

    border-bottom:
        1px solid #DDDDDD;

    border-radius:
        0;

    background:
        transparent;

    color:
        var(--demanto-dark);

    font-family:
        "Montserrat",
        sans-serif;

    font-size:
        13px;

    box-shadow:
        none;

    transition:
        border-color 0.3s ease;
}


.appointment-form
.form-control:focus {

    border-color:
        #B39256;

    outline:
        none;

    box-shadow:
        none;
}


.appointment-form
textarea.form-control {

    height:
        120px;

    padding-top:
        14px;

    resize:
        none;
}


.appointment-form
.form-control::placeholder {

    color:
        #888888;

    opacity:
        1;
}


/* ============================================================
   DATE + TIME INPUTS
============================================================ */

.appointment-input-wrapper {
    position:
        relative;

    width:
        100%;
}


.appointment-input-label {
    position:
        absolute;

    top:
        7px;

    left:
        12px;

    z-index:
        2;

    color:
        #777777;

    font-family:
        "Montserrat",
        sans-serif;

    font-size:
        10px;

    line-height:
        1;

    pointer-events:
        none;
}


.appointment-date-time {
    min-height:
        58px;

    padding-top:
        23px !important;

    padding-bottom:
        7px !important;
}


/* ============================================================
   CUSTOM SCROLLBAR
============================================================ */

::-webkit-scrollbar {
    width:
        6px;
}


::-webkit-scrollbar-track {
    background:
        var(--demanto-bg);
}


::-webkit-scrollbar-thumb {
    border-radius:
        3px;

    background:
        var(--demanto-gold);
}


::-webkit-scrollbar-thumb:hover {
    background:
        #9A7B45;
}
/* ============================================================
   LARGE DESKTOP SCREENS ONLY
   Makes hero slider larger on screens like 1920px / 2560px
============================================================ */

@media (min-width: 1600px) {

    .home-banner {
height: 61vh;
        min-height: 678px;
        max-height: 900px;
    }

    .hero-banner-image {
        background-size: cover;
        background-position: 58% center;
    }

    .slider-content {
        max-width: 700px;
        padding-top: 100px;
    }

    .slider-title {
        font-size: clamp(60px, 4vw, 90px);
    }

    .slider-desc {
        max-width: 520px;
        font-size: 17px;
        line-height: 1.8;
    }

    .default-slider-container .swiper-pagination {
        bottom: 40px !important;
    }
}
@media (min-width: 1800px) {

    .home-banner {
height: 58vh;
        min-height: 648px;
        max-height: 800px;
    }

    .hero-banner-image {
        background-size: cover;
        background-position: 58% center;
    }

    .slider-content {
        max-width: 700px;
        padding-top: 110px;
    }

    .slider-title {
        font-size: 78px;
    }

    .slider-desc {
        max-width: 520px;
        font-size: 17px;
    }

    .default-slider-container .swiper-pagination {
        bottom: 40px !important;
    }
}

/* ============================================================
   LARGE TABLET / SMALL DESKTOP
============================================================ */

@media (max-width: 1200px) {

    .luxury-heading {
        font-size:
            28px;
    }


    .about-title {
        font-size:
            24px;
    }


    .metric-number {
        font-size:
            20px;
    }


    .featured-prev {
        left:
            4px;
    }


    .featured-next {
        right:
            4px;
    }


    .demanto-prev {
        left:
            4px;
    }


    .demanto-next {
        right:
            4px;
    }

}


/* ============================================================
   TABLET
============================================================ */

@media (max-width: 991px) {

    /* HERO */

    .home-banner {
        height:
            600px;

        min-height:
            600px;

        max-height:
            none;
    }


    .hero-banner-image {
        background-position:
            63% center;
    }


    .slider-overlay {
        background:
            linear-gradient(
                90deg,
                rgba(18, 27, 22, 0.82) 0%,
                rgba(18, 27, 22, 0.65) 40%,
                rgba(18, 27, 22, 0.22) 75%,
                rgba(18, 27, 22, 0.02) 100%
            );
    }


    .slider-content {
        max-width:
            460px;

        padding-top:
            70px;
    }


    .slider-title {
        font-size:
            48px;
    }


    .slider-desc {
        max-width:
            350px;
    }


    /* ABOUT */

    .about-description {
        max-width:
            100%;

        font-size:
            14px;
    }


    .about-editorial-section
    .col-lg-6.ps-lg-3 {

        margin-top:
            24px;
    }


    /* FEATURED */

    .featured-image {
        height:
            300px;
    }


    /* EXHIBITIONS */

    .demanto-exhibition-item img {
        height:
            340px;
    }


    /* APPOINTMENT */

    .appointment-section {
        padding:
            38px 0;
    }


    .appointment-section h2 {
        font-size:
            32px;

        text-align:
            center;
    }


    .appointment-section p {
        max-width:
            650px;

        margin:
            0 auto;

        text-align:
            center;
    }


    .appointment-label {
        display:
            block;

        text-align:
            center;
    }


    .appointment-form {
        padding:
            30px;
    }

}


/* ============================================================
   MOBILE
============================================================ */

@media (max-width: 767px) {

    /* GENERAL */

    .luxury-heading {
        font-size:
            24px;
    }


    .luxury-section-title {
        margin-bottom:
            20px;
    }


    /* HERO */

    .home-banner {
        height:
            520px;

        min-height:
            520px;

        max-height:
            none;
    }


    .hero-banner-image {
        background-position:
            67% center;
    }


    .slider-overlay {
        background:
            linear-gradient(
                90deg,
                rgba(17, 24, 20, 0.88) 0%,
                rgba(17, 24, 20, 0.70) 48%,
                rgba(17, 24, 20, 0.30) 78%,
                rgba(17, 24, 20, 0.06) 100%
            );
    }


    .hero-banner-image > .container {
        padding-left:
            20px !important;

        padding-right:
            20px !important;
    }


    .slider-content {
        max-width:
            300px;

        padding-top:
            72px;
    }


    .slider-title {
        margin-bottom:
            14px;

        font-size:
            36px;

        line-height:
            1;

        letter-spacing:
            1px;
    }


    .slider-desc {
        max-width:
            265px;

        font-size:
            12px;

        line-height:
            1.65;
    }


    .default-slider-container
    .swiper-pagination {

        bottom:
            20px !important;
    }


    /* ABOUT */

    .about-editorial-section {
        padding:
            26px 0;
    }


    .about-title {
        font-size:
            22px;
    }


    .about-description {
        font-size:
            14px;

        line-height:
            1.65;
    }


    .btndemantodiv {
        text-align:
            center;
    }


    /* FEATURED PRODUCTS */

    .featured-products {
        padding:
            24px 0 28px;
    }


    .featured-image {
        height:
            280px;
    }


    .featured-image img {
        padding:
            15px;
    }


    .featured-prev,
    .featured-next {

        width:
            32px;

        height:
            32px;
    }


    /* EXHIBITIONS */

    .exhibitions-area {
        padding:
            24px 0 28px;
    }


    .demanto-exhibition-item img {
        height:
            250px;
    }


    .demanto-prev,
    .demanto-next {

        width:
            32px;

        height:
            32px;
    }


    /* APPOINTMENT */

    .appointment-section {
        padding:
            32px 0;
    }


    .appointment-section h2 {
        font-size:
            29px;
    }


    .appointment-section p {
        font-size:
            13px;

        line-height:
            1.75;
    }


    .appointment-form {
        margin-top:
            5px;

        padding:
            25px 20px;
    }


    .appointment-date-time {
        width:
            100%;

        appearance:
            auto;

        -webkit-appearance:
            auto;
    }


    .appointment-form
    .btn-demanto {

        width:
            100%;
    }


    /* WHATSAPP */

    .whatsapp-btn {
        right:
            18px;

        bottom:
            18px;

        width:
            44px;

        height:
            44px;

        font-size:
            22px;
    }


    /* FOOTER */

    .footer-brand {
        text-align:
            start;
    }


    .footer-brand img {
        margin-bottom:
            10px;
    }

}


/* ============================================================
   SMALL MOBILE
============================================================ */

@media (max-width: 575px) {

    /* HERO */

    .home-banner {
        height:
            400px;

        min-height:
            400px;
    }


    .hero-banner-image {
        background-position:
            70% center;
    }


    .hero-banner-image > .container {
        padding-left:
            16px !important;

        padding-right:
            16px !important;
    }


    .slider-content {
        max-width:
            270px;

        padding-top:
            68px;
    }


    .slider-title {
        font-size:
            32px;
    }


    .slider-desc {
        max-width:
            235px;

        font-size:
            12px;

        line-height:
            1.55;
    }


    /* ABOUT */

    .about-editorial-section {
        padding:
            22px 0;
    }


    .about-title {
        font-size:
            21px;
    }


    .about-description {
        font-size:
            13px;
    }


    /* PRODUCTS */

    .featured-image {
        height:
            255px;
    }


    .featured-content h4 {
        font-size:
            15px;
    }


    /* EXHIBITIONS */

    .demanto-exhibition-item img {
        height:
            215px;
    }


    /* APPOINTMENT */

    .appointment-section h2 {
        font-size:
            27px;
    }


    .appointment-form {
        padding:
            22px 16px;
    }


    .appointment-form
    .form-control {

        font-size:
            12px;
    }


    /* WHATSAPP */

    .whatsapp-btn {
        right:
            14px;

        bottom:
            14px;

        width:
            42px;

        height:
            42px;

        font-size:
            21px;
    }

}


/* ============================================================
   VERY SMALL MOBILE
============================================================ */

@media (max-width: 400px) {

    /* HERO */

    .home-banner {
        height:
            420px;

        min-height:
            420px;
    }


    .hero-banner-image {
        background-position:
            72% center;
    }


    .slider-content {
        max-width:
            235px;

        padding-top:
            65px;
    }


    .slider-title {
        font-size:
            28px;
    }


    .slider-desc {
        max-width:
            210px;

        font-size:
            11px;
    }


    .default-slider-container
    .swiper-pagination-bullet {

        width:
            7px;

        height:
            7px;
    }


    .default-slider-container
    .swiper-pagination-bullet-active {

        width:
            24px;
    }


    /* ABOUT */

    .about-title {
        font-size:
            20px;
    }


    /* PRODUCTS */

    .featured-image {
        height:
            235px;
    }


    /* EXHIBITIONS */

    .demanto-exhibition-item img {
        height:
            195px;
    }


    /* APPOINTMENT */

    .appointment-section {
        padding:
            28px 0;
    }


    .appointment-section h2 {
        font-size:
            25px;
    }


    .appointment-form {
        padding:
            20px 14px;
    }

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
    <a
        href="https://wa.me/971508505260?text=Hello%20DEMANTO,%20I%20would%20like%20to%20know%20more%20about%20your%20collections."
        class="whatsapp-btn"
        target="_blank"
        aria-label="Contact DEMANTO on WhatsApp"
    >
        <i class="fab fa-whatsapp"></i>
    </a>
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
                
            

                <div class="mt-3 btndemantodiv">
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

    <div class="appointment-input-wrapper">

        <span class="appointment-input-label">
            Appointment Date
        </span>

        <input
            type="date"
            name="appointment_date"
            class="form-control appointment-date-time"
            value="{{ old('appointment_date') }}"
            required>

    </div>

</div>


<div class="col-md-6 mb-3">

    <div class="appointment-input-wrapper">

        <span class="appointment-input-label">
            Appointment Time
        </span>

        <input
            type="time"
            name="appointment_time"
            class="form-control appointment-date-time"
            value="{{ old('appointment_time') }}"
            required>

    </div>

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
        const hero = document.querySelector('.home-banner');
    const whatsappButton = document.querySelector('.whatsapp-btn');

    function positionWhatsappButton() {

        if (!hero || !whatsappButton) return;

        const heroRect = hero.getBoundingClientRect();

        /*
         * Position button 30px above
         * the bottom of the hero slider.
         */
        const bottomPosition =
            window.innerHeight - heroRect.bottom + 30;

        whatsappButton.style.bottom =
            Math.max(30, bottomPosition) + 'px';
    }

    positionWhatsappButton();

    window.addEventListener('resize', positionWhatsappButton);
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




@endsection
