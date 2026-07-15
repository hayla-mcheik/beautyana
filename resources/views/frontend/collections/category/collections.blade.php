@extends('layouts.app')
@section('title', 'About Us')

@section('content')
<!-- Dynamic Breadcrumb -->
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'THE HOUSE OF DEMANTO',
            'url' => '#'
        ]
    ]
])
<!-- Signature Collections Section -->
<section class="signature-collections">

    <div class="container p-4">



        {{-- ========================= COLLECTIONS ========================= --}}
  {{-- ========================= COLLECTIONS ========================= --}}
@if($collections->count())

<div class="all-categories">

    <div class="collections-title mb-2">
        <span>COLLECTIONS</span>

        <div class="divider">
            <span></span>
        </div>
    </div>

    <div class="position-relative">

        <div class="swiper signature-slider collections-slider">

            <div class="swiper-wrapper">

                @foreach($collections as $categoryItem)

                    <div class="swiper-slide">

                        <a href="{{ url('/collections/'.$categoryItem->slug) }}" class="collection-card">

                            <div class="collection-inner">

                                <h3>{{ strtoupper($categoryItem->name) }}</h3>

                                <div class="collection-image">
                                    <img src="{{ asset($categoryItem->image) }}" alt="{{ $categoryItem->name }}">
                                </div>

                            </div>

                        </a>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endif


{{-- ========================= HIGH JEWELRY ========================= --}}
@if($highJewelry->count())

<div class="all-categories mt-5">

    <div class="collections-title mb-2">
        <span>HIGH JEWELRY</span>

        <div class="divider">
            <span></span>
        </div>
    </div>

    <div class="position-relative">

        <div class="swiper signature-slider collections-slider">

            <div class="swiper-wrapper">

                @foreach($highJewelry as $categoryItem)

                    <div class="swiper-slide">

                        <a href="{{ url('/collections/'.$categoryItem->slug) }}" class="collection-card">

                            <div class="collection-inner">

                                <h3>{{ strtoupper($categoryItem->name) }}</h3>

                                <div class="collection-image">
                                    <img src="{{ asset($categoryItem->image) }}" alt="{{ $categoryItem->name }}">
                                </div>

                           
                            </div>

                        </a>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endif


{{-- ========================= AD SIGNATURE ========================= --}}
@if($adSignature->count())

<div class="all-categories mt-5">

    <div class="collections-title mb-2">
        <span>AD SIGNATURE</span>

        <div class="divider">
            <span></span>
        </div>
    </div>

    <div class="position-relative">

        <div class="swiper signature-slider collections-slider">

            <div class="swiper-wrapper">

                @foreach($adSignature as $categoryItem)

                    <div class="swiper-slide">

                        <a href="{{ url('/collections/'.$categoryItem->slug) }}" class="collection-card">

                            <div class="collection-inner">

                                <h3>{{ strtoupper($categoryItem->name) }}</h3>

                                <div class="collection-image">
                                    <img src="{{ asset($categoryItem->image) }}" alt="{{ $categoryItem->name }}">
                                </div>

                     

                            </div>

                        </a>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endif
    </div>

</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lazy loading for images
    const images = document.querySelectorAll('.category-card-img img');
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                }
                observer.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
    
    // Add fade-in animation to sections as they appear
    const sections = document.querySelectorAll('.all-categories');
    const sectionObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    sections.forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
        section.style.transition = 'all 0.5s ease-out';
        sectionObserver.observe(section);
    });
});
</script>

<style>

/*==================================================
    LUXURY COLLECTIONS
==================================================*/

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

    font-size: 18px;

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


/*==================================================
    SWIPER
==================================================*/

.collections-slider {

    position: relative;

    width: 100%;

    overflow: hidden;
}


.collections-slider .swiper-wrapper {

    align-items: stretch;
}


.collections-slider .swiper-slide {

    height: auto;

    box-sizing: border-box;
}


/*==================================================
    CARD
==================================================*/

.collection-card {

    display: block;

    width: 100%;

    height: 100%;

    text-decoration: none;
}


.collection-inner {

    position: relative;

    width: 100%;

    height: 260px;

    overflow: hidden;

    box-sizing: border-box;

    border-radius: 145px 145px 6px 6px;

    border: 1px solid #c8af7f;
padding-top: 20px;

    background:

        radial-gradient(

            circle at top,

            rgba(255, 255, 255, .95) 0%,

            rgba(255, 255, 255, .55) 22%,

            rgba(255, 255, 255, 0) 45%

        ),

        linear-gradient(

            180deg,

            #c9a96e40 0%,

            #c9a96e40 45%,

            #c9a96e40 100%

        );


    box-shadow:

        inset 0 0 0 6px #faf8f3,

        inset 0 0 0 7px #dbc59b,

        inset 0 -50px 60px rgba(208, 189, 161, .18),

        0 20px 40px rgba(0, 0, 0, .08);


    transition:

        transform .45s ease,

        box-shadow .45s ease,

        border-color .45s ease;
}


/*==================================================
    INNER BORDER
==================================================*/

.collection-inner::before {

    content: "";

    position: absolute;

    inset: 12px;

    border-radius: 132px 132px 3px 3px;

    border: 2px solid #ebe2d4;


    box-shadow:

        inset 0 0 0 1px rgba(178, 147, 94, .18),

        inset 0 20px 30px rgba(255, 255, 255, .35);


    pointer-events: none;

    z-index: 3;
}


/*==================================================
    CARD HOVER
==================================================*/

.collection-card:hover .collection-inner {

    transform: translateY(6px);

    box-shadow:

        inset 0 0 0 6px #faf8f3,

        inset 0 0 0 7px #dbc59b,

        inset 0 -50px 60px rgba(208, 189, 161, .18),

        0 25px 45px rgba(0, 0, 0, .12);
}


/*==================================================
    TITLE
==================================================*/

.collection-inner h3 {

    position: relative;

    z-index: 4;

    margin-top: 40px;

    margin-bottom: 8px;

    padding: 0 8px;

    font-family: 'Roboto';

    font-size: 12px;

    font-weight: 800;

    letter-spacing: 1.8px;

    color: var(--boutique-dark);

    text-transform: uppercase;

    text-align: center;
}


/*==================================================
    IMAGE
==================================================*/

.collection-image {

    position: relative;

    height: 160px;

    display: flex;

    justify-content: center;

    align-items: center;

    padding: 0 30px;
}


/*==================================================
    SHADOW UNDER PRODUCT
==================================================*/

.collection-image::after {

    content: "";

    position: absolute;

    width: 180px;

    height: 35px;

    left: 50%;

    bottom: 22px;

    transform: translateX(-50%);


    background:

        radial-gradient(

            ellipse at center,

            rgba(0, 0, 0, .20) 0%,

            rgba(0, 0, 0, .10) 45%,

            rgba(0, 0, 0, 0) 80%

        );


    filter: blur(10px);

    opacity: .45;

    z-index: 1;
}


/*==================================================
    PRODUCT IMAGE
==================================================*/

.collection-image img {

    display: block;

    max-width: 100%;

    max-height: 160px;

    object-fit: contain;

    position: relative;

    z-index: 2;

    transform: translateY(-8px) scale(1.04);


    transition:

        transform .45s ease,

        filter .45s ease;


    filter:

        brightness(1.02)

        drop-shadow(0 10px 10px rgba(0, 0, 0, .08))

        drop-shadow(0 22px 18px rgba(0, 0, 0, .06));
}


.collection-card:hover .collection-image img {

    transform: translateY(-12px) scale(1.07);
}


/*==================================================
    DISCOVER MORE
==================================================*/

.discover-link {

    position: absolute;

    left: 0;

    right: 0;

    bottom: 24px;

    z-index: 4;

    text-align: center;

    font-family: 'Montserrat', sans-serif;

    font-size: 8px;

    font-weight: 500;

    letter-spacing: 2px;

    text-transform: uppercase;

    color: #76614a;
}


.discover-link span {

    margin-left: 8px;

    transition: margin-left .3s ease;
}


.collection-card:hover .discover-link span {

    margin-left: 16px;
}


/*==================================================
    TABLET
==================================================*/

@media (max-width: 991px) {

    .collections-container {

        padding-left: 25px;

        padding-right: 25px;
    }

}


/*==================================================
    MOBILE
==================================================*/

@media (max-width: 767px) {

    .signature-collections {

        padding: 2px 0;
    }


    .collections-container {

        padding-left: 20px;

        padding-right: 20px;
    }


    .collections-slider-wrapper {

        width: 100%;
margin-top: 20px;

    }


    .collections-slider {

        width: 100%;

        overflow: hidden;
    }


    .collection-inner {

        height: 210px;

        border-radius: 110px 110px 6px 6px;
    }


    .collection-inner::before {

        inset: 10px;

        border-radius: 100px 100px 4px 4px;
    }


    .collection-inner h3 {

        margin-top: 30px;

        margin-bottom: 5px;

        padding: 0 10px;

        font-size: 12px;

        letter-spacing: 1.2px;
    }


    .collection-image {

        height: 140px;

        padding: 0 15px;
    }


    .collection-image img {

        max-height: 130px;

        max-width: 100%;
    }


    .collection-image::after {

        width: 105px;

        height: 18px;

        bottom: 20px;

        border-radius: 50%;

        background: #000;

        opacity: .12;

        filter: blur(13px);
    }


    .discover-link {

        bottom: 16px;

        font-size: 7px;

        letter-spacing: 1.2px;
    }


    .collections-title > span {

        font-size: 14px;

        letter-spacing: 3px;
    }

}


/*==================================================
    SMALL MOBILE
==================================================*/

@media (max-width: 400px) {

    .collections-container {

        padding-left: 15px;

        padding-right: 15px;
    }


    .collection-inner {

        height: 220px;
    }


    .collection-inner h3 {

        font-size: 10px;
    }


    .collection-image {

        height: 140px;
    }


    .collection-image img {

        max-height: 120px;
    }

}

</style>
@endsection