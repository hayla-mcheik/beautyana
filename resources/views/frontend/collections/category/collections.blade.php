@extends('layouts.app')
@section('title', 'About Us')

@section('content')
<!-- Dynamic Breadcrumb -->
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'Collections',
            'url' => '#'
        ]
    ]
])
<!-- Signature Collections Section -->
<section class="signature-collections">

    <div class="container p-4">

        <div class="collections-title">
            <span>EXPLORE OUR COLLECTIONS</span>

            <div class="divider">
                <span></span>
            </div>
        </div>

        {{-- ========================= COLLECTIONS ========================= --}}
        @if($collections->count())



        <div class="position-relative mt-4">

            <div class="swiper signature-slider collections-slider">

                <div class="swiper-wrapper">

                    @foreach($collections as $categoryItem)

                    <div class="swiper-slide">

                        <a href="{{ url('/collections/'.$categoryItem->slug) }}" class="collection-card">

                            <div class="collection-inner">

                                <h3>{{ strtoupper($categoryItem->name) }}</h3>

                                <div class="collection-image">
                                    <img src="{{ asset($categoryItem->image) }}"
                                         alt="{{ $categoryItem->name }}">
                                </div>

                                <div class="discover-link">
                                    DISCOVER MORE
                                    <span>→</span>
                                </div>

                            </div>

                        </a>

                    </div>

                    @endforeach

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

    /* Collections Section - Minimized */
/*==================================================
    LUXURY COLLECTIONS
==================================================*/

.signature-collections{
    background:#f7f2eb;
    padding:0px 0;
}

.collections-title{
    text-align:center;
    margin-bottom:0px;
}

.collections-title span{
    display:block;
    font-family:'Roboto';
    font-weight: 600;
    font-size:18px;
    letter-spacing:4px;
    color:var(--boutique-dark);
    text-transform:uppercase;
}

.divider{
    width:120px;
    height:25px;
    margin:0px auto 0;
    position:relative;
}

.divider:before{
    content:"";
    position:absolute;
    left:0;
    right:0;
    top:50%;
    height:1px;
    background:#d7c4a2;
}

.divider span{
    position:absolute;
    left:50%;
    top:50%;
    width:12px;
    height:12px;
    background:#b39256;
    transform:translate(-50%,-50%) rotate(45deg);
}

/* CARD */

.collection-card{
    display:block;
    text-decoration:none;
}

.collection-inner{

    position:relative;

    height:330px;

    overflow:hidden;

    border-radius:145px 145px 6px 6px;

    border:1px solid #d9cdb8;

    background:
        radial-gradient(circle at top,
            rgba(255,255,255,.95) 0%,
            rgba(255,255,255,.55) 22%,
            rgba(255,255,255,0) 45%
        ),

        linear-gradient(
            180deg,
            #c9a96e40  0%,
            #c9a96e40  45%,
            #c9a96e40  100%
        );

    box-shadow:
        inset 0 0 0 6px #faf8f3,
        inset 20px 20px 20px 20px #bc7b18,
     0 12px 24px #bc7b18,
        inset 30px 35px 40px #bc7b18,
        20px 12px 24px rgba(0,0,0,.05);

    transition:all .45s ease;
}

.collection-inner::before{

    content:"";

    position:absolute;

    inset:12px;

    border-radius:132px 132px 3px 3px;

    border:2px solid #ebe2d4;

    box-shadow:

        inset 0 0 0 1px rgba(178,147,94,.18),

        inset 0 20px 30px rgba(255,255,255,.35);

    pointer-events:none;
}
.collection-inner{

    transform:translateY(-8px);

    border-color:#c8af7f;

    box-shadow:

        inset 0 0 0 6px #faf8f3,

        inset 0 0 0 7px #dbc59b,

        inset 0 -50px 60px rgba(208,189,161,.18),

        0 20px 40px rgba(0,0,0,.08);
}
/* TITLE */

.collection-inner h3{

    margin-top:50px;

    margin-bottom:14px;

    font-family:'Roboto';

    font-size:14px;

    font-weight:600;

    letter-spacing:1.8px;

    color:var(--boutique-dark);

    text-transform:uppercase;

    text-align:center;
}

/* IMAGE */

.collection-image{

    height:170px;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:0 30px;

    position:relative;
}

/* shadow under product */

.collection-image:after{

    content:"";

    position:absolute;

    width:180px;

    height:35px;

    left:50%;

    bottom:22px;

    transform:translateX(-50%);

    background:radial-gradient(
        ellipse at center,
        rgba(0,0,0,.20) 0%,
        rgba(0,0,0,.10) 45%,
        rgba(0,0,0,0) 80%
    );

    filter:blur(10px);

    opacity:.45;

    z-index:1;
}

.collection-image img{

    max-width:78%;

    max-height:145px;

    object-fit:contain;

    position:relative;

    z-index:2;

    transition:.45s;

    filter:

        brightness(1.02)

        drop-shadow(0 10px 10px rgba(0,0,0,.08))

        drop-shadow(0 22px 18px rgba(0,0,0,.06));
}
.collection-inner img{

    transform:translateY(-8px) scale(1.04);

    filter:
        drop-shadow(32px 32px 32px rgba(0,0,0,.12))
        drop-shadow(44px 44px 44px rgba(0,0,0,.10));
}

/* FOOTER */

.discover-link{

    position:absolute;

    left:0;

    right:0;

    bottom:24px;

    text-align:center;

    font-family:'Montserrat',sans-serif;

    font-size:8px;

    font-weight:500;

    letter-spacing:2px;

    text-transform:uppercase;

    color:#76614a;
}

.discover-link span{

    margin-left:8px;

    transition:.3s;
}

.collection-inner:hover .discover-link span{

    margin-left:16px;
}

/* MOBILE */

@media(max-width:768px){

.collection-inner{

    height:240px;

    border-radius:110px 110px 6px 6px;
}

.collection-inner::before{

    inset:12px;

    border-radius:100px 100px 4px 4px;
}

.collection-inner h3{


    margin-top:30px;

    font-size:12px;
}

.collection-image{

    height:165px;
}

.collection-image img{

    max-height:140px;

    max-width:76%;
}

.collection-image::after{

    content:"";

    position:absolute;

    width:105px;

    height:18px;

    left:50%;

    bottom:20px;

    transform:translateX(-50%);

    border-radius:50%;

    background:#000;

    opacity:.12;

    filter:blur(13px);

    z-index:1;
}
.discover-link{

    bottom:16px;

    font-size:7px;
}

.collections-title span{

    font-size:14px;
}

}
    .collection-content span {
        font-size: 8px;
        letter-spacing: 1.5px;
        color: var(--demanto-gold);
        font-weight: 500;
    }
</style>

@endsection