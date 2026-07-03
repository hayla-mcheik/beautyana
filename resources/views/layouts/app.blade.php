<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DEMANTO - Timeless Luxury</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

    <!--== Google Fonts - Luxury Serif + Sans ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&family=Montserrat:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--== Ionicon CSS ==-->
    {{-- <link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet"> 
    <!--== Simple Line Icon CSS ==-->
     <link href="{{ asset('assets/css/simple-line-icons.css') }}" rel="stylesheet"> 
    <!--== Line Icons CSS ==-->
    {{-- <link href="{{ asset('assets/css/lineIcons.css') }}" rel="stylesheet"> --}}
    <!--== Font Awesome Icon CSS ==-->

    {{-- <!--== Animate CSS ==-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet"> --}}
    <!--== Swiper CSS ==-->
    <link href="{{ asset('assets/css/swiper.min.css') }}" rel="stylesheet">
    <!--== Range Slider CSS ==-->
    {{-- <link href="{{ asset('assets/css/range-slider.css') }}" rel="stylesheet">
    <!--== Fancybox Min CSS ==-->
    <link href="{{ asset('assets/css/fancybox.min.css') }}" rel="stylesheet">
    <!--== Slicknav Min CSS ==-->
    <link href="{{ asset('assets/css/slicknav.css') }}" rel="stylesheet">
    <!--== Owl Carousel Min CSS ==-->
    <link href="{{ asset('assets/css/owlcarousel.min.css') }}" rel="stylesheet">
    <!--== Owl Theme Min CSS ==-->
    <link href="{{ asset('assets/css/owltheme.min.css') }}" rel="stylesheet"> --}}
    <!--== Spacing CSS ==-->
{{-- 
 <link href="{{ asset('assets/css/slicknav.css') }}" rel="stylesheet"> --}}
    <!--== Main Style CSS ==-->
    <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
         <link href="{{ asset('assets/css/simple-line-icons.css') }}" rel="stylesheet"> 
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @livewireStyles

    <style>
        /* Global Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
     font-family:"Cormorant Garamond",serif;
            color: #1A1A1A;
            background-color: #FFFFFF;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
font-family:"Cormorant Garamond",serif;
            font-weight: 500;
            letter-spacing: 0.02em;
        }

        /* Main Content Spacing - Accounts for Absolute Header */
        .main-content {
            min-height: 100vh;
        }

        /* Slider content area padding adjustment */
        .home-slider-area .slider-content-area {
            padding-top: 160px;
        }

        @media (max-width: 992px) {
            .home-slider-area .slider-content-area {
                padding-top: 130px;
            }
        }
        .phpdebugbar-restore-btn{
            display: none;
        }
/* Floating WhatsApp Button */
.whatsapp-btn{
    position: fixed;
    bottom: 100px;
    right: 30px;
    width: 30px;
    height: 30px;
    background: green;
    color: #fff;
    border-radius: 50%;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    font-size:16px;
    z-index:9999;
    box-shadow:0 10px 25px rgba(0,0,0,.25);
    transition:.3s;
}

.whatsapp-btn:hover{
    background:#C9A96E;
    color:#fff;
    transform:scale(1.1);
}

.whatsapp-btn i{
    line-height:1;
}
        /* Scroll Top Button */
        .scroll-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 30px;
            height: 30px;
            background: #C9A96E;
            color: #000000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            z-index: 1040;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
.scroll-to-top i{
    font-size: 14px !important;
    color: white;
}
        .scroll-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .scroll-to-top:hover {
            background: #ad8b4c;
            transform: translateY(-4px);
            color: #ffffff;
        }
   </style>


</head>
<body>

<div class="wrapper home-default-wrapper">
@include('layouts.inc.frontend.navbar-style-2')
    <main class="main-content">
        @yield('content')
    </main>

 @include('layouts.inc.frontend.footer')
 <a
    href="https://wa.me/971508505260?text=Hello%20DEMANTO,%20I%20would%20like%20to%20know%20more%20about%20your%20collections."
    class="whatsapp-btn"
    target="_blank"
>
    <i class="fab fa-whatsapp"></i>
</a>

    <!-- Scroll Top Button -->
    <div id="scroll-to-top" class="scroll-to-top">
        <i class="fa fa-angle-up fs-4"></i>
    </div>
</div>

<!-- Scripts -->
{{-- <script src="{{ asset('assets/js/modernizr.js') }}"></script> --}}
<script src="{{ asset('assets/js/jquery-main.js') }}"></script>
{{-- <script src="{{ asset('assets/js/jquery-migrate.js') }}"></script> --}}
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/jquery.appear.js') }}"></script> --}}
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/fancybox.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/slicknav.js') }}"></script>
{{-- <script src="{{ asset('assets/js/waypoints.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/owlcarousel.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/jquery-match-height.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/jquery-zoom.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/countdown.js') }}"></script> --}}
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    // Scroll to Top Button
    const scrollBtn = document.getElementById('scroll-to-top');
    if (scrollBtn) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 400) {
                scrollBtn.classList.add('show');
            } else {
                scrollBtn.classList.remove('show');
            }
        });
        
        scrollBtn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Livewire Alertify Events
    window.addEventListener('message', event => {
        if (event.detail && event.detail.text) {
            alertify.set('notifier', 'position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type || 'success');
        }
    });
</script>

@yield('script')
@livewireScripts
@stack('scripts')

</body>
</html>