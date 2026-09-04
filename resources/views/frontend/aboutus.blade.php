@extends('layouts.app')
@section('title', 'About Us')

@section('content')

<style>
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

</style>

<!-- Dynamic Breadcrumb -->
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'About Us',
            'url' => '#'
        ]
    ]
])

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

@endsection