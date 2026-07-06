<header class="header-area header-default header-style {{ request()->is('/') ? '' : 'header-white-links' }}">
 
    <div class="header-bottom sticky-header hidden-md-down to-be-sticky">
        <div class="container px-4">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="header-align align-default d-flex justify-content-between align-items-center">
                        
                        <div class="align-left d-flex align-items-center gap-4">
                            <div class="header-logo-area">
                                <a href="{{ url('/') }}">
                                    <img class="logo-main boutique-logo" src="{{ asset('assets/img/logogold.png') }}" alt="Logo">
                                </a>
                            </div>
                            
                            <div class="header-navigation-area hidden-md-down">
                                <ul class="main-menu nav position-relative boutique-nav ul-header-nav align-items-center">
                                    <li><a href="{{ url('/') }}">Home</a></li>
                             
                                    
                              <li class="has-dropdown">
    <a href="#">
        Collections <i class="ion-ios-arrow-down ms-1"></i>
    </a>
    <ul class="boutique-dropdown">
        @foreach($collections as $category)
            <li>
                <a href="{{ url('collections/'.$category->slug) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
</li>

<li class="has-dropdown">
    <a href="#">
        High Jewelry <i class="ion-ios-arrow-down ms-1"></i>
    </a>
    <ul class="boutique-dropdown">
        @foreach($highJewelry as $category)
            <li>
                <a href="{{ url('collections/'.$category->slug) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
</li>

<li class="has-dropdown">
    <a href="#">
        AD Signature <i class="ion-ios-arrow-down ms-1"></i>
    </a>
    <ul class="boutique-dropdown">
        @foreach($adSignature as $category)
            <li>
                <a href="{{ url('collections/'.$category->slug) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
</li>

                                    <li><a href="{{ url('blogs') }}">News</a></li>
                              
                                </ul>
                            </div>
                        </div>

<div class="align-right d-flex align-items-center gap-3">

    <div class="desktop-social d-flex align-items-center">

        @if($appSetting->instagram)
            <a href="{{ $appSetting->instagram }}"
               target="_blank"
               class="desktop-social-icon">
                <i class="fab fa-instagram"></i>
            </a>
        @endif

        @if($appSetting->facebook)
            <a href="{{ $appSetting->facebook }}"
               target="_blank"
               class="desktop-social-icon">
                <i class="fab fa-facebook-f"></i>
            </a>
        @endif

        @if($appSetting->tiktok)
            <a href="{{ $appSetting->tiktok }}"
               target="_blank"
               class="desktop-social-icon">
                <i class="fab fa-tiktok"></i>
            </a>
        @endif

        @if($appSetting->youtube)
            <a href="{{ $appSetting->youtube }}"
               target="_blank"
               class="desktop-social-icon">
                <i class="fab fa-youtube"></i>
            </a>
        @endif

    </div>

@guest

<div class="header-user-icon">

    <a href="{{ url('login') }}" title="Login">

        <i class="far fa-user"></i>

    </a>

</div>

@else

    <div class="dropdown-wrapper">

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

    </div>

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
                            <a href="{{ url('/') }}">
                                <img class="logo-main boutique-logo" src="{{ asset('assets/img/logogold.png') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                </div>
             <div class="col-4 text-end">

    <div class="header-item justify-content-end boutique-icon-small d-flex align-items-center justify-content-end">

        @if($appSetting->instagram)
            <a href="{{ $appSetting->instagram }}"
               target="_blank"
               class="mobile-social-icon me-3">

                <i class="fab fa-instagram"></i>

            </a>
        @endif

        @if($appSetting->facebook)
            <a href="{{ $appSetting->facebook }}"
               target="_blank"
               class="mobile-social-icon me-1">

                <i class="fab fa-facebook-f"></i>

            </a>
        @endif

   @if($appSetting->tiktok)
    <a href="{{ $appSetting->tiktok }}"
       target="_blank"
       class="mobile-social-icon me-3">
        <i class="fab fa-tiktok"></i>
    </a>
@endif

{{-- Mobile User --}}
@guest
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
@endguest

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
                    <img class="logo-main"
                         src="{{ asset('assets/img/logogold.png') }}"
                         alt="Logo"
                         style="max-width:70px;">
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

            {{-- High Jewelry --}}
            <li class="has-mobile-dropdown">

                <a href="javascript:void(0)" class="mobile-dropdown-trigger">
                    High Jewelry
                    <i class="ion-ios-arrow-down float-end mt-1"></i>
                </a>

                <ul class="mobile-sub-categories">
                    @foreach($highJewelry as $category)
                        <li>
                            <a href="{{ url('collections/'.$category->slug) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </li>

            {{-- AD Signature --}}
            <li class="has-mobile-dropdown">

                <a href="javascript:void(0)" class="mobile-dropdown-trigger">
                    AD Signature
                    <i class="ion-ios-arrow-down float-end mt-1"></i>
                </a>

                <ul class="mobile-sub-categories">
                    @foreach($adSignature as $category)
                        <li>
                            <a href="{{ url('collections/'.$category->slug) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </li>

            <li>
                <a href="{{ url('blogs') }}">News</a>
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
    
    /* ==========================================================================
       1. CORE STRUCTURAL LAYOUT HYDRATION & REFINED DROPDOWN LOGIC FRAMEWORK
       ========================================================================== */

    .header-area.header-default {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1050;
        background: transparent;
    }

    .header-top {
        background: rgba(0, 0, 0, 0.25) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: #fff !important;
    }

    .header-top a, 
    .header-top .account-links a,
    .header-top .dropdown-btn {
        color: #fff !important;
        font-size: 14px !important;
    }

    .header-top a:hover,
    .header-top .dropdown-btn:hover {
        color: var(--boutique-pink) !important;
    }

    .header-bottom.to-be-sticky {
        background: transparent !important;
        transition: background 0.3s ease;
    }

    /* Sticky Header Core State Overrides */
    .header-bottom.sticky-on {
        background: rgba(255, 255, 255, 0.98) !important;
        backdrop-filter: blur(10px);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        animation: headerSlideDown 0.4s ease forwards;
        z-index: 1060;
    }
/* White links for all pages except homepage */
.header-white-links .boutique-nav li a,
.header-white-links .dropdown-wrapper a,
.header-white-links .theme-currency a,
.header-white-links .header-action-area a,
.header-white-links .header-action-area .target-cart-icon {
    color: #ffffff !important;
    font-weight: 800 !important;
    font-size: 15px;
}
.header-white-links .boutique-nav li  ul li a{
color: var(--boutique-text) !important; 
}

/* On hover, keep them white with gold accent */
.header-white-links .boutique-nav li a:hover {
    color: var(--boutique-pink) !important;
}

.mobile-user-icon{
    color:#fff;
    font-size:15px;
    text-decoration:none;
    transition:.3s;
}

.mobile-user-icon:hover{
    color:var(--logo-pink-dark);
}

.header-area.header-sticky-active .mobile-user-icon{
    color:#000;
}

.header-area.header-sticky-active .mobile-user-icon:hover{
    color:var(--boutique-text);
}
/* For sticky state on non-homepage */
.header-white-links.header-sticky-active .boutique-nav li a,
.header-white-links.header-sticky-active .dropdown-wrapper a,
.header-white-links.header-sticky-active .theme-currency a,
.header-white-links.header-sticky-active .header-action-area a,
.header-white-links.header-sticky-active .header-action-area .target-cart-icon {
    color: var(--boutique-dark) !important;
}
    .header-bottom.sticky-on .main-menu li a,
    .header-bottom.sticky-on .contact-link a,
    .header-bottom.sticky-on .contact-link span,
    .header-bottom.sticky-on .target-cart-icon,
    .header-bottom.sticky-on .target-cart-total {
        color: var(--boutique-dark) !important;
    }
    
    .header-bottom.sticky-on .main-menu li a:hover {
        color: var(--boutique-pink) !important;
    }

    @keyframes headerSlideDown {
        from { transform: translateY(-100%); }
        to { transform: translateY(0); }
    }
.account-links a {
    font-size: 14px;
    font-weight: 600;
}
/* Enhanced Structural Dropdowns */
.has-dropdown {
    position: relative;
    padding: 0 8px;
}

.has-dropdown > a {
    position: relative;
    padding: 6px 10px !important;
    display: inline-block;
    transition: all 0.3s ease;
}

.has-dropdown > a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background: var(--boutique-pink);
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.has-dropdown > a:hover::after {
    width: 60%;
}

.has-dropdown i {
    display: inline-block;
    transition: transform 0.3s ease;
    font-size: 14px;
}

.has-dropdown:hover i {
    transform: rotate(180deg);
}

.boutique-dropdown {
    position: absolute;
    top: calc(100% + 12px);
    left: 50%;
    transform: translateX(-50%) translateY(10px);
    background: #ffffff;
    min-width: 220px;
    box-shadow: 0 20px 45px rgba(0,0,0,0.10);
    padding: 8px 0;
    z-index: 1080;
    border: 1px solid rgba(201, 169, 110, 0.15);
    border-radius: 8px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    text-align: left;
    list-style: none;
    margin: 0;
}

.boutique-dropdown::before {
    content: '';
    position: absolute;
    top: -7px;
    left: 50%;
    transform: translateX(-50%) rotate(45deg);
    width: 14px;
    height: 14px;
    background: #ffffff;
    border-top: 1px solid rgba(201, 169, 110, 0.15);
    border-left: 1px solid rgba(201, 169, 110, 0.15);
}

@media (min-width: 992px) {
    .has-dropdown:hover .boutique-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
    }
}

.boutique-dropdown.is-open {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
}

.boutique-dropdown li {
    display: block;
    width: 100%;
    padding: 0 !important;
    margin: 0 !important;
    position: relative;
}

.boutique-dropdown li:not(:last-child)::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 20px;
    right: 20px;
    height: 1px;
    background: rgba(201, 169, 110, 0.08);
}

.boutique-dropdown li a {
    padding: 10px 25px !important;
    color: var(--boutique-dark) !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.8px;
    display: block;
    transition: all 0.3s ease;
    border: none !important;
    text-decoration: none;
    position: relative;
}

.boutique-dropdown li a::before {
    content: '→';
    position: absolute;
    left: 15px;
    opacity: 0;
    transition: all 0.3s ease;
    color: var(--boutique-pink);
    font-size: 14px;
}

.boutique-dropdown li a:hover {
    color: var(--boutique-pink) !important;
    background: rgba(201, 169, 110, 0.05);
    padding-left: 35px !important;
}

.boutique-dropdown li a:hover::before {
    opacity: 1;
    left: 20px;
}
/* Enhanced Menu Items with Hover Line for ALL items */
.boutique-nav li {
    position: relative;
}

.boutique-nav li > a {
    position: relative;
    padding: 6px 14px !important;
    display: inline-block;
    color: var(--boutique-dark) !important;
    transition: all 0.3s ease;
    text-decoration: none;
    text-transform: uppercase !important;
}

/* Hover underline effect for ALL menu items */
.boutique-nav li > a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background: var(--boutique-pink);
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    transform: translateX(-50%);
}

.boutique-nav li > a:hover::after {
    width: 60%;
}

/* For dropdown items, keep the underline on the parent link */
.has-dropdown > a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    width: 0;
    height: 2px;
    background: var(--boutique-pink);
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    transform: translateX(-50%);
}

.has-dropdown > a:hover::after {
    width: 60%;
}

/* Dropdown arrow rotation */
.has-dropdown i {
    display: inline-block;
    transition: transform 0.3s ease;
    font-size: 14px;
}

.has-dropdown:hover i {
    transform: rotate(180deg);
}

/* Enhanced Structural Dropdowns */
.has-dropdown {
    position: relative;
    padding: 0 8px;
}

.boutique-dropdown {
    position: absolute;
    top: calc(100% + 12px);
    left: 50%;
    transform: translateX(-50%) translateY(10px);
    background: #ffffff;
    min-width: 220px;
    box-shadow: 0 20px 45px rgba(0,0,0,0.10);
    padding: 8px 0;
    z-index: 1080;
    border: 1px solid rgba(201, 169, 110, 0.15);
    border-radius: 8px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    text-align: left;
    list-style: none;
    margin: 0;
}

.boutique-dropdown::before {
    content: '';
    position: absolute;
    top: -7px;
    left: 50%;
    transform: translateX(-50%) rotate(45deg);
    width: 14px;
    height: 14px;
    background: #ffffff;
    border-top: 1px solid rgba(201, 169, 110, 0.15);
    border-left: 1px solid rgba(201, 169, 110, 0.15);
}

@media (min-width: 992px) {
    .has-dropdown:hover .boutique-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
    }
}

.boutique-dropdown.is-open {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(0);
}

.boutique-dropdown li {
    display: block;
    width: 100%;
    padding: 0 !important;
    margin: 0 !important;
    position: relative;
}

.boutique-dropdown li:not(:last-child)::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 20px;
    right: 20px;
    height: 1px;
    background: rgba(201, 169, 110, 0.08);
}

.boutique-dropdown li a {
    padding: 10px 25px !important;
    color: var(--boutique-dark) !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.8px;
    display: block;
    transition: all 0.3s ease;
    border: none !important;
    text-decoration: none;
    position: relative;
}

.boutique-dropdown li a::before {
    content: '→';
    position: absolute;
    left: 15px;
    opacity: 0;
    transition: all 0.3s ease;
    color: var(--boutique-pink);
    font-size: 14px;
}

.boutique-dropdown li a:hover {
    color: var(--boutique-pink) !important;
    background: rgba(201, 169, 110, 0.05);
    padding-left: 35px !important;
}

.boutique-dropdown li a:hover::before {
    opacity: 1;
    left: 20px;
}

/* White links for all pages except homepage - preserve hover underline */
.header-white-links .boutique-nav li > a {
    color: #ffffff !important;
}

.header-white-links .boutique-nav li > a::after {
    background: #ffffff;
}

.header-white-links .boutique-nav li > a:hover{
    color:var(--logo-pink-dark) !important;
}

.header-white-links .boutique-nav li > a:hover::after{
    background:var(--logo-pink-dark);
}

.header-white-links .boutique-nav li ul li a {
    color: var(--boutique-text);
}

.header-white-links .boutique-nav li ul li a::after {
    display: none;
}

/* For sticky state on non-homepage */
.header-white-links.header-sticky-active .boutique-nav li > a {
    color: var(--boutique-dark) !important;
}

.header-white-links.header-sticky-active .boutique-nav li > a::after {
    background: var(--boutique-pink);
}

.header-white-links.header-sticky-active .boutique-nav li > a:hover{
    color:var(--logo-pink-dark) !important;
}

.header-white-links.header-sticky-active .boutique-nav li > a:hover::after{
    background:var(--logo-pink-dark);
}

/* Sticky Header - preserve hover underline */
.header-bottom.sticky-on .boutique-nav li > a {
    color: var(--boutique-dark) !important;
}

.header-bottom.sticky-on .boutique-nav li > a::after {
    background: var(--boutique-pink);
}

.header-bottom.sticky-on .boutique-nav li > a:hover{
    color:var(--logo-pink-dark) !important;
}

.header-bottom.sticky-on .boutique-nav li > a:hover::after{
    background:var(--logo-pink-dark);
}
/* Mobile menu hover line removal */
@media (max-width: 991px) {
    .boutique-nav li > a::after {
        display: none;
    }
    
    .has-dropdown > a::after {
        display: none;
    }
}
    /* Refactored Clean Authentication Dropdown Structures */
    .dropdown-wrapper {
        position: relative;
    }
    .dropdown-content-menu {
        position: absolute;
        top: 100%;
        right: 0;
        background: #fff;
        min-width: 160px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        border: 1px solid var(--boutique-light-border);
        padding: 6px 0;
        display: none;
        z-index: 1090;
        list-style: none;
        margin: 0;
    }
    .dropdown-wrapper:hover .dropdown-content-menu {
        display: block;
    }
    .dropdown-content-menu li a {
        display: block;
        padding: 6px 18px;
        color: var(--boutique-dark) !important;
        font-size: 14px !important;
        text-transform: capitalize;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s ease;
        text-align: left;
    }
    .dropdown-content-menu li a:hover {
        background: #fafafa;
        color: var(--boutique-pink) !important;
    }

    /* ==========================================================================
       2. TYPOGRAPHIC BALANCING MATRIX LABELS & LOGO FRAMING ACCENTS
       ========================================================================== */
    .boutique-logo {
        height: auto !important;
        transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    @media (max-width: 991px) {
        .logo-main { max-width: 90px !important; }
    }
    @media (min-width: 992px) {
        .logo-main { max-width: 100px !important; }
        .logo-main:hover { transform: scale(1.02); }
    }

    .boutique-nav li a,
    .boutique-text-small a,
    .header-top .dropdown-btn {
        font-family:"Cormorant Garamond",serif !important;
    font-size:15px !important;
    font-weight:800 !important;
    letter-spacing:.2px;
    /* text-transform:none !important; */
    color:var(--boutique-text) !important;
    transition:.35s;
    }

    .boutique-nav li a {
        padding: 6px 14px !important;
        display: inline-block;
        color: var(--boutique-dark) !important;
        transition: color 0.25s ease;
    }
/* Default Header */
.dropdown-wrapper a,
.theme-currency a,
.header-action-area a,
.header-action-area .target-cart-icon{
    color: #fff;
    transition: color .3s ease;
    font-size: 15px;
}

/* Sticky Header */
.header-area.header-sticky-active .dropdown-wrapper a,
.header-area.header-sticky-active .theme-currency a,
.header-area.header-sticky-active .header-action-area a,
.header-area.header-sticky-active .header-action-area .target-cart-icon{
    color: #000;
}
       .boutique-nav li ul li  a {
       color: var([--boutique-text]) !important;
         font-size: 14px !important;
       } 
    .contact-email span {
        font-size: 10px !important;
        letter-spacing: 0.3px;
        color: rgba(255,255,255,0.8);
    }
    .contact-email span a {
        text-transform: lowercase !important;
        font-weight: 500;
        text-decoration: none;
    }

    .has-dropdown i {
        display: inline-block;
        transition: transform 0.25s ease;
    }
    .has-dropdown:hover i {
        transform: rotate(180deg);
    }

.shop-count{
    position:absolute;
    top:-10px;
    right:-12px;

    min-width:18px;
    width:18px;
    height:18px;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:50%;
    font-size:12px !important;
    font-weight:700;
    line-height:1;

    transition:.3s ease;
    z-index:9999;

    color:#fff !important;

    box-shadow:
        0 2px 8px rgba(0,0,0,.25);
}

/* Sticky header */
.header-area.header-sticky-active .shop-count{
    background:#fff;
    color:var(--boutique-dark) !important;
    border:1px solid rgba(0,0,0,.08);
    box-shadow:
        0 4px 10px rgba(0,0,0,.12);
}

/* White pages after sticky */
.header-white-links.header-sticky-active .shop-count{
    background:#fff;
    color:var(--boutique-dark) !important;
}
    /* Mini Cart Dropdown Styles */
    .parent-cart-hover:hover .popup-cart-content {
        display: block;
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }
    
    .popup-cart-content {
        position: absolute;
        top: 100%;
        right: 0;
        width: 300px;
        background: #fff;
        box-shadow: 0 20px 40px rgba(0,0,0,.12);
        border: 1px solid #eee;
        padding: 15px;
        z-index: 1090;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: .3s;
    }

    .popup-cart-content.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* ==========================================================================
       3. LUXURY TEXT TICKER ANIMATION MATRIX LAYER
       ========================================================================== */
    .luxury-ticker {
        height: 20px;
        overflow: hidden;
        position: relative;
        width: 100%;
    }
    .ticker-item {
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--boutique-pink);
        line-height: 20px;
        text-align: center;
        width: 100%;
        position: absolute;
        opacity: 0;
        transform: translateY(15px);
        animation: tickerAnimation cubic-bezier(0.23, 1, 0.32, 1) 9s infinite;
    }
    
    .ticker-item:nth-child(1) { animation-delay: 0s; }
    .ticker-item:nth-child(2) { animation-delay: 3s; }
    .ticker-item:nth-child(3) { animation-delay: 6s; }

    @keyframes tickerAnimation {
        0% { opacity: 0; transform: translateY(15px); }
        3% { opacity: 1; transform: translateY(0); }
        30% { opacity: 1; transform: translateY(0); }
        33% { opacity: 0; transform: translateY(-15px); }
        100% { opacity: 0; }
    }

    @keyframes luxuryNavFade {
        from { opacity: 0; transform: translate(-50%, 8px); }
        to { opacity: 1; transform: translate(-50%, 0); }
    }

    /* ==========================================================================
       4. MOBILE SIDEBAR & RESPONSIVE CONTEXT OVERRIDES
       ========================================================================== */
    .off-canvas-wrapper {
        position: fixed;
        top: 0;
        left: -300px;
        width: 300px;
        height: 100%;
        z-index: 2050;
        transition: left 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .off-canvas-wrapper.active {
        left: 0;
        background-color: white;
    }

    .off-canvas-inner {
        position: relative;
        height: 100%;
        width: 100%;
        background: #ffffff;
        box-shadow: 25px 0 50px rgba(0,0,0,0.15);
        display: flex;
        flex-direction: column;
        z-index: 2060;
    }

    .off-canvas-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.4);
        backdrop-filter: blur(2px);
        opacity: 0;
        visibility: hidden;
        transition: all 0.35s ease;
        z-index: 2040;
    }

    .off-canvas-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    .off-canvas-header {
        padding: 25px 20px;
        border-bottom: 1px solid var(--boutique-light-border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-menu-close {
        background: none;
        border: none;
        font-size: 14px;
        letter-spacing: 1.5px;
        cursor: pointer;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        color: var(--boutique-dark);
    }

    .mobile-main-nav {
        list-style: none;
        padding: 10px 0;
        margin: 0;
        overflow-y: auto;
        flex-grow: 1;
    }
    .off-canvas-inner{
    display:flex;
    flex-direction:column;
    height:100%;
}

.mobile-sidebar-footer{
margin-bottom: 40px;
    padding:25px;
    border-top:1px solid #ececec;
    background:#fff;
}

.mobile-sidebar-footer a,
.mobile-sidebar-footer .sidebar-location{
    display:flex;
    align-items:center;
    gap:12px;
    color:#232323;
    text-decoration:none;
    font-size:14px;
    margin-bottom:14px;
    transition:.3s;
}

.mobile-sidebar-footer a:hover{
    color:var(--boutique-text);
}

.mobile-sidebar-footer i{
    color:var(--boutique-text);
    width:20px;
    text-align:center;
}

.sidebar-social{
    display:flex;
    justify-content:center;
    gap:15px;
    margin-top:20px;
}

.sidebar-social a{
    width:38px;
    height:38px;
    border:1px solid #ddd;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#232323;
    transition:.3s;
    margin-bottom:0;
}

.sidebar-social a:hover{
    background:var(--boutique-text);
    border-color:var(--boutique-text);
    color:#fff;
}

    .mobile-main-nav > li {
        border-bottom: 1px solid #f9f9f9;
    }

    .mobile-main-nav > li > a {
        display: block;
        padding: 14px 25px;
        font-size: 14px;
        font-weight: 600;
        color: var(--boutique-dark);
        text-decoration: none;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .mobile-sub-categories {
        list-style: none;
        padding: 5px 0 12px 40px;
        background: #fafafa;
        display: none;
        border-top: 1px solid #f5f5f5;
    }
    .mobile-sub-categories{
    display:none;
    overflow:hidden;
    transition:.3s ease;
}

    .mobile-sub-categories li a {
        display: block;
        padding: 8px 0;
        font-size: 14px;
        color: var(--boutique-muted);
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 500;
    }

    .has-mobile-dropdown.active .ion-ios-arrow-down {
        transform: rotate(180deg);
    }
    .has-mobile-dropdown .ion-ios-arrow-down {
        transition: transform 0.25s ease;
    }

    @media (max-width: 991px) {
        .header-navigation-area {
            display: none;
        }
        .responsive-header {
            background: rgba(0,0,0,0.35);
            transition: background 0.3s ease;
        }
        .header-area.header-sticky-active .responsive-header {
            background: #ffffff !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .header-area.header-sticky-active .target-mobile-toggle,
        .header-area.header-sticky-active .target-mobile-cart-icon {
            color: var(--boutique-dark) !important;
        }
        
    }

        
    
    .cart-amount-summary {
        font-size: 14px !important;
        font-weight: 500 !important;
    }
    
    .phone a, .phone span {
        font-size: 14px !important;
    }
    .mobile-social-icon{
    color:#fff;
    font-size:14px;
    transition:.3s;
}

.mobile-social-icon:hover{
    color:var(--boutique-text);
}

.header-area.header-sticky-active .mobile-social-icon{
    color:#000;
}

.header-area.header-sticky-active .mobile-social-icon:hover{
    color:var(--boutique-text);
}
.desktop-social{
    gap:14px;
}

.desktop-social-icon{
    color:#fff;
    font-size:15px;
    transition:.3s;
    text-decoration:none;
}

.desktop-social-icon:hover{
    color:var(--logo-pink-dark);
}

/* Sticky header */
.header-area.header-sticky-active .desktop-social-icon{
    color:var(--boutique-dark);
}

.header-area.header-sticky-active .desktop-social-icon:hover{
    color:var(--boutique-text);
}

/* White links pages */
.header-white-links .desktop-social-icon{
    color:#fff;
}

.header-white-links.header-sticky-active .desktop-social-icon{
    color:#000;
}
.header-user-icon a{
    display:flex;
    align-items:center;
    justify-content:center;

    width:34px;
    height:34px;

    color:#fff;
    text-decoration:none;
    transition:.35s;
}

.header-user-icon i{
    font-size:14px;
}

.header-user-icon a:hover{
    color:var(--logo-pink-dark);
}

.header-area.header-sticky-active .header-user-icon a{
    color:var(--boutique-dark);
}

.header-area.header-sticky-active .header-user-icon a:hover{
    color:var(--logo-pink-dark);
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
