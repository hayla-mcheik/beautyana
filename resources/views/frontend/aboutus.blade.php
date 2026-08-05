@extends('layouts.app')
@section('title', 'About Us')

@section('content')

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
        --box-shadow-luxury: 0 25px 45px rgba(179, 146, 86, 0.1);
    }

    body {
        background-color: var(--demanto-bg);
        font-family:"Cormorant Garamond",serif;
    }

    /* About Section - Minimized */
    .about-editorial-section {
        background: linear-gradient(135deg, #FBF9F4 0%, #fff 100%);
        position: relative;
        overflow: hidden;
        padding: 30px 0;
    }
    
    .about-editorial-section::before {
        content: '♦';
        position: absolute;
        bottom: 20px;
        right: 20px;
        font-size: 60px;
        color: var(--demanto-gold);
        opacity: 0.04;
        font-family: serif;
        pointer-events: none;
    }

    .about-editorial-section::after {
        content: '✧';
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 50px;
        color: var(--demanto-gold);
        opacity: 0.04;
        font-family: serif;
        pointer-events: none;
    }
    
    .about-title {
        font-family:"Cormorant Garamond",serif;
        font-size: 32px;
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
        font-size: 12px;
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
    
    .metric-item {
        text-align: center;
        transition: transform 0.3s ease;
    }
    
    .metric-item:hover {
        transform: translateY(-3px);
    }
    
    .metric-item i {
        font-size: 22px;
        color: var(--demanto-gold);
        transition: all 0.3s ease;
    }
    
    .metric-item:hover i {
        transform: scale(1.05);
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

    /* Button Styles */
    .btn-demanto {
        background: linear-gradient(135deg, var(--demanto-gold) 0%, #9a7b45 100%);
        color: #fff !important;
        font-size: 14px;
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
        margin-top: 15px;
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

    /* Responsive - Minimized */
    @media (max-width: 768px) {
        .about-editorial-section {
            padding: 20px 0;
        }
        .about-title {
            font-size: 26px;
        }
        .metric-number {
            font-size: 18px;
        }
        .metric-item i {
            font-size: 18px;
        }
        .metric-label {
            font-size: 7px;
            letter-spacing: 0.5px;
        }
        .about-description {
            font-size: 14px;
        }
    }

    @media (max-width: 576px) {
        .about-title {
            font-size: 22px;
        }
        .metric-number {
            font-size: 16px;
        }
        .metric-item i {
            font-size: 16px;
        }
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

<!-- About Editorial Section -->
<section class="about-editorial-section">
    <div class="container">
        <div class="row align-items-start g-3">
            <!-- Images -->
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

            <!-- Content -->
            <div class="col-lg-6 ps-lg-3">
                <h2 class="about-title">
                    {{ $aboutData->title ?? 'Crafting Timeless Elegance Since 2005' }}
                </h2>
                <div class="about-description">
                    {!! nl2br(e($aboutData->description ?? 'With more than 20 years of expertise, DEMANTO is a leading name in fine jewelry manufacturing.')) !!}
                </div>
                
                <hr class="my-2" style="border-color: var(--luxury-border);">
                
           

                <div class="mt-3">
                    <a href="{{ url('/contact') }}" class="btn-demanto">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection