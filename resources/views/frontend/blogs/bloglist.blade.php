@extends('layouts.app')
@section('title', 'Blogs Page')

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
        font-family: 'Roboto', sans-serif;
    }

    /* Exhibitions Section - Minimized */
    .exhibitions-area {
        background: linear-gradient(135deg, #FDFBF7 0%, #fff 100%);
        position: relative;
        overflow: hidden;
        padding: 20px 0 40px 0;
    }

    .exhibitions-area::before {
        content: '♦';
        position: absolute;
        top: 30px;
        right: 30px;
        font-size: 80px;
        color: var(--demanto-gold);
        opacity: 0.03;
        font-family: serif;
        pointer-events: none;
    }

    .exhibitions-area::after {
        content: '✧';
        position: absolute;
        bottom: 30px;
        left: 30px;
        font-size: 60px;
        color: var(--demanto-gold);
        opacity: 0.03;
        font-family: serif;
        pointer-events: none;
    }

    .section-title-demanto {
        font-family: 'Roboto', sans-serif;
        color: var(--demanto-gold);
        font-size: 22px;
        letter-spacing: 1.5px;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .section-subtitle {
        font-size: 9px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--demanto-gold);
        font-weight: 500;
        display: inline-block;
        position: relative;
        padding-bottom: 4px;
    }

    .section-subtitle::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 25px;
        height: 1.5px;
        background: var(--demanto-gold);
    }

    /* Exhibition Cards - Grid Layout - Minimized */
    .exhibitions-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(320px, 1fr));
        gap: 10px;
        margin: 10px 0;
    }

    .exhibition-card {
        background: #fff;
        border-radius: 18px;
        border: 1px solid var(--luxury-border);
        overflow: hidden;
        transition: var(--transition-smooth);
        position: relative;
    }

    .exhibition-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--demanto-gold), transparent);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
        z-index: 1;
    }

    .exhibition-card:hover::before {
        transform: translateX(0);
    }

    .exhibition-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--box-shadow-luxury);
        border-color: var(--demanto-gold);
    }

    .exhibition-image {
        position: relative;
        overflow: hidden;
        height: 340px;
        background: linear-gradient(135deg, #faf8f3 0%, #fff 100%);
    }

    .exhibition-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .exhibition-card:hover .exhibition-image img {
        transform: scale(1.05);
    }

    .exhibition-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
        padding: 15px;
        transform: translateY(100%);
        transition: transform 0.4s ease;
    }

    .exhibition-card:hover .exhibition-overlay {
        transform: translateY(0);
    }

    .exhibition-overlay span {
        color: #fff;
        font-size: 9px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .exhibition-content {
        padding: 15px;
        text-align: center;
    }

    .exhibition-icon {
        color: var(--demanto-gold);
        font-size: 18px;
        margin-bottom: 8px;
        display: inline-block;
        transition: transform 0.3s ease;
    }

    .exhibition-card:hover .exhibition-icon {
        transform: rotate(180deg);
    }

    .exhibition-content h3 {
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 500;
        color: var(--demanto-dark);
        margin-bottom: 6px;
        transition: var(--transition-smooth);
    }

    .exhibition-card:hover .exhibition-content h3 {
        color: var(--demanto-gold);
    }

    .exhibition-date {
        font-size: 10px;
        color: var(--demanto-gold);
        letter-spacing: 1px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .exhibition-date i {
        font-size: 10px;
    }

    .exhibition-content p {
        font-size: 12px;
        color: var(--demanto-muted);
        line-height: 1.5;
        margin-bottom: 12px;
    }

    /* Empty State - Minimized */
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        background: #fff;
        border-radius: 18px;
        border: 1px solid var(--luxury-border);
    }

    .empty-state i {
        font-size: 40px;
        color: var(--demanto-gold);
        margin-bottom: 15px;
        opacity: 0.5;
    }

    .empty-state h3 {
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        color: var(--demanto-dark);
        margin-bottom: 8px;
    }

    .empty-state p {
        font-size: 12px;
        color: var(--demanto-muted);
    }

    /* Animation */
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

    .exhibition-card {
        animation: fadeInUp 0.5s ease-out;
        animation-fill-mode: backwards;
    }

    /* Responsive - Minimized */
    @media (max-width: 992px) {
        .exhibitions-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 18px;
        }
        .exhibition-image {
            height: 300px;
        }
    }

    @media (max-width: 768px) {
        .exhibitions-area {
            padding: 15px 0 30px 0;
        }
        .section-title-demanto {
            font-size: 20px;
        }
        .exhibitions-grid {
            grid-template-columns: 1fr;
            gap: 18px;
            margin: 20px 0;
        }
        .exhibition-image {
            height: 300px;
        }
        .exhibition-content h3 {
            font-size: 15px;
        }
        .exhibition-content p {
            font-size: 11px;
        }
    }

    @media (max-width: 576px) {
        .exhibition-image {
            height: 280px;
        }
        .exhibition-content {
            padding: 12px;
        }
        .exhibition-content h3 {
            font-size: 14px;
        }
        .exhibition-content p {
            font-size: 11px;
        }
        .exhibition-date {
            font-size: 9px;
        }
        .exhibition-icon {
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
    color:#6f5d48;
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
@media(max-width:768px){
    .collections-title span{

    font-size:16px;
}
}
</style>

<!-- Dynamic Breadcrumb -->
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'Events',
            'url' => '#'
        ]
    ]
])

<!-- Exhibitions Section - Grid Layout (No Slider) -->
<section class="exhibitions-area">
    <div class="container">
           <div class="collections-title mb-3">

            <span>EXHIBITIONS & EVENTS</span>

            <div class="divider">
                <span></span>
            </div>

        </div>

@if($blogs->count() > 0)

<div class="exhibitions-grid">

@foreach($blogs as $index => $exhibition)

<a href="{{ url('blog/details/'.$exhibition->id) }}"
   class="exhibition-card-link"
   style="text-decoration:none;color:inherit;display:block;">

    <div class="exhibition-card"
         style="animation-delay: {{ $index * 0.05 }}s">

        <div class="exhibition-image">
            <img src="{{ asset($exhibition->image) }}"
                 alt="{{ $exhibition->title }}"
                 loading="lazy">

            <div class="exhibition-overlay">
                <span>Featured Event</span>
            </div>
        </div>

        <div class="exhibition-content">

            <div class="exhibition-icon">✧</div>

            <h3>{{ $exhibition->title }}</h3>

            <div class="exhibition-date">
                <i class="fa fa-calendar"></i>
   <span>
    {{ $exhibition->date?->format('F d, Y') }}
</span>
            </div>

            <p>{{ Str::limit(strip_tags($exhibition->description),120) }}</p>

        </div>

    </div>

</a>

@endforeach

</div>

@else
            <div class="empty-state">
                <i class="fa-regular fa-calendar"></i>
                <h3>No Events Available</h3>
                <p>New exhibitions and events are being planned. Please check back soon.</p>
            </div>
        @endif
    </div>
</section>

@endsection