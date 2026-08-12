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
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
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


@if(Request::is('/'))
@include('layouts.inc.frontend.navbar')
@else
@include('layouts.inc.frontend.navbar-style-2')
@endif
    <main class="main-content">

            @yield('content')
            


   
        </main>
            @include('layouts.inc.frontend.footer')
              <!--== Scroll Top Button ==-->
  <div id="scroll-to-top" class="scroll-to-top"><span class="ion-md-arrow-up"></span></div>
<aside class="off-canvas-wrapper ul-sidebar">
  <div class="off-canvas-inner">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-content">
      <div class="off-canvas-header">
        <div class="close-action">
          <button class="btn-menu-close ul-sidebar-closer">MENU <i class="icon-arrow-left"></i></button>
        </div>
      </div>

      <div class="off-canvas-item">
        <div class="custom-mobile-menu">
     <ul class="mobile-main-nav">

    <li><a href="{{ url('aboutus') }}">About</a></li>

    @foreach($menus as $menu)
        <li class="has-mobile-dropdown">

            <a href="javascript:void(0)" class="mobile-dropdown-trigger">
                {{ $menu->name }}
                <i class="ion-ios-arrow-down float-end"></i>
            </a>

            @if($menu->categories->count())
                <ul class="mobile-sub-categories" style="display:none;">

                    @foreach($menu->categories as $category)
                        <li>
                            <a href="{{ url('collections/'.$category->slug) }}">
                                {{ $category->name }}
                            </a>
                        </li>

                        {{-- SUBCATEGORIES --}}
                        @if($category->children->count())
                            <ul class="mobile-sub-categories">
                                @foreach($category->children as $child)
                                    <li style="padding-left:15px;">
                                        <a href="{{ url('collections/'.$child->slug) }}">
                                            - {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    @endforeach

                </ul>
            @endif

        </li>
    @endforeach

    <li><a href="{{ url('blogs') }}">News</a></li>
    <li><a href="{{ url('contactus') }}">Contact</a></li>

</ul>
        </div>
      </div>
    </div>
  </div>
</aside>
     
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
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
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
    document.querySelectorAll(".collection-image img").forEach(function(img){

    function imageLoaded(){

        img.classList.add("loaded");

        const wrapper = img.closest(".collection-image");

        if(wrapper){

            wrapper.classList.add("loaded");

        }

        if(window.signatureSliders){

   const slider = img.closest(".signature-slider");

if (slider && slider.swiper) {

    slider.swiper.update();

}

        }

    }

    if(img.complete && img.naturalWidth){

        imageLoaded();

    }else{

        img.addEventListener("load", imageLoaded);

        img.addEventListener("error", imageLoaded);

    }

});
</script>

@yield('script')
@livewireScripts
@stack('scripts')

</body>
</html>