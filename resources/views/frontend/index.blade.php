@extends('layouts.app')
@section('title', 'Home Page')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap');

    /* ============================================================
       ROOT VARIABLES – UPDATED PALETTE
    ============================================================ */
:root {
    /* === REPLACING GOLD WITH HERITAGE RUBY RED === */
    --demanto-red: #B31B1B;          /* Main accent – vibrant, rich crimson */
    --demanto-red-dark: #7A1212;     /* Darker shade – for hover states, footers, and depth */
    --demanto-red-light: #F8F0F0;    /* Very soft rose-tinted white – for backgrounds, borders, or light overlays */

    /* Keep your neutrals exactly as they are */
    --demanto-dark: #2C241E;
    --demanto-text: #4A3F38;
    --demanto-muted: #85786D;
    --demanto-bg: #FDFBF7;
    --demanto-white: #FFFFFF;
    --luxury-border: rgba(179, 27, 27, 0.25); /* Updated border to match red */
    --transition-smooth: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

    /* ============================================================
       GLOBAL RESET & BASE
    ============================================================ */
    html, body {
        width: 100%;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    body {
        background: var(--demanto-bg);
        color: var(--demanto-dark);
        font-family: "Cormorant Garamond", serif;
        font-size: 15px;
    }

    section {
        animation: fadeInUp 0.6s ease-out;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ============================================================
       TYPOGRAPHY
    ============================================================ */
    .luxury-heading {
        margin: 0;
        font-family: "Cormorant Garamond", serif;
        font-size: 36px;
        font-weight: 500;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--demanto-text);
        background: linear-gradient(135deg, var(--demanto-dark), var(--demanto-red));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .luxury-section-title {
        position: relative;
        margin-bottom: 28px;
        text-align: center;
    }

    .luxury-sub {
        position: relative;
        display: inline-block;
        padding-bottom: 4px;
        color: var(--demanto-red);
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .luxury-sub::after {
        content: "";
        position: absolute;
        left: 50%;
        bottom: 0;
        width: 30px;
        height: 2px;
        transform: translateX(-50%);
        background: var(--demanto-red);
    }

    /* ============================================================
       BUTTONS
    ============================================================ */
    .btn-demanto {
        position: relative;
        z-index: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 11px 28px;
        overflow: hidden;
        border: 0;
        border-radius: 30px;
        background: linear-gradient(135deg, var(--demanto-dark), var(--demanto-red-dark));
        color: var(--demanto-white) !important;
        font-family: "Montserrat", sans-serif;
        font-size: 14px;
        font-weight: 500;
        line-height: 1.4;
        letter-spacing: 1.5px;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        cursor: pointer;
        transition: var(--transition-smooth);
    }

    .btn-demanto::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        z-index: -1;
        border-radius: inherit;
        background: linear-gradient(135deg, var(--demanto-dark), #1A1A1A);
        transition: left 0.5s ease;
    }

    .btn-demanto:hover::before {
        left: 0;
    }

    .btn-demanto:hover {
        color: var(--demanto-white) !important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(201, 169, 110, 0.30);
    }

    /* ============================================================
       HEADER (unchanged)
    ============================================================ */
    .header-area.header-default {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1050;
        background: transparent;
    }

    /* ============================================================
       HERO
    ============================================================ */
    .home-banner {
        position: relative;
        width: 100%;
        height: 50vh;
        min-height: 550px;
        max-height: 50vh;
        overflow: hidden;
        z-index: 1;
    }

    .home-banner .default-slider-container,
    .home-banner .swiper,
    .home-banner .swiper-wrapper,
    .home-banner .swiper-slide {
        width: 100%;
        height: 100%;
    }

    .hero-banner-image {
        position: relative;
        width: 100%;
        height: 100%;
        overflow: hidden;
        isolation: isolate;
    }

    .hero-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        z-index: 1;
        transition: transform .8s ease;
    }

    .swiper-slide-active .hero-bg {
        transform: scale(1.03);
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        z-index: 2;
        background: linear-gradient(90deg, rgba(0,0,0,.35), rgba(0,0,0,.15), rgba(0,0,0,.05));
    }

    .hero-banner-image > .container {
        position: relative;
        z-index: 3;
        height: 100%;
    }

    .slider-content {
        position: relative;
        z-index: 5;
        max-width: 540px;
        padding-top: 70px;
    }

    .slider-title {
        margin-bottom: 20px;
        color: #F4E5C3;
        font-size: clamp(62px, 4.5vw, 72px);
        line-height: .95;
        letter-spacing: 1px;
    }

    .slider-desc {
        max-width: 420px;
        color: #fff;
        font-size: 22px;
        line-height: 1.8;
        display: none;
    }

    .default-slider-container .swiper-pagination {
        bottom: 30px !important;
        z-index: 10;
    }

    .swiper-pagination-bullet-active {
        background: var(--demanto-red);
    }

    /* Hero responsive */
    @media (min-width: 991px) {
        .home-banner { margin-top: 3%; }
    }
    @media (min-width: 1600px) {
        .home-banner { height: 50vh; min-height: 500px; }
        .slider-content { padding-top: 100px; }
    }
    @media (max-width: 991px) {
        .home-banner { height: 500px; min-height: 500px; margin-top: 18%; }
        .hero-bg { object-position: right; }
        .slider-content { max-width: 430px; padding-top: 70px; }
        .slider-title { font-size: 48px; }
    }
    @media (max-width: 767px) {
        .home-banner { margin-top: 80px; height: 500px !important; min-height: 500px !important; overflow: hidden; margin-top: 18%; }
        .default-slider-container, .default-slider-container .swiper-wrapper, .default-slider-container .swiper-slide { height: 500px !important; }
        .hero-banner-image { position: relative; width: 100%; height: 100%; }
        .hero-bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: 35% center; }
        .hero-overlay { position: absolute; inset: 0; }
        .hero-banner-image > .container { position: absolute; inset: 0; z-index: 5; }
    }
    @media (max-width: 480px) {
        .home-banner { height: 400px; min-height: 400px; }
        .hero-bg { object-position: right; }
        .slider-title { font-size: 32px; }
        .slider-desc { font-size: 18px; display: none; }
    }

    /* ============================================================
       WHATSAPP BUTTON
    ============================================================ */
    .whatsapp-btn {
        position: fixed !important;
        right: 22px;
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border-radius: 50%;
        background: #25D366;
        color: #fff !important;
        font-size: 25px;
        line-height: 1;
        text-decoration: none;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.22);
        z-index: 99999;
        transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
    }
    .whatsapp-global-btn { top: 50% !important; transform: translateY(-50%); }
    .whatsapp-btn i { display: flex; align-items: center; justify-content: center; margin: 0; color: #fff; line-height: 1; }
    .whatsapp-btn:hover { color: #fff !important; transform: translateY(-50%) scale(1.08); }
    @media (max-width: 991px) { .whatsapp-btn { right: 18px; width: 50px; height: 50px; font-size: 24px; } }
    @media (max-width: 767px) { .whatsapp-btn { right: 14px; width: 47px; height: 47px; font-size: 23px; } }
    @media (max-width: 575px) { .whatsapp-btn { right: 12px; width: 45px; height: 45px; font-size: 22px; } }
    @media (max-width: 400px) { .whatsapp-btn { right: 10px; width: 56px; height: 56px; font-size: 20px; } }

    /* ============================================================
       ABOUT – redesigned (merged from inline styles)
    ============================================================ */
    .about-editorial-root {
        background-color: var(--demanto-white);
        color: var(--demanto-text);
        font-family: 'Montserrat', sans-serif;
        width: 100%;
        min-height: 20vh;
        display: flex;
        align-items: center;
        padding: 40px 0;
        position: relative;
        overflow: hidden;
    }

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
        color: #d97da50d !important; /* subtle pink tint */
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

    .wide-content-wrapper {
        width: 100%;
        z-index: 2;
        padding: 0 15px;
    }

    .eyebrow {
        font-size: 0.6rem;
        text-transform: uppercase;
        letter-spacing: 4px;
        color: #D97DA5 !important;
        font-weight: 700;
    }

    .display-title {
        font-size: 24px;
        font-weight: 700;
        color: var(--demanto-text);
        text-transform: capitalize;
    }

    .accent-line {
        width: 40px;
        height: 1px;
        background-color: #D97DA5 !important;
    }

    .editorial-text {
        font-size: 0.75rem;
        line-height: 2.2;
        color: var(--demanto-text);
        font-weight: 400;
        letter-spacing: 0.4px;
    }

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
        background-color: #D97DA5 !important;
        border-radius: 50%;
    }

    .motto {
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #999;
    }

    @media (max-width: 768px) {
            .collections-title .title-main {
                font-size: 24px !important;
            }
        .large-bg-text { font-size: 10vw; left: 4%; letter-spacing: 1px; }
        .display-title { font-size: 1.1rem; margin-top: 20px !important; }
        .editorial-text { font-size: 0.7rem; max-width: 100%; }
        .footer-compact { flex-direction: column; align-items: flex-start; gap: 15px; }
        .dot-divider { display: none; }
    }

    /* ============================================================
       SECTION TITLES (unified)
    ============================================================ */
    .collections-title {
        text-align: center;
        margin-bottom: 32px;
    }

    .collections-title .title-main {
        display: block;
        font-family: "Cormorant Garamond", serif;
        font-weight: 500;
        font-size: 36px;
        letter-spacing: 1px;
        color: var(--demanto-dark);
        text-transform: uppercase;
    }

    .divider {
        width: 80px;
        height: 2px;
        margin: 10px auto 0;
        background: var(--demanto-red);
        position: relative;
    }
    .divider span {
        position: absolute;
        left: 50%;
        top: 50%;
        width: 10px;
        height: 10px;
        background: var(--demanto-red);
        transform: translate(-50%, -50%) rotate(45deg);
    }

    /* ============================================================
       FEATURED PRODUCTS
    ============================================================ */
    .featured-products {
        padding: 10px 0 10px;
        overflow: hidden;
        background: linear-gradient(180deg, var(--demanto-white), #FAF8F3);
    }

    .featured-products .position-relative {
        padding: 0 2px;
    }

    .featured-products-slider {
        overflow: hidden;
    }
    .featured-products-slider .swiper-slide {
        height: auto;
        padding-bottom: 4px;
    }

    .featured-product-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid var(--luxury-border);
        border-radius: 20px;
        background: var(--demanto-white);
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .featured-product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(201, 169, 110, 0.12);
    }

    .featured-image {
        position: relative;
        width: 100%;
        height: 380px;
        overflow: hidden;
        background: #F8F5EF;
    }
    .featured-image a {
        display: block;
        width: 100%;
        height: 100%;
    }
    .featured-image img {
        display: block;
        width: 100%;
        height: 100%;
        padding: 20px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .featured-product-card:hover .featured-image img {
        transform: scale(1.05);
    }

    .featured-content {
        padding: 18px 15px;
        text-align: center;
    }
    .featured-content h4 {
        margin: 0 0 8px;
        color: var(--demanto-dark);
        font-family: "Cormorant Garamond", serif;
        font-size: 22px;
        font-weight: 600;
        line-height: 1.3;
    }
    .featured-content a {
        color: var(--demanto-muted);
        font-family: "Montserrat", sans-serif;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 1px;
        text-decoration: none;
        text-transform: uppercase;
        transition: color 0.3s ease;
    }
    .featured-content a:hover {
        color: var(--demanto-red);
    }

    .featured-pagination {
        position: relative;
        text-align: center;
    }
    .featured-pagination .swiper-pagination-bullet {
        width: 7px;
        height: 7px;
        margin: 0 4px !important;
        background: var(--demanto-muted);
        opacity: 0.35;
        transition: all 0.3s ease;
    }
    .featured-pagination .swiper-pagination-bullet-active {
        width: 22px;
        border-radius: 20px;
        background: var(--demanto-red);
        opacity: 1;
    }

    .featured-prev, .featured-next {
        position: absolute;
        top: 50%;
        z-index: 10;
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--luxury-border);
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.95);
        color: var(--demanto-red);
        cursor: pointer;
        transform: translateY(-50%);
        transition: var(--transition-smooth);
    }
    .featured-prev { left: -14px; }
    .featured-next { right: -14px; }
    .featured-prev:hover, .featured-next:hover {
        border-color: var(--demanto-red);
        background: var(--demanto-red);
        color: var(--demanto-white);
    }

    /* ============================================================
       LATEST ARRIVALS & BEST SELLERS – gold footers
    ============================================================ */
    .latest-arrivals-section,
    .best-sellers-section {
        width: 100%;
        padding: 10px 0 10px;
        overflow: hidden;
    }
    .latest-arrivals-section {
        background: var(--demanto-white);
    }
    .best-sellers-section {
        background: #faf8f5;
    }

    .latest-arrivals-grid,
    .best-sellers-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 30px;
        width: 100%;
    }

    .latest-arrival-card,
    .best-seller-card {
        position: relative;
        width: 100%;
        min-width: 0;
        overflow: hidden;
        background: var(--demanto-white);
        border-radius: 4px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.04);
        transition: transform .35s ease, box-shadow .35s ease;
    }
    .latest-arrival-card:hover,
    .best-seller-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.10);
    }

    .latest-arrival-image-link,
    .best-seller-image-link {
        display: block;
        width: 100%;
        text-decoration: none;
    }

    .latest-arrival-image,
    .best-seller-image {
        position: relative;
        width: 100%;
        height: 500px;
        overflow: hidden;
        background: #f5f3f0;
    }
    .latest-arrival-image img,
    .best-seller-image img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .65s cubic-bezier(.25, .46, .45, .94);
    }
    .latest-arrival-card:hover .latest-arrival-image img,
    .best-seller-card:hover .best-seller-image img {
        transform: scale(1.045);
    }

    .latest-arrival-badges,
    .best-seller-badges {
        position: absolute;
        top: 12px;
        right: 12px;
        z-index: 5;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 7px;
    }
    .latest-stock-badge,
    .best-seller-stock {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 70px;
        padding: 6px 10px;
        border-radius: 5px;
        background: var(--demanto-red);
        color: var(--demanto-white);
        font-family: 'Montserrat', sans-serif;
        font-size: 11px;
        font-weight: 500;
        line-height: 1;
        white-space: nowrap;
        box-shadow: 0 2px 8px rgba(0,0,0,.08);
    }
    .latest-stock-badge.out-of-stock,
    .best-seller-stock.out-of-stock {
        background: #777777;
    }
    .latest-discount-badge,
    .best-seller-discount {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 55px;
        padding: 6px 9px;
        border-radius: 5px;
        background: #00a51a;
        color: var(--demanto-white);
        font-family: 'Montserrat', sans-serif;
        font-size: 10px;
        font-weight: 600;
        line-height: 1;
        white-space: nowrap;
        box-shadow: 0 2px 8px rgba(0,0,0,.08);
    }

    .best-seller-label {
        position: absolute;
        top: 12px;
        left: 12px;
        z-index: 5;
        padding: 6px 10px;
        background: rgba(255,255,255,.92);
        color: var(--demanto-dark);
        font-family: 'Montserrat', sans-serif;
        font-size: 9px;
        font-weight: 600;
        letter-spacing: 1.2px;
        text-transform: uppercase;
    }

    .latest-arrival-footer,
    .best-seller-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        min-height: 58px;
        padding: 0 20px;
        background: var(--demanto-red);
        color: var(--demanto-white);
        text-decoration: none;
        transition: background .3s ease;
    }
    .latest-arrival-card:hover .latest-arrival-footer,
    .best-seller-card:hover .best-seller-footer {
        background: var(--demanto-red-dark);
    }
    .latest-arrival-name,
    .best-seller-name {
        min-width: 0;
        overflow: hidden;
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.3;
        color: var(--demanto-white);
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    .latest-arrival-arrow,
    .best-seller-arrow {
        flex-shrink: 0;
        margin-left: 15px;
        font-family: Arial, sans-serif;
        font-size: 24px;
        font-weight: 300;
        line-height: 1;
        color: var(--demanto-white);
        transition: transform .3s ease;
    }
    .latest-arrival-card:hover .latest-arrival-arrow,
    .best-seller-card:hover .best-seller-arrow {
        transform: translateX(5px);
    }

    .latest-arrivals-empty,
    .best-sellers-empty {
        grid-column: 1 / -1;
        padding: 60px 20px;
        text-align: center;
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        color: #777777;
    }

    .latest-arrivals-view-all,
    .best-sellers-view-all {
        margin-top: 35px;
        text-align: center;
    }

    /* ============================================================
       EXHIBITIONS
    ============================================================ */
    .exhibitions-area {
        padding: 32px 0 40px;
        overflow: hidden;
        background: #FBF9F4;
    }

    .section-title-demanto {
        color: var(--demanto-red);
        font-family: "Cormorant Garamond", serif;
        font-size: 34px;
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
        height: 420px;
        object-fit: cover;
        transition: transform 0.5s ease, opacity 0.5s ease;
    }
    .demanto-exhibition-item:hover img {
        transform: scale(1.05);
    }
    .swiper-slide-prev .demanto-exhibition-item img,
    .swiper-slide-next .demanto-exhibition-item img {
        opacity: 0.60;
    }

    .demanto-prev, .demanto-next {
        position: absolute;
        top: 50%;
        z-index: 10;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--luxury-border);
        border-radius: 50%;
        background: var(--demanto-white);
        color: var(--demanto-red);
        cursor: pointer;
        transform: translateY(-50%);
        transition: var(--transition-smooth);
    }
    .demanto-prev { left: -10px; }
    .demanto-next { right: -10px; }
    .demanto-prev:hover, .demanto-next:hover {
        border-color: var(--demanto-red);
        background: var(--demanto-red);
        color: var(--demanto-white);
    }

    /* ============================================================
       RESPONSIVE ADJUSTMENTS
    ============================================================ */
    @media (max-width: 991px) {
        .latest-arrivals-grid, .best-sellers-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }
        .latest-arrival-image, .best-seller-image { height: 420px; }
    }

    @media (max-width: 767px) {
        .latest-arrivals-section, .best-sellers-section {
            padding: 10px 0 10px;
        }
        .latest-arrivals-grid, .best-sellers-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }
        .latest-arrival-image, .best-seller-image { height: 310px; }
        .latest-arrival-badges, .best-seller-badges { top: 8px; right: 8px; gap: 5px; }
        .latest-stock-badge, .best-seller-stock { min-width: 58px; padding: 5px 7px; font-size: 9px; }
        .latest-discount-badge, .best-seller-discount { min-width: 47px; padding: 5px 6px; font-size: 8px; }
        .latest-arrival-footer, .best-seller-footer { min-height: 48px; padding: 0 12px; }
        .latest-arrival-name, .best-seller-name { font-size: 11px; }
        .latest-arrival-arrow, .best-seller-arrow { font-size: 19px; margin-left: 8px; }
        .best-seller-label { font-size: 7px; padding: 4px 6px; }
    }

    @media (max-width: 480px) {
        .latest-arrivals-grid, .best-sellers-grid { gap: 10px; }
        .latest-arrival-image, .best-seller-image { height: 255px; }
        .latest-arrival-footer, .best-seller-footer { min-height: 45px; padding: 0 10px; }
        .latest-arrival-name, .best-seller-name { font-size: 10px; }
        .latest-arrival-arrow, .best-seller-arrow { font-size: 18px; }
    }

    /* ============================================================
       SCROLLBAR
    ============================================================ */
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: var(--demanto-bg); }
    ::-webkit-scrollbar-thumb { border-radius: 3px; background: var(--demanto-red); }
    ::-webkit-scrollbar-thumb:hover { background: var(--demanto-red-dark); }
</style>

<!-- Hero Slider Section -->
<section class="home-banner">
    <div class="swiper default-slider-container">
        <div class="swiper-wrapper">
            @forelse($sliders as $hero)
            <div class="swiper-slide">
                <div class="hero-banner-image">
                    <img class="hero-bg" src="{{ $hero->image ? asset($hero->image) : asset('assets/img/slider-placeholder.jpg') }}" alt="{{ $hero->title }}" loading="{{ $loop->first ? 'eager' : 'lazy' }}" fetchpriority="{{ $loop->first ? 'high' : 'auto' }}" decoding="async">
                    <div class="hero-overlay"></div>
                    <div class="container h-100 p-4">
                        <div class="row h-100 align-items-center">
                            <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
                                <div class="slider-content">
                                    <h1 class="slider-title">{{ $hero->title }}</h1>
                                    <p class="slider-desc">{{ $hero->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="swiper-slide">
                <div class="hero-banner-image">
                    <img class="hero-bg" src="{{ asset('assets/img/slider-placeholder.jpg') }}" alt="Demanto" loading="eager" fetchpriority="high">
                    <div class="hero-overlay"></div>
                    <div class="container h-100 p-4">
                        <div class="row h-100 align-items-center">
                            <div class="col-lg-7">
                                <div class="slider-content">
                                    <h1 class="slider-title">Timeless Luxury</h1>
                                    <p class="slider-desc">Where diamonds become timeless masterpieces.</p>
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

<!-- WhatsApp Button -->
<a href="https://wa.me/971508505260?text=Hello%20DEMANTO,%20I%20would%20like%20to%20know%20more%20about%20your%20collections." class="whatsapp-btn" target="_blank" rel="noopener noreferrer" aria-label="Contact DEMANTO on WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- About Section -->
<section>
    <div class="about-editorial-root">
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
                <p class="editorial-text" v-html="">{!! nl2br(e($about->description)) !!}</p>
            </div>
        </div>
        @else
        <div class="container py-5 text-center">
            <p>About Us content is currently being updated.</p>
        </div>
        @endif
    </div>
</section>

<!-- Latest Arrivals -->
<section class="latest-arrivals-section">
    <div class="container">
        <div class="collections-title mb-4">
            <span class="title-main">Latest Arrivals</span>
            <div class="divider"><span></span></div>
        </div>

        <div class="latest-arrivals-grid">
            @forelse($newArrivalsProducts->take(6) as $product)
                <div class="latest-arrival-card">
                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" class="latest-arrival-image-link">
                        <div class="latest-arrival-image">
                            @if($product->productImages->count())
                                <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}" loading="lazy" decoding="async">
                            @else
                                <img src="{{ asset('assets/img/placeholder.jpg') }}" alt="{{ $product->name }}" loading="lazy">
                            @endif
                            <div class="latest-arrival-badges">
                                @if($product->quantity > 0)
                                    <span class="latest-stock-badge">In Stock</span>
                                @else
                                    <span class="latest-stock-badge out-of-stock">Out of Stock</span>
                                @endif
                                @if($product->original_price > 0 && $product->selling_price < $product->original_price)
                                    @php $discount = round((($product->original_price - $product->selling_price) / $product->original_price) * 100); @endphp
                                    <span class="latest-discount-badge">-{{ $discount }}%</span>
                                @endif
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" class="latest-arrival-footer">
                        <span class="latest-arrival-name">{{ $product->name }}</span>
                        <span class="latest-arrival-arrow">→</span>
                    </a>
                </div>
            @empty
                <div class="latest-arrivals-empty"><p>No latest arrivals available.</p></div>
            @endforelse
        </div>

        <div class="latest-arrivals-view-all">
            <a href="{{ url('/categories') }}" class="btn-demanto">View All</a>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products">
    <div class="container">
        <div class="collections-title mb-3">
            <span class="title-main">Featured Pieces</span>
            <div class="divider"><span></span></div>
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
                                        <img src="{{ asset($product->productImages[0]->image) }}" loading="lazy" decoding="async" alt="{{ $product->name }}">
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

<!-- Best Sellers -->
<section class="best-sellers-section">
    <div class="container">
        <div class="collections-title mb-4">
            <span class="title-main">Best Sellers</span>
            <div class="divider"><span></span></div>
        </div>

        <div class="best-sellers-grid">
            @forelse($bestSellersProducts->take(6) as $product)
                <div class="best-seller-card">
                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" class="best-seller-image-link">
                        <div class="best-seller-image">
                            @if($product->productImages->count())
                                <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}" loading="lazy" decoding="async">
                            @else
                                <img src="{{ asset('assets/img/placeholder.jpg') }}" alt="{{ $product->name }}" loading="lazy" decoding="async">
                            @endif
                            <div class="best-seller-badges">
                                @if($product->quantity > 0)
                                    <span class="best-seller-stock">In Stock</span>
                                @else
                                    <span class="best-seller-stock out-of-stock">Out of Stock</span>
                                @endif
                                @if($product->original_price > 0 && $product->selling_price < $product->original_price)
                                    @php $discount = round((($product->original_price - $product->selling_price) / $product->original_price) * 100); @endphp
                                    <span class="best-seller-discount">-{{ $discount }}%</span>
                                @endif
                            </div>
                            <span class="best-seller-label">Best Seller</span>
                        </div>
                    </a>
                    <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}" class="best-seller-footer">
                        <span class="best-seller-name">{{ $product->name }}</span>
                        <span class="best-seller-arrow">→</span>
                    </a>
                </div>
            @empty
                <div class="best-sellers-empty"><p>Best sellers will appear here once customers start shopping.</p></div>
            @endforelse
        </div>

        <div class="best-sellers-view-all">
            <a href="{{ url('/categories') }}" class="btn-demanto">View All</a>
        </div>
    </div>
</section>

<!-- Exhibitions -->
{{-- <section class="exhibitions-area">
    <div class="container">
        <div class="collections-title mb-3">
            <span class="title-main">Exhibitions & Events</span>
            <div class="divider"><span></span></div>
        </div>
        <div class="position-relative">
            <div class="swiper exhibitions-slider">
                <div class="swiper-wrapper">
                    @foreach($blogs as $exhibition)
                        <div class="swiper-slide">
                            <a href="{{ url('blog/details/'.$exhibition->id) }}" class="demanto-exhibition-link">
                                <div class="demanto-exhibition-item">
                                    <img src="{{ asset($exhibition->image) }}" alt="{{ $exhibition->title }}">
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
            <a href="{{ url('/blogs') }}" class="btn-demanto">View All</a>
        </div>
    </div>
</section> --}}

<script>
document.addEventListener('DOMContentLoaded', function () {
    /* ======== WhatsApp Position ======== */
    const whatsappButton = document.querySelector('.home-default-wrapper > .whatsapp-btn');
    const homeBanner = document.querySelector('.home-banner');

    function positionWhatsappButton() {
        if (!whatsappButton || !homeBanner) return;
        const bannerRect = homeBanner.getBoundingClientRect();
        const distanceFromSliderBottom = -45;
        let buttonTop = bannerRect.bottom - distanceFromSliderBottom;
        const minimumTop = 80;
        const maximumTop = window.innerHeight - 40;
        buttonTop = Math.max(minimumTop, Math.min(buttonTop, maximumTop));
        whatsappButton.style.top = buttonTop + 'px';
    }
    positionWhatsappButton();
    window.addEventListener('load', positionWhatsappButton);
    window.addEventListener('resize', positionWhatsappButton);
    window.addEventListener('orientationchange', positionWhatsappButton);

    /* ======== Lazy Load ======== */
    const images = document.querySelectorAll('img[data-src]');
    if ('IntersectionObserver' in window) {
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
    } else {
        images.forEach(img => {
            img.src = img.dataset.src;
            img.classList.add('loaded');
        });
    }

    /* ======== Hero Swiper Update ======== */
    document.querySelectorAll('.hero-bg').forEach(function(img){
        function updateHero(){
            if(window.heroSwiper){
                heroSwiper.update();
                heroSwiper.updateAutoHeight();
            }
        }
        if(img.complete){
            updateHero();
        }else{
            img.onload = updateHero;
        }
    });
});
</script>

@endsection