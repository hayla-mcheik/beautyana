@extends('layouts.app')

@section('title', 'About Us')

@section('content')

@php
    $breadcrumbs = [
        [
            'title' => 'About Us',
            'url'   => '#'
        ]
    ];
@endphp

{{-- Breadcrumb --}}
@include('layouts.inc.frontend.breadcrumb', ['breadcrumbs' => $breadcrumbs])


<section>

    <div class="about-editorial-root py-5 position-relative overflow-hidden">

        @if($about)

            <div class="art-background-layer">

                <div class="large-bg-text">
                    {{ $about->title ?? 'About Us' }}
                </div>

                <svg
                    class="botanical-svg"
                    viewBox="0 0 100 100"
                    fill="none"
                >

                    <path
                        d="M10 80C30 80 80 60 90 10M10 80C40 70 80 40 90 10"
                        stroke="#b95c19"
                        stroke-width="0.2"
                        opacity="0.2"
                    />

                </svg>

            </div>


            <div class="wide-content-wrapper px-4 px-md-5 position-relative z-2">

                <div class="header-minimal mb-4">

                    <h2 class="display-title mt-2">
                        {{ $about->title ?? 'About Us' }}
                    </h2>

                </div>


                <div class="description-full-width">

                    <p class="editorial-text">

                        {!! nl2br(e($about->description)) !!}

                    </p>

                </div>


                <div class="footer-compact mt-5 d-flex align-items-center gap-4">

                    <div class="signature-wrap">

                        <img
                            src="/assets/img/logo.png"
                            alt="Beautyana"
                            class="about-sig-logo"
                        >

                    </div>


                    <span class="motto mt-4">

                        {{ $about->title ?? 'About Us' }}

                    </span>

                </div>

            </div>

        @else

            <div class="container py-5 text-center">

                <p>
                    About Us content is currently being updated.
                </p>

            </div>

        @endif

    </div>

</section>


<style>

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

    font-family: 'Playfair Display', serif;

    font-size: 10vw;

    font-weight: 900;

    color: #e0a4a40d !important;

    letter-spacing: -5px;

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

}


.display-title {

    font-size: 24px;

    font-weight: 700;

    color: #51555A;

    text-transform: capitalize;

}


.editorial-text {

    font-size: 0.75rem;

    line-height: 2.2;

    color: #51555A;

    font-weight: 400;

    letter-spacing: 0.4px;

}


.about-sig-logo {

    width: 55px;

    height: auto;

    opacity: 0.9;

}


.motto {

    font-size: 9px;

    text-transform: uppercase;

    letter-spacing: 2px;

    color: #999;

}


@media (max-width: 768px) {

    .large-bg-text {

        font-size: 10vw;

        left: -10%;

    }

    .display-title {

        font-size: 1.1rem;

        margin-top: 20px !important;

    }

    .editorial-text {

        font-size: 0.7rem;

        max-width: 100%;

    }

    .footer-compact {

        flex-direction: column;

        align-items: flex-start;

        gap: 15px;

    }

}

</style>

@endsection