<header class="header-area header-default header-style {{ request()->is('/') ? '' : 'header-white-links' }}">
 
    <div class="header-bottom sticky-header hidden-md-down to-be-sticky">
        <div class="container px-4">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="header-align align-default d-flex justify-content-between align-items-center">
                        
                        <div class="align-left d-flex align-items-center gap-4">
                <div class="header-logo-area">

    <a href="{{ url('/') }}" class="demanto-logo">

@if(!empty($appSetting?->logo))

    <img
        class="logo-main boutique-logo"
        src="{{ asset($appSetting->logo) }}"
        alt="{{ $appSetting->website_name ?? 'DEMANTO' }}">

@else

    <img
        class="logo-main boutique-logo"
        src="{{ asset('assets/img/logogold.png') }}"
        alt="{{ $appSetting->website_name ?? 'DEMANTO' }}">

@endif
    </a>

</div>
                            
                        
                        </div>
                            <div class="align-center header-navigation-area hidden-md-down">
                      <ul class="main-menu nav position-relative boutique-nav ul-header-nav align-items-center">

 <li class="{{ request()->is('/') ? 'active' : '' }}">
    <a href="{{ url('/') }}">Home</a>
</li>

<li class="{{ request()->is('aboutus') ? 'active' : '' }}">
    <a href="{{ url('/aboutus') }}">About Us</a>
</li>
    {{-- =========================================================
         COLLECTIONS MEGA MENU
    ========================================================== --}}
    <li class="has-dropdown mega-menu-parent">

        <a href="javascript:void(0)" class="mega-menu-trigger">
            Collections
            <i class="ion-ios-arrow-down ms-1"></i>
        </a>

        <div class="mega-menu">

            <div class="container">

                <div class="row align-items-start">

           


                    {{-- CATEGORIES --}}
                    <div class="col-lg-12">

                        <div class="row">

                            @foreach($collections as $category)

                                <div class="col-lg-4 col-md-6">

                                    <a
                                        href="{{ url('collections/'.$category->slug) }}"
                                        class="mega-category-link"
                                    >

                                        <span>
                                            {{ $category->name }}
                                        </span>

                                        <i class="ion-ios-arrow-forward"></i>

                                    </a>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </li>


{{-- =========================================================
     ACCESSORIES MEGA MENU
========================================================== --}}
<li class="has-dropdown mega-menu-parent">

    <a href="javascript:void(0)" class="mega-menu-trigger">
        Accessories
        <i class="ion-ios-arrow-down ms-1"></i>
    </a>

    <div class="mega-menu">

        <div class="container">

            <div class="row align-items-start">

         

                {{-- CATEGORIES --}}
                <div class="col-lg-12">

                    <div class="row">

                        @foreach($accessories as $category)

                            <div class="col-lg-4 col-md-6">

                                <a
                                    href="{{ url('collections/'.$category->slug) }}"
                                    class="mega-category-link"
                                >

                                    <span>
                                        {{ $category->name }}
                                    </span>

                                    <i class="ion-ios-arrow-forward"></i>

                                </a>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</li>

{{-- =========================================================
     ON SALE MEGA MENU
========================================================== --}}
<li class="has-dropdown mega-menu-parent">

    <a href="javascript:void(0)" class="mega-menu-trigger">
        On Sale
        <i class="ion-ios-arrow-down ms-1"></i>
    </a>

    <div class="mega-menu">

        <div class="container">

            <div class="row align-items-start">

         

                {{-- CATEGORIES --}}
                <div class="col-lg-12">

                    <div class="row">

                        @foreach($onSale as $category)

                            <div class="col-lg-4 col-md-6">

                                <a
                                    href="{{ url('collections/'.$category->slug) }}"
                                    class="mega-category-link"
                                >

                                    <span>
                                        {{ $category->name }}
                                    </span>

                                    <i class="ion-ios-arrow-forward"></i>

                                </a>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</li>

    <li>
        <a class="{{ request()->is('contactus') ? 'active' : '' }}" 
            href="{{ url('contactus') }}">Contact Us</a>
    </li>

</ul>
                            </div>

<div class="align-right d-flex align-items-center">
@if($appSetting->instagram)
    <a href="{{ $appSetting->instagram }}"
       target="_blank"
       rel="noopener noreferrer"
       class="mobile-social-icon">
        <i class="fab fa-instagram"></i>
    </a>
@endif

{{-- Snapchat --}}
@if($appSetting->youtube)
    <a href="{{ $appSetting->youtube }}"
       target="_blank"
       rel="noopener noreferrer"
       class="mobile-social-icon">
        <i class="fa-brands fa-snapchat"></i>
    </a>
@endif

{{-- TikTok --}}
@if($appSetting->tiktok)
    <a href="{{ $appSetting->tiktok }}"
       target="_blank"
       rel="noopener noreferrer"
       class="mobile-social-icon">
        <i class="fab fa-tiktok"></i>
    </a>
@endif

{{-- Facebook --}}
@if($appSetting->facebook)
    <a href="{{ $appSetting->facebook }}"
       target="_blank"
       rel="noopener noreferrer"
       class="mobile-social-icon">
        <i class="fab fa-facebook-f"></i>
    </a>
@endif
    {{-- Wishlist --}}
    <div class="header-action-area d-flex align-items-center">

        {{-- <div class="shop-button-item wishlist-button-item">
            <a class="shop-button" href="{{ url('wishlist') }}" aria-label="Wishlist">
                <div class="position-relative">
                    <i class="icon-heart icon"></i>

                    <span class="shop-count">
                        <livewire:frontend.wishlist-count />
                    </span>
                </div>
            </a>
        </div> --}}

        {{-- Cart --}}
        <div class="shop-button-item position-relative parent-cart-hover cart-button-item">

            <a class="shop-button cart-toggle"
               href="javascript:void(0)"
               aria-label="Shopping Cart">

                <div class="position-relative">
                    <i class="icon-bag icon target-cart-icon"></i>

                    <span class="shop-count">
                        <livewire:frontend.cart.cart-count />
                    </span>
                </div>

            </a>

            <div class="popup-cart-content">
                <livewire:frontend.cart.cart-items />
            </div>

        </div>

    </div>

</div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="responsive-header d-lg-none py-0 border-bottom border-light-subtle">
        <div class="container px-3">
            <div class="row align-items-center">
                <div class="col-4">
                    <div class="header-item">
                        <button class="btn-menu ul-header-sidebar-opener bg-transparent border-0 fs-4" type="button" id="mobileMenuBtn">
                            <i class="icon-menu text-white target-mobile-toggle"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div class="header-item justify-content-center">
             <div class="header-logo-area">

    <a href="{{ url('/') }}" class="demanto-logo">

   @if(!empty($appSetting?->logo))

    <img
        class="logo-main boutique-logo"
        src="{{ asset($appSetting->logo) }}"
        alt="{{ $appSetting->website_name ?? 'Beautyana' }}">

@else

    <img
        class="logo-main boutique-logo"
        src="{{ asset('assets/img/logogold.png') }}"
        alt="{{ $appSetting->website_name ?? 'DEMANTO' }}">

@endif

    </a>

</div>
                    </div>
                </div>
             <div class="col-4 text-end">

    <div class="header-item justify-content-end boutique-icon-small d-flex align-items-center justify-content-end">
{{-- Instagram --}}
@if($appSetting->instagram)
    <a href="{{ $appSetting->instagram }}"
       target="_blank"
       rel="noopener noreferrer"
       class="mobile-social-icon">
        <i class="fab fa-instagram"></i>
    </a>
@endif

{{-- Snapchat --}}
@if($appSetting->youtube)
    <a href="{{ $appSetting->youtube }}"
       target="_blank"
       rel="noopener noreferrer"
       class="mobile-social-icon">
        <i class="fa-brands fa-snapchat"></i>
    </a>
@endif

{{-- TikTok --}}
@if($appSetting->tiktok)
    <a href="{{ $appSetting->tiktok }}"
       target="_blank"
       rel="noopener noreferrer"
       class="mobile-social-icon">
        <i class="fab fa-tiktok"></i>
    </a>
@endif

{{-- Facebook --}}
@if($appSetting->facebook)
    <a href="{{ $appSetting->facebook }}"
       target="_blank"
       rel="noopener noreferrer"
       class="mobile-social-icon">
        <i class="fab fa-facebook-f"></i>
    </a>
@endif
{{-- Mobile User --}}
{{-- @guest
    <a href="{{ url('login') }}" class="mobile-user-icon me-3">
        <i class="far fa-user"></i>
    </a>
@else
    <a href="{{ auth()->user()->role_as == '1'
                ? url('admin/dashboard')
                : url('account') }}"
       class="mobile-user-icon m-2">
        <i class="far fa-user"></i>
    </a>
@endguest --}}

<button class="btn-cart bg-transparent border-0 position-relative"
        onclick="window.location.href='{{ url('cart') }}'">

            <i class="icon-bag text-white target-mobile-cart-icon"></i>

            <span class="item-count position-absolute badge rounded-circle shop-count"
                  style="font-size:15px;">

                <livewire:frontend.cart.cart-count />

            </span>

        </button>

    </div>

</div>
            </div>
        </div>
    </div>
</header>

<div class="off-canvas-wrapper" id="mobileSidebar">
    <div class="off-canvas-inner">

        {{-- Header --}}
        <div class="off-canvas-header">
            <div class="logo text-start">
                <a href="{{ url('/') }}">
         @if(!empty($appSetting?->logo))

    <img
        class="logo-main"
        src="{{ asset($appSetting->logo) }}"
        alt="{{ $appSetting->website_name ?? 'DEMANTO' }}"
        style="max-width:70px;">

@else

    <img
        class="logo-main"
        src="{{ asset('assets/img/logogold.png') }}"
        alt="{{ $appSetting->website_name ?? 'DEMANTO' }}"
        style="max-width:70px;">

@endif
                </a>
            </div>

            <button class="btn-menu-close" id="closeSidebar">
                <i class="icon-close"></i>
            </button>
        </div>

        {{-- Menu --}}
        <ul class="mobile-main-nav">

<li class="{{ request()->is('/') ? 'active' : '' }}">
    <a href="{{ url('/') }}">Home</a>
</li>

<li class="{{ request()->is('aboutus') ? 'active' : '' }}">
    <a href="{{ url('/aboutus') }}">About Us</a>
</li>
            {{-- Collections --}}
<li class="has-mobile-dropdown {{ request()->is('collections/*') && $collections->contains('slug', request()->segment(2)) ? 'active' : '' }}">

                <a href="javascript:void(0)" class="mobile-dropdown-trigger">
                    Collections
                    <i class="ion-ios-arrow-down float-end mt-1"></i>
                </a>

                <ul class="mobile-sub-categories">
                    @foreach($collections as $category)
                        <li>
                            <a href="{{ url('collections/'.$category->slug) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </li>

      {{-- Accessories --}}
<li class="has-mobile-dropdown">

    <a href="javascript:void(0)" class="mobile-dropdown-trigger">
        Accessories
        <i class="ion-ios-arrow-down float-end mt-1"></i>
    </a>

    <ul class="mobile-sub-categories">

        @foreach($accessories as $category)

            <li>
                <a href="{{ url('collections/'.$category->slug) }}">
                    {{ $category->name }}
                </a>
            </li>

        @endforeach

    </ul>

</li>

      {{-- On Sale --}}
<li class="has-mobile-dropdown">

    <a href="javascript:void(0)" class="mobile-dropdown-trigger">
        On Sale
        <i class="ion-ios-arrow-down float-end mt-1"></i>
    </a>

    <ul class="mobile-sub-categories">

        @foreach($onSale as $category)

            <li>
                <a href="{{ url('collections/'.$category->slug) }}">
                    {{ $category->name }}
                </a>
            </li>

        @endforeach

    </ul>

</li>
            <li>
                <a class="{{ request()->is('contactus') ? 'active' : '' }}" 
                    href="{{ url('contactus') }}">Contact Us</a>
            </li>

          

        </ul>

        {{-- ================= Footer ================= --}}
        <div class="mobile-sidebar-footer">

            @if($appSetting && $appSetting->phone1)
                <a href="tel:{{ $appSetting->phone1 }}">
                    <i class="fa fa-phone"></i>
                    {{ $appSetting->phone1 }}
                </a>
            @endif

            @if($appSetting && $appSetting->phone2)
                <a href="tel:{{ $appSetting->phone2 }}">
                    <i class="fa fa-phone"></i>
                    {{ $appSetting->phone2 }}
                </a>
            @endif

            @if($appSetting && $appSetting->email1)
                <a href="mailto:{{ $appSetting->email1 }}">
                    <i class="fa fa-envelope"></i>
                    {{ $appSetting->email1 }}
                </a>
            @endif

            @if($appSetting && $appSetting->email2)
                <a href="mailto:{{ $appSetting->email2 }}">
                    <i class="fa fa-envelope"></i>
                    {{ $appSetting->email2 }}
                </a>
            @endif

            @if($appSetting && $appSetting->address)
                <div class="sidebar-location">
                    <i class="fa fa-map-marker-alt"></i>
                    {{ $appSetting->address }}
                </div>
            @endif

            <div class="sidebar-social">

                @if($appSetting && $appSetting->facebook)
                    <a href="{{ $appSetting->facebook }}" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                @endif

                @if($appSetting && $appSetting->instagram)
                    <a href="{{ $appSetting->instagram }}" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                @endif

                @if($appSetting && $appSetting->youtube)
                    <a href="{{ $appSetting->youtube }}" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                @endif

            </div>

        </div>

    </div>
</div>

<div class="off-canvas-overlay" id="sidebarOverlay"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Desktop products dropdown trigger inside mobile view contexts 
        const trigger = document.querySelector('.dropdown-click-trigger');
        const menu = document.querySelector('.boutique-dropdown');

        if (trigger && menu) {
            trigger.addEventListener('click', function(e) {
                if (window.innerWidth <= 991) {
                    e.preventDefault();
                    e.stopPropagation();
                    menu.classList.toggle('is-open');
                    this.parentElement.classList.toggle('active');
                }
            });

            document.addEventListener('click', function(e) {
                if (menu && trigger && !menu.contains(e.target) && !trigger.contains(e.target)) {
                    menu.classList.remove('is-open');
                    if (trigger.parentElement) {
                        trigger.parentElement.classList.remove('active');
                    }
                }
            });
        }

        // Global Window Scroll handling for Multi-tier Sticky Navigation Layers
        const stickyHeader = document.querySelector('.sticky-header');
        const mainHeaderArea = document.querySelector('.header-area');
        
        if (stickyHeader || mainHeaderArea) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 100) {
                    if(stickyHeader) stickyHeader.classList.add('sticky-on');
                    if(mainHeaderArea) mainHeaderArea.classList.add('header-sticky-active');
                } else {
                    if(stickyHeader) stickyHeader.classList.remove('sticky-on');
                    if(mainHeaderArea) mainHeaderArea.classList.remove('header-sticky-active');
                }
            });
        }

        // Mobile Sidebar Flyout Controls
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileSidebar = document.getElementById('mobileSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openMobileSidebar() {
            if (mobileSidebar) mobileSidebar.classList.add('active');
            if (sidebarOverlay) sidebarOverlay.classList.add('active');
        }

        function closeMobileSidebarFunc() {
            if (mobileSidebar) mobileSidebar.classList.remove('active');
            if (sidebarOverlay) sidebarOverlay.classList.remove('active');
        }

        if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', openMobileSidebar);
        if (closeSidebar) closeSidebar.addEventListener('click', closeMobileSidebarFunc);
        if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeMobileSidebarFunc);

        // Accordion collapsing controls for sub-categories over responsive layers
    const mobileDropTriggers = document.querySelectorAll('.mobile-dropdown-trigger');

mobileDropTriggers.forEach(trigger => {

    trigger.addEventListener('click', function(e) {

        e.preventDefault();

        const parent = this.parentElement;
        const submenu = this.nextElementSibling;

        parent.classList.toggle('active');

        if (submenu.style.display === 'block') {
            submenu.style.display = 'none';
        } else {
            submenu.style.display = 'block';
        }

    });

});
   
        
        const cartBtn = document.querySelector('.cart-toggle');
        const cartPopup = document.querySelector('.popup-cart-content');

        if(cartBtn && cartPopup){
            cartBtn.addEventListener('click', function(e){
                e.preventDefault();
                e.stopPropagation();
                cartPopup.classList.toggle('show');
            });

            document.addEventListener('click', function(e){
                if(!cartPopup.contains(e.target) && !cartBtn.contains(e.target)){
                    cartPopup.classList.remove('show');
                }
            });
        }
    });
</script>
