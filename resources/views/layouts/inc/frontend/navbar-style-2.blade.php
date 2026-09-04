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
                            
                            <div class="header-navigation-area hidden-md-down">
                      <ul class="main-menu nav position-relative boutique-nav ul-header-nav align-items-center">

    <li>
        <a href="{{ url('/') }}">Home</a>
    </li>

    <li>
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
        <a href="{{ url('contactus') }}">Contact Us</a>
    </li>

</ul>
                            </div>
                        </div>

<div class="align-right d-flex align-items-center gap-3">

<div class="desktop-social d-flex align-items-center">

    {{-- Instagram --}}
    @if($appSetting->instagram)
        <a href="{{ $appSetting->instagram }}"
           target="_blank"
           rel="noopener noreferrer"
           class="desktop-social-icon"
           aria-label="Instagram">

            <i class="fab fa-instagram"></i>

        </a>
    @endif


    {{-- Snapchat --}}
    @if($appSetting->youtube)
        <a href="{{ $appSetting->youtube }}"
           target="_blank"
           rel="noopener noreferrer"
           class="desktop-social-icon"
           aria-label="Snapchat">

            <i class="fa-brands fa-snapchat"></i>

        </a>
    @endif


    {{-- TikTok --}}
    @if($appSetting->tiktok)
        <a href="{{ $appSetting->tiktok }}"
           target="_blank"
           rel="noopener noreferrer"
           class="desktop-social-icon"
           aria-label="TikTok">

            <i class="fab fa-tiktok"></i>

        </a>
    @endif


    {{-- Facebook --}}
    @if($appSetting->facebook)
        <a href="{{ $appSetting->facebook }}"
           target="_blank"
           rel="noopener noreferrer"
           class="desktop-social-icon"
           aria-label="Facebook">

            <i class="fab fa-facebook-f"></i>

        </a>
    @endif

</div>

@guest

{{-- <div class="header-user-icon">

    <a href="{{ url('login') }}" title="Login">

        <i class="far fa-user"></i>

    </a>

</div> --}}

@else

    {{-- <div class="dropdown-wrapper">

        <a class="dropdown-btn profile-trigger" href="#">
            {{ Auth::user()->name }}
            <i class="ion-ios-arrow-down ms-1"></i>
        </a>

        <ul class="dropdown-content-menu">

            @if(auth()->user()->role_as == '1')
                <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            @else
                <li><a href="{{ url('account') }}">My Account</a></li>
            @endif

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">

                    Logout

                </a>

                <form id="logout-form"
                      action="{{ route('logout') }}"
                      method="POST"
                      class="d-none">

                    @csrf

                </form>

            </li>

        </ul>

    </div> --}}

    @endguest

    <div class="theme-currency">

        <a href="#">USD $</a>

    </div>

    <div class="header-action-area">

        <div class="shop-button-item position-relative parent-cart-hover">

            <a class="shop-button cart-toggle" href="javascript:void(0)">

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

    

       
        <li>
                <a href="{{ url('/') }}">Home</a>
            </li>
                    <li>
                <a href="{{ url('/aboutus') }}">About Us</a>
            </li>
            {{-- Collections --}}
            <li class="has-mobile-dropdown">

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
                <a href="{{ url('contactus') }}">Contact Us</a>
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
<style>

/* ============================================================
   DEMANTO HEADER — BLACK LUXURY GRADIENT DESIGN
============================================================ */




/* ============================================================
   MAIN HEADER
============================================================ */

.header-area.header-default {
    position: absolute;

    top: 0;
    left: 0;

    width: 100%;

    z-index: 1050;

    background: white;
}


/* ============================================================
   DESKTOP HEADER
============================================================ */

.header-bottom {
    position: relative;

    width: 100%;

    min-height: var(--desktop-header-height);

    display: flex;

    align-items: center;

    background: white;

    transition:
        background 0.35s ease,
        box-shadow 0.35s ease,
        backdrop-filter 0.35s ease;
}
.header-bottom:not(.sticky-on)::before {
    display: none !important;
}

/*
|--------------------------------------------------------------------------
| BLACK LUXURY GRADIENT
|--------------------------------------------------------------------------
|
| Strong black behind navbar.
| Gradually disappears into the hero image.
|
*/



.header-bottom > .container {
    position: relative;

    z-index: 2;

    width: 100%;
}


.header-align {
    width: 100%;

    min-height: var(--desktop-header-height);
}


.align-left,
.align-right {
    position: relative;

    z-index: 3;
}


.align-left {
    min-width: 0;
}


.align-right {
    flex-shrink: 0;
}


/* ============================================================
   DESKTOP STICKY HEADER
============================================================ */

.header-bottom.sticky-on {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    animation: demantoHeaderSlideDown 0.4s ease forwards;
    z-index: 1060;

    /* White sticky navbar */
    background: #FFFFFF !important;

    /* Optional subtle shadow */
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
}

.header-bottom.sticky-on::before {
    display: none;
}


@keyframes demantoHeaderSlideDown {

    from {
        transform: translateY(-100%);
    }

    to {
        transform: translateY(0);
    }

}


/* ============================================================
   LOGO
============================================================ */

.header-logo-area {
    position: relative;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-shrink: 0;

    padding: 7px 10px;

    isolation: isolate;
}


.boutique-logo,
.logo-main {
    position: relative;

    z-index: 2;

    display: block;

    width: auto;

    height: auto;

    transition:
        transform 0.35s ease;
}


/*
|--------------------------------------------------------------------------
| SUBTLE GOLD GLOW BEHIND LOGO
|--------------------------------------------------------------------------
*/

.header-logo-area::before {
    content: "";

    position: absolute;

    top: 50%;
    left: 50%;

    width: 135px;
    height: 75px;

    transform:
        translate(-50%, -50%);

    pointer-events: none;

    z-index: -1;
}


@media (min-width: 992px) {

    .header-bottom .logo-main {
        max-width: 60px !important;
    }


    .header-bottom .logo-main:hover {
        transform:
            scale(1.03);
    }

}


/* ============================================================
   DESKTOP NAVIGATION
============================================================ */

.header-navigation-area {
    display: flex;

    align-items: center;

    min-width: 0;
}


.boutique-nav {
    display: flex;

    align-items: center;

    gap: 2px;

    padding: 0;

    margin: 0;

    list-style: none;
}


.boutique-nav > li {
    position: relative;

    padding:
        0 5px;
}


.boutique-nav > li > a {
    position: relative;

    display: inline-flex;

    align-items: center;

    padding:
        6px 0px !important;

    font-family:
        "Cormorant Garamond",
        serif !important;

    font-size:
        15px !important;

    font-weight:
        600 !important;

    line-height:
        1;

    letter-spacing:
        0.65px;

    text-transform:
        uppercase;

    text-decoration:
        none;

    white-space:
        nowrap;

    /*
     * Ivory white gives better contrast
     * against black gradient.
     */

    color:
        #000 !important;

    transition:
        color 0.3s ease;
}


.boutique-nav > li > a::after {
    content: "";

    position: absolute;

    left: 50%;

    bottom: 0;

    width: 0;

    height: 1px;

    transform:
        translateX(-50%);

    background:
        var(--demanto-red-light);

    transition:
        width 0.3s ease;
}


.boutique-nav > li > a:hover {
    color:
        var(--demanto-red-light) !important;
}


.boutique-nav > li > a:hover::after {
    width:
        62%;
}


/* ============================================================
   DESKTOP DROPDOWNS
============================================================ */

.has-dropdown {
    position: relative;
}


.has-dropdown > a i {
    display: inline-block;

    margin-left: 5px;

    font-size: 12px;

    transition:
        transform 0.3s ease;
}


.has-dropdown:hover > a i {
    transform:
        rotate(180deg);
}


.boutique-dropdown {
    position: absolute;

    top:
        calc(100% + 15px);

    left: 50%;

    min-width:
        230px;

    padding:
        8px 0;

    margin:
        0;

    list-style:
        none;

    text-align:
        left;

    background:
        rgba(255, 255, 255, 0.99);

    border:
        1px solid rgba(197, 161, 90, 0.22);

    border-radius:
        6px;

    box-shadow:
        0 18px 45px rgba(0, 0, 0, 0.18);

    opacity:
        0;

    visibility:
        hidden;

    transform:
        translateX(-50%)
        translateY(10px);

    transition:
        opacity 0.3s ease,
        visibility 0.3s ease,
        transform 0.3s ease;

    z-index:
        1080;
}


.boutique-dropdown::after {
    content: "";

    position: absolute;

    top: -18px;

    left: 0;
    right: 0;

    height: 18px;
}


.boutique-dropdown::before {
    content: "";

    position: absolute;

    top: -7px;

    left: 50%;

    width: 14px;
    height: 14px;

    transform:
        translateX(-50%)
        rotate(45deg);

    background:
        #FFFFFF;

    border-top:
        1px solid rgba(197, 161, 90, 0.22);

    border-left:
        1px solid rgba(197, 161, 90, 0.22);
}


@media (min-width: 992px) {

    .has-dropdown:hover > .boutique-dropdown {
        opacity: 1;

        visibility: visible;

        transform:
            translateX(-50%)
            translateY(0);
    }

}


.boutique-dropdown > li {
    position: relative;

    display: block;

    width: 100%;

    margin: 0;

    padding: 0;
}


.boutique-dropdown > li:not(:last-child)::after {
    content: "";

    position: absolute;

    left: 20px;

    right: 20px;

    bottom: 0;

    height: 1px;

    background:
        rgba(197, 161, 90, 0.10);
}


.boutique-dropdown > li > a {
    position: relative;

    display: block;

    width: 100%;

    padding:
        11px 24px !important;

    font-family:
        "Cormorant Garamond",
        serif !important;

    font-size:
        14px !important;

    font-weight:
        600 !important;

    line-height:
        1.3;

    letter-spacing:
        0.7px;

    text-transform:
        uppercase;

    text-decoration:
        none;

    color:
        var(--demanto-dark) !important;

    text-shadow:
        none !important;

    transition:
        color 0.25s ease,
        background 0.25s ease,
        padding-left 0.25s ease;
}


.boutique-dropdown > li > a::after {
    display:
        none !important;
}


.boutique-dropdown > li > a::before {
    content:
        "→";

    position:
        absolute;

    left:
        14px;

    opacity:
        0;

    color:
        var(--demanto-red);

    transition:
        opacity 0.25s ease,
        left 0.25s ease;
}


.boutique-dropdown > li > a:hover {
    padding-left:
        35px !important;

    color:
        var(--demanto-red) !important;

    background:
        rgba(197, 161, 90, 0.06);
}


.boutique-dropdown > li > a:hover::before {
    left:
        20px;

    opacity:
        1;
}


/* ============================================================
   DESKTOP RIGHT SIDE ICONS
============================================================ */

.desktop-social {
    display: flex;

    align-items: center;

    gap: 14px;
}


.desktop-social-icon,
.theme-currency > a,
.header-action-area a,
.target-cart-icon {

    color:
        #000 !important;

    text-decoration:
        none;

    font-size:
        15px;
    transition:
        color 0.3s ease;
}




/* ============================================================
   STICKY HEADER COLORS
============================================================ */

.header-bottom.sticky-on
.boutique-nav > li > a {

    color:
        var(--demanto-dark) !important;

    text-shadow:
        none;
}


.header-bottom.sticky-on
.boutique-nav > li > a::after {

    background:
        var(--demanto-red);
}

/* ============================================================
   DEMANTO MEGA MENU
============================================================ */

.mega-menu-parent {
    position: static !important;
}


/* ------------------------------------------------------------
   MEGA MENU
------------------------------------------------------------ */

.mega-menu {
    position: absolute;

    top: 100%;
    left: 0;

    width: 100%;

    padding: 38px 0 42px;

    margin: 0;

    background: rgba(255, 255, 255, 0.98);

    border-top: 1px solid rgba(197, 161, 90, 0.20);

    border-bottom: 1px solid rgba(197, 161, 90, 0.18);

    box-shadow:
        0 18px 45px rgba(0, 0, 0, 0.15);

    opacity: 0;
    visibility: hidden;

    transform: translateY(12px);

    transition:
        opacity 0.28s ease,
        visibility 0.28s ease,
        transform 0.28s ease;

    z-index: 1080;

    text-align: left;
}


/* ------------------------------------------------------------
   OPEN ON HOVER
------------------------------------------------------------ */

@media (min-width: 992px) {

    .mega-menu-parent:hover > .mega-menu {

        opacity: 1;

        visibility: visible;

        transform: translateY(0);

    }

}


/* ------------------------------------------------------------
   HOVER BRIDGE
   Prevents menu from closing while moving mouse down
------------------------------------------------------------ */

.mega-menu-parent::after {

    content: "";

    position: absolute;

    left: 0;
    right: 0;

    top: 100%;

    height: 18px;

    background: transparent;

    z-index: 1079;

}


/* ------------------------------------------------------------
   INTRO / LEFT SIDE
------------------------------------------------------------ */

.mega-menu-intro {

    padding: 4px 35px 8px 0;

    min-height: 145px;

    border-right:
        1px solid rgba(197, 161, 90, 0.20);
}


.mega-menu-eyebrow {

    display: block;

    margin-bottom: 8px;

    font-family:
        "Montserrat",
        sans-serif;

    font-size: 9px;

    font-weight: 600;

    letter-spacing: 2px;

    text-transform: uppercase;

    color:
        var(--demanto-red);

}


.mega-menu-intro h4 {

    margin: 0 0 10px;

    font-family:
        "Cormorant Garamond",
        serif;

    font-size: 18px;

    font-weight: 700;

    letter-spacing: 0.5px;

    text-transform: uppercase;

    color:
        var(--demanto-dark);

}


.mega-menu-intro p {

    max-width: 230px;

    margin: 0;

    font-family:
        "Montserrat",
        sans-serif;

    font-size: 11px;

    font-weight: 400;

    line-height: 1.7;

    letter-spacing: 0.4px;

    color:
        var(--demanto-muted);

}


/* ------------------------------------------------------------
   CATEGORY LINKS
------------------------------------------------------------ */

.mega-category-link {

    position: relative;

    display: flex;

    align-items: center;

    justify-content: space-between;

    width: 100%;

    min-height: 55px;

    padding: 10px 15px;

    margin-bottom: 8px;

    border-bottom:
        1px solid rgba(197, 161, 90, 0.14);

    font-family:
        "Cormorant Garamond",
        serif !important;

    font-size: 15px !important;

    font-weight: 600 !important;

    letter-spacing: 0.5px;

    text-transform: uppercase;

    text-decoration: none;

    color:
        var(--demanto-dark) !important;

    text-shadow: none !important;

    transition:
        color 0.25s ease,
        background 0.25s ease,
        padding-left 0.25s ease;

}


/* Arrow */

.mega-category-link i {

    font-size: 13px;

    color:
        var(--demanto-muted);

    opacity: 0.65;

    transition:
        transform 0.25s ease,
        color 0.25s ease;

}


/* Hover */

.mega-category-link:hover {

    color:
        var(--demanto-red) !important;

    background:
        rgba(197, 161, 90, 0.06);

    padding-left: 21px;

}


.mega-category-link:hover i {

    color:
        var(--demanto-red);

    opacity: 1;

    transform:
        translateX(5px);

}


/* ------------------------------------------------------------
   STICKY HEADER
------------------------------------------------------------ */

.header-bottom.sticky-on
.mega-menu {

    background:
        rgba(253, 251, 247, 0.99);

    border-top:
        1px solid rgba(197, 161, 90, 0.20);

}


/* ------------------------------------------------------------
   DESKTOP ONLY
------------------------------------------------------------ */

@media (max-width: 991px) {

    .mega-menu {

        display: none !important;

    }

    .mega-menu-parent::after {

        display: none;

    }

}
.header-bottom.sticky-on
.boutique-nav > li > a:hover {

    color:
        var(--demanto-red) !important;
}


.header-bottom.sticky-on
.desktop-social-icon,

.header-bottom.sticky-on
.theme-currency > a,

.header-bottom.sticky-on
.header-action-area a,

.header-bottom.sticky-on
.target-cart-icon {

    color:
        var(--demanto-dark) !important;

    text-shadow:
        none;
}


/* ============================================================
   CART COUNT
============================================================ */

.shop-button-item {
    position:
        relative;
}


.shop-count {
    position:
        absolute;

    top:
        -10px;

    right:
        -12px;

    min-width:
        18px;

    width:
        18px;

    height:
        18px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    padding:
        0;

    border:
        1px solid rgba(255, 255, 255, 0.65);

    border-radius:
        50%;

    background:
        var(--demanto-red);

    color:
        #FFFFFF !important;

    font-family:
        "Montserrat",
        sans-serif;

    font-size:
        10px !important;

    font-weight:
        700;

    line-height:
        1;

    text-shadow:
        none;

    box-shadow:
        0 3px 10px rgba(0, 0, 0, 0.22);

    z-index:
        20;
}


/* ============================================================
   MINI CART
============================================================ */

.parent-cart-hover {
    position:
        relative;
}


.popup-cart-content {
    position:
        absolute;

    top:
        calc(100% + 18px);

    right:
        0;

    width:
        320px;

    padding:
        16px;

    background:
        #FFFFFF;

    border:
        1px solid rgba(197, 161, 90, 0.18);

    border-radius:
        6px;

    box-shadow:
        0 20px 45px rgba(0, 0, 0, 0.14);

    opacity:
        0;

    visibility:
        hidden;

    transform:
        translateY(10px);

    transition:
        opacity 0.3s ease,
        visibility 0.3s ease,
        transform 0.3s ease;

    z-index:
        1090;
}


.parent-cart-hover:hover
.popup-cart-content,

.popup-cart-content.show {

    opacity:
        1;

    visibility:
        visible;

    transform:
        translateY(0);
}


/* ============================================================
   MOBILE HEADER
============================================================ */

.responsive-header {
    position: relative;

    width: 100%;

    min-height:
        var(--mobile-header-height);

    display:
        flex;

    align-items:
        center;

    /*
     * Same black luxury gradient on mobile.
     */

    background:white;
    border-bottom:
        1px solid rgba(197, 161, 90, 0.20) !important;

    backdrop-filter:
        blur(5px);

    -webkit-backdrop-filter:
        blur(5px);

    transition:
        var(--header-transition);
}


.responsive-header .row {
    min-height:
        var(--mobile-header-height);
}


.responsive-header .header-item {
    display:
        flex;

    align-items:
        center;
}


.responsive-header .logo-main {
    max-width:
        60px !important;
}


/* ============================================================
   MOBILE ICONS
============================================================ */

.target-mobile-toggle,
.target-mobile-cart-icon,
.mobile-social-icon {

    color:
        #000 !important;

    text-decoration:
        none;


    transition:
        color 0.3s ease;
}


.target-mobile-toggle,
.target-mobile-cart-icon {

    font-size:
        20px;
}


.mobile-social-icon {
    width:
        28px;

    height:
        34px;

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    margin:
        0 !important;

    padding:
        0;

    font-size:
        14px;
}


.mobile-social-icon:hover {
    color:
        var(--demanto-red-light) !important;
}


/* ============================================================
   MOBILE RIGHT AREA
============================================================ */

.boutique-icon-small {
    width:
        100%;

    display:
        flex;

    align-items:
        center;

    justify-content:
        flex-end;

    gap:
        2px;
}


.btn-cart {
    flex-shrink:
        0;

    margin:
        0 0 0 2px;

    padding:
        4px 5px;

    line-height:
        1;
}


.responsive-header
.btn-cart
.shop-count {

    top:
        -6px;

    right:
        -7px;
}


/* ============================================================
   MOBILE STICKY HEADER
============================================================ */

@media (max-width: 991px) {

    .header-navigation-area {
        display:
            none !important;
    }


    .header-area.header-sticky-active
    .responsive-header {

        position:
            fixed;

        top:
            0;

        left:
            0;

        width:
            100%;

        background:
            rgba(253, 251, 247, 0.97) !important;

        border-bottom:
            1px solid rgba(197, 161, 90, 0.15) !important;

        backdrop-filter:
            blur(14px);

        -webkit-backdrop-filter:
            blur(14px);

        box-shadow:
            0 4px 18px rgba(0, 0, 0, 0.08);

        z-index:
            1060;
    }


    .header-area.header-sticky-active
    .target-mobile-toggle,

    .header-area.header-sticky-active
    .target-mobile-cart-icon,

    .header-area.header-sticky-active
    .mobile-social-icon {

        color:
            var(--demanto-dark) !important;

        text-shadow:
            none;
    }

}


/* ============================================================
   OFF-CANVAS SIDEBAR
============================================================ */

.off-canvas-wrapper {
    position:
        fixed;

    top:
        0;

    left:
        -330px;

    width:
        min(320px, 88vw);

    height:
        100%;

    z-index:
        2050;

    transition:
        left 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}


.off-canvas-wrapper.active {
    left:
        0;
}


.off-canvas-inner {
    position:
        relative;

    width:
        100%;

    height:
        100%;

    display:
        flex;

    flex-direction:
        column;

    overflow:
        hidden;

    background:
        #FFFFFF;

    box-shadow:
        25px 0 50px rgba(0, 0, 0, 0.16);

    z-index:
        2060;
}


/* ============================================================
   SIDEBAR OVERLAY
============================================================ */

.off-canvas-overlay {
    position:
        fixed;

    inset:
        0;

    background:
        rgba(0, 0, 0, 0.48);

    backdrop-filter:
        blur(2px);

    -webkit-backdrop-filter:
        blur(2px);

    opacity:
        0;

    visibility:
        hidden;

    transition:
        opacity 0.35s ease,
        visibility 0.35s ease;

    z-index:
        2040;
}


.off-canvas-overlay.active {
    opacity:
        1;

    visibility:
        visible;
}


/* ============================================================
   SIDEBAR HEADER
============================================================ */

.off-canvas-header {
    flex-shrink:
        0;

    min-height:
        90px;

    padding:
        18px 22px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        space-between;

    border-bottom:
        1px solid rgba(197, 161, 90, 0.18);

    background:
        var(--demanto-cream);
}


.off-canvas-header
.logo-main {

    max-width:
        70px !important;
}


.btn-menu-close {
    width:
        38px;

    height:
        38px;

    padding:
        0;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border:
        1px solid rgba(197, 161, 90, 0.25);

    border-radius:
        50%;

    background:
        transparent;

    color:
        var(--demanto-dark);

    cursor:
        pointer;

    transition:
        var(--header-transition);
}


.btn-menu-close:hover {
    border-color:
        var(--demanto-red);

    background:
        var(--demanto-red);

    color:
        #FFFFFF;
}


/* ============================================================
   MOBILE MENU
============================================================ */

.mobile-main-nav {
    flex:
        1 1 auto;

    min-height:
        0;

    margin:
        0;

    padding:
        8px 0;

    overflow-y:
        auto;

    list-style:
        none;

    background:
        #FFFFFF;
}


.mobile-main-nav > li {
    border-bottom:
        1px solid rgba(197, 161, 90, 0.10);
}


.mobile-main-nav > li > a {
    display:
        block;

    padding:
        15px 24px;

    font-family:
        "Cormorant Garamond",
        serif;

    font-size:
        15px;

    font-weight:
        700;

    line-height:
        1.4;

    letter-spacing:
        0.8px;

    text-transform:
        uppercase;

    text-decoration:
        none;

    color:
        var(--demanto-dark);

    transition:
        color 0.25s ease,
        background 0.25s ease;
}


.mobile-main-nav > li > a:hover {
    color:
        var(--demanto-red);

    background:
        rgba(197, 161, 90, 0.04);
}


/* ============================================================
   MOBILE SUBMENUS
============================================================ */

.mobile-sub-categories {
    display:
        none;

    margin:
        0;

    padding:
        5px 0 12px 38px;

    overflow:
        hidden;

    list-style:
        none;

    background:
        #FAF8F4;

    border-top:
        1px solid rgba(197, 161, 90, 0.10);
}


.mobile-sub-categories > li > a {
    display:
        block;

    padding:
        9px 18px 9px 0;

    font-family:
        "Montserrat",
        sans-serif;

    font-size:
        12px;

    font-weight:
        500;

    letter-spacing:
        0.65px;

    text-transform:
        uppercase;

    text-decoration:
        none;

    color:
        var(--demanto-muted);

    transition:
        color 0.25s ease;
}


.mobile-sub-categories > li > a:hover {
    color:
        var(--demanto-red);
}


.has-mobile-dropdown
.ion-ios-arrow-down {

    transition:
        transform 0.3s ease;
}


.has-mobile-dropdown.active
.ion-ios-arrow-down {

    transform:
        rotate(180deg);
}


/* ============================================================
   SIDEBAR FOOTER
============================================================ */

.mobile-sidebar-footer {
    flex-shrink:
        0;

    max-height:
        42vh;

    margin:
        0;

    padding:
        20px 24px 26px;

    overflow-y:
        auto;

    background:
        var(--demanto-cream);

    border-top:
        1px solid rgba(197, 161, 90, 0.18);
}


.mobile-sidebar-footer > a,
.mobile-sidebar-footer
.sidebar-location {

    display:
        flex;

    align-items:
        center;

    gap:
        11px;

    margin-bottom:
        12px;

    color:
        var(--demanto-dark);

    font-size:
        13px;

    line-height:
        1.5;

    text-decoration:
        none;
}


.mobile-sidebar-footer i {
    flex:
        0 0 18px;

    width:
        18px;

    text-align:
        center;

    color:
        var(--demanto-red);
}


/* ============================================================
   SIDEBAR SOCIAL ICONS
============================================================ */

.sidebar-social {
    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    gap:
        12px;

    margin-top:
        18px;
}


.sidebar-social a {
    visibility: hidden;
    width:
        38px;

    height:
        38px;

    margin:
        0;

    padding:
        0;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border:
        1px solid rgba(197, 161, 90, 0.30);

    border-radius:
        50%;

    background:
        transparent;

    color:
        var(--demanto-dark);

    text-decoration:
        none;

    transition:
        var(--header-transition);
}


.sidebar-social a:hover {
    border-color:
        var(--demanto-red);

    background:
        var(--demanto-red);

    color:
        #FFFFFF;
}


.sidebar-social a i {
    width:
        auto;

    color:
        inherit;
}


/* ============================================================
   TABLET / SMALL DESKTOP
============================================================ */

@media (min-width: 992px) and (max-width: 1199px) {

    .header-bottom .container {
        max-width:
            100%;

        padding-left:
            18px !important;

        padding-right:
            18px !important;
    }


    .align-left {
        gap:
            16px !important;
    }


    .boutique-nav > li {
        padding:
            0 2px;
    }


    .boutique-nav > li > a {
        padding:
            8px 7px !important;

        font-size:
            15px !important;

        letter-spacing:
            0.3px;
    }


    .desktop-social {
        gap:
            10px;
    }


    .align-right {
        gap:
            10px !important;
    }

}


/* ============================================================
   MOBILE <= 767PX
============================================================ */

@media (max-width: 767px) {

    .responsive-header
    .container {

        max-width:
            100%;

        padding-left:
            14px !important;

        padding-right:
            14px !important;
    }


    .responsive-header
    .logo-main {

        max-width:
            60px !important;
    }


    .mobile-social-icon {
        width:
            27px;

        font-size:
            14px;
    }


    .target-mobile-toggle,
    .target-mobile-cart-icon {

        font-size:
            20px;
    }

}


/* ============================================================
   SMALL MOBILE <= 575PX
============================================================ */

@media (max-width: 575px) {

    :root {
        --mobile-header-height:
            80px;
    }


    .responsive-header
    .container {

        padding-left:
            10px !important;

        padding-right:
            10px !important;
    }


    .responsive-header
    .logo-main {

        max-width:
            60px !important;
    }


    .mobile-social-icon {
        width:
            24px;

        height:
            32px;

        font-size:
            13px;
    }


    .boutique-icon-small {
        gap:
            1px;
    }


    .target-mobile-toggle {
        font-size:
            20px;
    }


    .target-mobile-cart-icon {
        font-size:
            19px;
    }


    .btn-cart {
        margin-left:
            1px;

        padding:
            3px;
    }


    .responsive-header
    .btn-cart
    .shop-count {

        top:
            -7px;

        right:
            -8px;

        width:
            17px;

        min-width:
            17px;

        height:
            17px;

        font-size:
            9px !important;
    }


    .off-canvas-wrapper {
        width:
            min(300px, 88vw);
    }


    .mobile-sidebar-footer {
        max-height:
            38vh;
    }

}


/* ============================================================
   VERY SMALL MOBILE <= 400PX
============================================================ */

@media (max-width: 400px) {

    .responsive-header
    .container {

        padding-left:
            8px !important;

        padding-right:
            8px !important;
    }


    .responsive-header
    .logo-main {

        max-width:
            60px !important;
    }


    .mobile-social-icon {
        width:
            21px;

        font-size:
            12px;
    }


    .boutique-icon-small {
        gap:
            0;
    }


    .target-mobile-toggle {
        font-size:
            19px;
    }


    .target-mobile-cart-icon {
        font-size:
            18px;
    }


    .btn-cart {
        margin-left:
            0;

        padding:
            2px;
    }

}


/* ============================================================
   ACCESSIBILITY
============================================================ */

.boutique-nav a:focus-visible,
.desktop-social-icon:focus-visible,
.mobile-social-icon:focus-visible,
.btn-menu-close:focus-visible,
.mobile-main-nav a:focus-visible,
.sidebar-social a:focus-visible {

    outline:
        2px solid var(--demanto-red);

    outline-offset:
        3px;
}


/* ============================================================
   REDUCED MOTION
============================================================ */

@media (prefers-reduced-motion: reduce) {

    .header-bottom,
    .boutique-nav a,
    .boutique-dropdown,
    .has-dropdown i,
    .off-canvas-wrapper,
    .off-canvas-overlay,
    .mobile-social-icon,
    .desktop-social-icon,
    .shop-count {

        transition:
            none !important;

        animation:
            none !important;
    }

}
/* ============================================================
   DESKTOP NAVBAR HOVER -> SAME DESIGN AS STICKY NAVBAR
   ADD THIS AT THE VERY END OF YOUR CURRENT CSS
============================================================ */

@media (min-width: 992px) {

    /* --------------------------------------------------------
       1. SMOOTH TRANSITION FOR THE WHOLE NAVBAR
    -------------------------------------------------------- */

    .header-bottom {
        transition:
            background 0.35s ease,
            background-color 0.35s ease,
            box-shadow 0.35s ease,
            backdrop-filter 0.35s ease,
            -webkit-backdrop-filter 0.35s ease;
    }


    /* --------------------------------------------------------
       2. GRADIENT PSEUDO ELEMENT TRANSITION
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on)::before {
        opacity: 1;

        transition:
            opacity 0.35s ease;
    }


    /* --------------------------------------------------------
       3. WHEN MOUSE ENTERS THE NAVBAR
       MAKE IT LOOK EXACTLY LIKE STICKY NAVBAR
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover,
    .header-bottom:not(.sticky-on):focus-within {

        background:
            rgba(253, 251, 247, 0.97) !important;

        backdrop-filter:
            blur(14px);

        -webkit-backdrop-filter:
            blur(14px);

        box-shadow:
            0 5px 25px rgba(0, 0, 0, 0.08);
    }


    /* --------------------------------------------------------
       4. REMOVE BLACK GRADIENT WHILE NAVBAR IS HOVERED
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover::before,
    .header-bottom:not(.sticky-on):focus-within::before {

        opacity: 0;
    }


    /* --------------------------------------------------------
       5. MENU LINKS BECOME DARK
       SAME AS STICKY NAVBAR
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .boutique-nav > li > a,

    .header-bottom:not(.sticky-on):focus-within
    .boutique-nav > li > a {

        color:#000;

        text-shadow:
            none !important;
    }


    /* --------------------------------------------------------
       6. MENU LINK UNDERLINE BECOMES GOLD
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .boutique-nav > li > a::after,

    .header-bottom:not(.sticky-on):focus-within
    .boutique-nav > li > a::after {

        background:
            var(--demanto-red);
    }


    /* --------------------------------------------------------
       7. INDIVIDUAL MENU LINK HOVER
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .boutique-nav > li > a:hover,

    .header-bottom:not(.sticky-on):focus-within
    .boutique-nav > li > a:hover {

        color:
            var(--demanto-red) !important;
    }


    /* --------------------------------------------------------
       8. SOCIAL ICONS BECOME DARK
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .desktop-social-icon,

    .header-bottom:not(.sticky-on):focus-within
    .desktop-social-icon {

        color:
            var(--demanto-dark) !important;

        text-shadow:
            none !important;
    }


    /* --------------------------------------------------------
       9. SOCIAL ICON HOVER BECOMES GOLD
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .desktop-social-icon:hover,

    .header-bottom:not(.sticky-on):focus-within
    .desktop-social-icon:hover {

        color:
            var(--demanto-red) !important;
    }


    /* --------------------------------------------------------
       10. CURRENCY BECOMES DARK
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .theme-currency > a,

    .header-bottom:not(.sticky-on):focus-within
    .theme-currency > a {

        color:
            var(--demanto-dark) !important;

        text-shadow:
            none !important;
    }


    /* --------------------------------------------------------
       11. CURRENCY HOVER BECOMES GOLD
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .theme-currency > a:hover,

    .header-bottom:not(.sticky-on):focus-within
    .theme-currency > a:hover {

        color:
            var(--demanto-red) !important;
    }


    /* --------------------------------------------------------
       12. CART LINK BECOMES DARK
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .header-action-area a,

    .header-bottom:not(.sticky-on):focus-within
    .header-action-area a {

        color:
            var(--demanto-dark) !important;

        text-shadow:
            none !important;
    }


    /* --------------------------------------------------------
       13. CART ICON BECOMES DARK
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .target-cart-icon,

    .header-bottom:not(.sticky-on):focus-within
    .target-cart-icon {

        color:
            var(--demanto-dark) !important;

        text-shadow:
            none !important;
    }


    /* --------------------------------------------------------
       14. CART HOVER BECOMES GOLD
    -------------------------------------------------------- */



    /* --------------------------------------------------------
       15. KEEP CART COUNT GOLD + WHITE TEXT
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .shop-count,

    .header-bottom:not(.sticky-on):focus-within
    .shop-count {

        background:
            var(--demanto-red) !important;

        color:
            #FFFFFF !important;

        border-color:
            rgba(197, 161, 90, 0.35);
    }


    /* --------------------------------------------------------
       16. KEEP DROPDOWN WHITE
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .boutique-dropdown,

    .header-bottom:not(.sticky-on):focus-within
    .boutique-dropdown {

        background:
            rgba(255, 255, 255, 0.99);
    }


    /* --------------------------------------------------------
       17. DROPDOWN LINKS STAY DARK
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .boutique-dropdown > li > a,

    .header-bottom:not(.sticky-on):focus-within
    .boutique-dropdown > li > a {

        color:
            var(--demanto-dark) !important;

        text-shadow:
            none !important;
    }


    /* --------------------------------------------------------
       18. DROPDOWN LINK HOVER
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .boutique-dropdown > li > a:hover,

    .header-bottom:not(.sticky-on):focus-within
    .boutique-dropdown > li > a:hover {

        color:
            var(--demanto-red) !important;

        background:
            rgba(197, 161, 90, 0.06);
    }


    /* --------------------------------------------------------
       19. LOGO SHADOW IS TOO STRONG ON WHITE BACKGROUND
       REDUCE IT WHILE HOVERED
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .logo-main,

    .header-bottom:not(.sticky-on):focus-within
    .logo-main {

        filter:
            brightness(1.05)
            contrast(1.03)
            saturate(1.05)
            drop-shadow(0 2px 4px rgba(0, 0, 0, 0.12));
    }


    /* --------------------------------------------------------
       20. REMOVE LOGO BACKGROUND GLOW ON WHITE NAVBAR
    -------------------------------------------------------- */

    .header-bottom:not(.sticky-on):hover
    .header-logo-area::before,

    .header-bottom:not(.sticky-on):focus-within
    .header-logo-area::before {

        opacity: 0;
    }


    /* --------------------------------------------------------
       21. SMOOTH LOGO GLOW TRANSITION
    -------------------------------------------------------- */

    .header-logo-area::before {

        transition:
            opacity 0.35s ease;
    }

}
/*==========================================
    DEMANTO LOGO
==========================================*/

.demanto-logo{

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

    text-decoration:none;

}

.logo-since{

    margin-top:4px;

    color:#D7B06A;

    font-family:"Cormorant Garamond", serif;

    font-size:10px;

    font-weight:500;

    letter-spacing:4px;

    line-height:1;

    text-transform:uppercase;

    text-align:center;

}

.header-bottom.sticky-on .logo-since{

    color:#9A7B45;

}

.header-bottom:not(.sticky-on):hover .logo-since{

    color:#9A7B45;

}

/* Mobile */

@media(max-width:991px){

.logo-since{

    font-size:8px;

    letter-spacing:3px;

    margin-top:2px;

}

}
</style>
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
