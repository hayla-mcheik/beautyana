<header class="header-area header-default header-style">
    <!--== Start Header Top ==-->
    <div class="header-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 hidden-md-down">
            <div class="contact-email">
              <span>Email us:
                        <a href="mailto:{{ $appSetting->email1 ?? 'info@talyscollection.com' }}">
                            {{ $appSetting->email1 ?? 'info@talyscollection.com' }}
                        </a>
                        @if($appSetting->email2)
                            <br>
                            <a href="mailto:{{ $appSetting->email2 }}">
                                {{ $appSetting->email2 }}
                            </a>
                        @endif</span>
            </div>
          </div>

    <div class="col-md-6 col-lg-4 text-md-start text-lg-center text-center">
    <div class="luxury-ticker">
        @foreach($tickers as $item)
            <div class="ticker-item text-white">{{ $item->content }}</div>
        @endforeach
    </div>
</div>
          <div class="col-md-6 col-lg-4 text-md-end text-center mt-sm-15">
            @guest
            {{-- <div class="theme-setting">
              <a class="dropdown-btn" href="#" role="button">
                Login/Register
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
                @if (Route::has('login'))
                <li>
                  <a href="{{ url('login') }}">Login</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li>
                  <a href="{{ url('register') }}">Register</a>
                </li>
@endif


              </ul>
            </div> --}}
<div class="theme-setting">
  
</div>
            @elseif (auth()->user()->role_as == '1')
            <div class="theme-setting">
              <a class="dropdown-btn" href="#" role="button">
                {{ Auth::user()->name }}
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
                <li>
                  <a href="{{ url('admin/dashboard') }}">My Dashboard</a>
                </li>
                <li >
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Sign Out</a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>
  </li>

              </ul>
            </div>
@else

            <div class="theme-setting">
              <a class="dropdown-btn" href="#" role="button">
                {{ Auth::user()->name }}
                <i class="ion-ios-arrow-down"></i> 
              </a>
              <ul class="dropdown-content">
                <li>
                  <a href="{{ url('account') }}">My account</a>
                </li>
       
                <li >
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Sign Out</a>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
         @csrf
     </form>
  </li>

              </ul>
            </div>
            @endif
                     <div class="theme-currency">
              <a class="dropdown-btn" href="#" role="button">
          USD $
              </a>
     
            </div>
         
          </div>
        </div>
      </div>
    </div>
    <!--== End Header Top ==-->

  <div class="header-bottom sticky-header hidden-md-down to-be-sticky">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col col-12">
          <div class="header-align align-default">
            <div class="align-left">
              <div class="header-logo-area">
                <a href="{{ url('/') }}">
                  <img class="logo-main boutique-logo" src="{{ asset('assets/img/logo.png')}}" alt="Logo">
                </a>
              </div>
          <div class="header-navigation-area hidden-md-down">

    <ul class="main-menu nav position-relative boutique-nav ul-header-nav">

        {{-- ABOUT US --}}
        <li>
            <a href="{{ url('aboutus') }}">
                About Us
            </a>
        </li>


        {{-- =========================================
             DYNAMIC MENUS
        ========================================== --}}

        @foreach($menus as $menu)

            @if($menu->categories->count() > 0)

                {{-- MENU WITH MEGA MENU --}}
                <li class="mega-menu-parent">

                    <a
                        href="{{ url('/collections/' . $menu->slug) }}"
                        class="mega-menu-trigger"
                    >
                        {{ $menu->name }}

                        <i class="ion-ios-arrow-down"></i>
                    </a>


                    {{-- ================================
                         MEGA MENU
                    ================================= --}}

                    <div class="mega-menu-wrapper">

                        <div class="mega-menu-container">

                            <div class="mega-menu-layout">


                                {{-- =========================
                                     LEFT SIDE - CATEGORIES
                                ========================== --}}

                                <div class="mega-categories-area">

                                    <div class="mega-menu-grid">

                                        @foreach($menu->categories as $category)

                                            <div class="mega-menu-column">

                                                {{-- CATEGORY --}}
                                                <a
                                                    href="{{ url('/collections/' . $category->slug) }}"
                                                    class="mega-category-title"
                                                >
                                                    {{ $category->name }}
                                                </a>


                                                {{-- =================
                                                     SUBCATEGORIES
                                                ================== --}}

                                                @if($category->children->count() > 0)

                                                    <ul class="mega-subcategories">

                                                        @foreach($category->children as $sub)

                                                            <li>

                                                                <a
                                                                    href="{{ url('/collections/' . $sub->slug) }}"
                                                                >
                                                                    {{ $sub->name }}
                                                                </a>

                                                            </li>

                                                        @endforeach

                                                    </ul>

                                                @endif

                                            </div>

                                        @endforeach

                                    </div>

                                </div>


                                {{-- =========================
                                     RIGHT SIDE - IMAGE
                                ========================== --}}

                                <div class="mega-image-column">

                                    <a href="{{ url('/collections/' . $menu->slug) }}">

                                        <img
                                            src="{{ asset('assets/img/megaimg.webp') }}"
                                            alt="{{ $menu->name }}"
                                            class="mega-menu-image"
                                        >

                                        <div class="mega-image-overlay">

                                            <span>
                                                Shop {{ $menu->name }}
                                            </span>

                                        </div>

                                    </a>

                                </div>


                            </div>

                        </div>

                    </div>

                </li>

            @else

                {{-- MENU WITHOUT CATEGORIES --}}
                <li>

                    <a href="{{ url('/collections/' . $menu->slug) }}">
                        {{ $menu->name }}
                    </a>

                </li>

            @endif

        @endforeach


        {{-- NEWS --}}
        <li>
            <a href="{{ url('blogs') }}">
                News
            </a>
        </li>


        {{-- CONTACT --}}
        <li>
            <a href="{{ url('contactus') }}">
                Contact Us
            </a>
        </li>

    </ul>

</div>
            </div>
            <div class="align-right">
              <div class="contact-link float-start boutique-text-small">
                <div class="phone">
                  <span>Call us:</span>
                  <a href="tel:00961 79353846">00961 79353846</a>
                </div>
              </div>
              <div class="header-action-area float-start">
                <div class="shop-button-group">
                  {{-- <div class="shop-button-item">
                    <a class="shop-button" href="{{ url('wishlist') }}">
                      <i class="icon-heart icon"></i>
                      <sup class="shop-count"><livewire:frontend.wishlist-count /></sup>
                    </a>
                  </div> --}}
                  <div class="shop-button-item">
                    <a class="shop-button" href="{{ url('cart') }}">
                      <i class="icon-bag icon"></i>
                      <sup class="shop-count"><livewire:frontend.cart.cart-count /></sup>
                      <livewire:frontend.cart.total-amount-cart />
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
  </div>

  <div class="responsive-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-4">
          <div class="header-item">
            <button class="btn-menu ul-header-sidebar-opener" type="button"><i class="icon-menu"></i></button>
          </div>
        </div>
        <div class="col-4">
          <div class="header-item justify-content-center">
            <div class="header-logo-area">
              <a href="{{ url('/') }}">
                <img class="logo-main boutique-logo" src="{{ asset('assets/img/logo.png')}}" alt="Logo">
              </a>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="header-item justify-content-end boutique-icon-small">
            <button class="btn-cart" onclick="window.location.href='{{ url('cart') }}'"><i class="icon-bag"></i> <span class="item-count"><livewire:frontend.cart.cart-count /></span></button>
            {{-- <button class="btn-cart" onclick="window.location.href='{{url('wishlist')}}'"><i class="icon-heart"></i> <span class="item-count"><livewire:frontend.wishlist-count /></span></button>
       --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<style>

/* =========================================================
   BEAUTYANA HEADER
========================================================= */

.boutique-nav {
    position: relative;
}


/* =========================================================
   NORMAL NAVIGATION ITEMS
========================================================= */

.boutique-nav > li {
    position: static;
}

.boutique-nav > li > a {
    display: flex !important;
    align-items: center;

    gap: 5px;
}


/* =========================================================
   MEGA MENU PARENT
========================================================= */

.mega-menu-parent {
    position: static !important;
}


/* =========================================================
   ARROW
========================================================= */

.mega-menu-trigger i {
    margin-left: 5px;

    font-size: 9px;

    transition: transform 0.3s ease;
}


.mega-menu-parent:hover .mega-menu-trigger i {
    transform: rotate(180deg);
}


/* =========================================================
   FULL WIDTH MEGA MENU
========================================================= */

.mega-menu-wrapper {

    position: absolute;

    top: 100%;
    left: 0;

    width: 100%;

    background: #ffffff;

    border-top: 1px solid #eeeeee;

    box-shadow:
        0 15px 40px rgba(0, 0, 0, 0.10);

    z-index: 9999;

    visibility: hidden;

    opacity: 0;

    transform: translateY(10px);

    pointer-events: none;

    transition:
        opacity 0.25s ease,
        transform 0.25s ease,
        visibility 0.25s ease;
}


/* =========================================================
   SHOW MEGA MENU
========================================================= */

.mega-menu-parent:hover .mega-menu-wrapper {

    visibility: visible;

    opacity: 1;

    transform: translateY(0);

    pointer-events: auto;
}


/* =========================================================
   HOVER BRIDGE
========================================================= */

.mega-menu-parent {

    padding-bottom: 20px !important;

    margin-bottom: -20px !important;
}


/* =========================================================
   INNER CONTAINER
========================================================= */

.mega-menu-container {

    width: 100%;

    max-width: 1250px;

    margin: 0 auto;

    padding: 35px 40px 40px;
}


/* =========================================================
   MAIN MEGA MENU LAYOUT

   LEFT  = CATEGORIES
   RIGHT = IMAGE
========================================================= */

.mega-menu-layout {

    display: grid;

    grid-template-columns:
        minmax(0, 1fr)
        300px;

    gap: 40px;

    align-items: stretch;
}


/* =========================================================
   CATEGORY AREA
========================================================= */

.mega-categories-area {

    min-width: 0;
}


/* =========================================================
   CATEGORY GRID
========================================================= */

.mega-menu-grid {

    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    gap: 30px 50px;
}


/* =========================================================
   CATEGORY COLUMN
========================================================= */

.mega-menu-column {

    min-width: 0;
}


/* =========================================================
   MAIN CATEGORY
========================================================= */

.mega-category-title {

    display: block;

    margin-bottom: 12px;

    padding-bottom: 8px !important;

    color: #222 !important;

    font-size: 13px !important;

    font-weight: 600 !important;

    text-transform: uppercase !important;

    letter-spacing: 1px;

    border-bottom: 1px solid #eeeeee;

    transition:
        color 0.2s ease,
        padding-left 0.2s ease;

    background: transparent !important;
}


.mega-category-title:hover {

    color: #D97DA5 !important;

    padding-left: 4px !important;

    background: transparent !important;
}


/* =========================================================
   SUBCATEGORIES
========================================================= */

.mega-subcategories {

    list-style: none;

    margin: 0;

    padding: 0;
}


.mega-subcategories li {

    margin: 0 !important;

    padding: 0 !important;
}


.mega-subcategories li a {

    display: block;

    padding: 5px 0 !important;

    color: #777 !important;

    font-size: 12px !important;

    font-weight: 400 !important;

    text-transform: capitalize !important;

    background: transparent !important;

    border: none !important;

    transition:
        color 0.2s ease,
        padding-left 0.2s ease;
}


.mega-subcategories li a:hover {

    color: #D97DA5 !important;

    padding-left: 6px !important;

    background: transparent !important;
}


/* =========================================================
   IMAGE COLUMN
========================================================= */

.mega-image-column {

    position: relative;

    width: 100%;

    height: 280px;

    overflow: hidden;

    background: #f7f7f7;
}


.mega-image-column a {

    display: block;

    width: 100%;

    height: 100%;
}


/* =========================================================
   MEGA IMAGE
========================================================= */

.mega-menu-image {

    display: block;

    width: 100%;

    height: 100%;

    object-fit: cover;

    transition: transform 0.5s ease;
}


.mega-image-column:hover .mega-menu-image {

    transform: scale(1.05);
}


/* =========================================================
   IMAGE DARK GRADIENT
========================================================= */

.mega-image-column::after {

    content: "";

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(0,0,0,0.35),
            transparent 55%
        );

    pointer-events: none;

    z-index: 1;
}


/* =========================================================
   IMAGE BUTTON
========================================================= */

.mega-image-overlay {

    position: absolute;

    left: 20px;

    bottom: 20px;

    z-index: 2;
}


.mega-image-overlay span {

    display: inline-block;

    padding: 10px 18px;

    color: #ffffff;

    border: 1px solid rgba(255,255,255,0.8);

    background: rgba(0,0,0,0.15);

    font-size: 10px;

    font-weight: 500;

    text-transform: uppercase;

    letter-spacing: 1px;

    transition:
        background 0.3s ease,
        color 0.3s ease;
}


.mega-image-column:hover
.mega-image-overlay span {

    background: #ffffff;

    color: #222222;
}


/* =========================================================
   RESPONSIVE DESKTOP
========================================================= */

@media (max-width: 1200px) {

    .mega-menu-container {

        padding-left: 25px;

        padding-right: 25px;
    }


    .mega-menu-layout {

        grid-template-columns:
            minmax(0, 1fr)
            250px;

        gap: 25px;
    }


    .mega-menu-grid {

        gap: 25px 30px;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 991px) {

    .mega-menu-wrapper {

        display: none !important;
    }

}


/* =========================================================
   LOGO
========================================================= */

.boutique-logo {

    max-width: 100px !important;

    height: auto !important;
}


/* =========================================================
   HEADER TEXT
========================================================= */

.header-top,
.boutique-nav li a,
.boutique-text-small a {

    font-size: 11px !important;

    text-transform: uppercase;

    letter-spacing: 1px;

    font-weight: 700;
}


/* =========================================================
   CART COUNT
========================================================= */

.shop-count {

    background: #D97DA5 !important;

    font-size: 9px !important;
}


/* =========================================================
   STICKY HEADER
========================================================= */

.sticky-header.sticky-on {

    background: rgba(255,255,255,0.95);

    backdrop-filter: blur(10px);

    box-shadow:
        0 2px 10px rgba(0,0,0,0.05);
}


/* =========================================================
   TICKER
========================================================= */

.luxury-ticker {

    height: 20px;

    overflow: hidden;

    position: relative;
}


.ticker-item {

    font-size: 12px;

    font-weight: 600;

    text-transform: lowercase;

    color: #D97DA5;

    line-height: 20px;

    animation: tickerAnimation 9s infinite;

    position: absolute;

    width: 100%;

    opacity: 0;
}


.ticker-item:nth-child(1) {
    animation-delay: 0s;
}

.ticker-item:nth-child(2) {
    animation-delay: 3s;
}

.ticker-item:nth-child(3) {
    animation-delay: 6s;
}


@keyframes tickerAnimation {

    0% {
        opacity: 0;
        transform: translateY(10px);
    }

    5% {
        opacity: 1;
        transform: translateY(0);
    }

    30% {
        opacity: 1;
        transform: translateY(0);
    }

    35% {
        opacity: 0;
        transform: translateY(-10px);
    }

    100% {
        opacity: 0;
    }
}


/* =========================================================
   MOBILE LOGO
========================================================= */

@media (max-width: 991px) {

    .logo-main {

        max-width: 90px !important;

        height: auto;

        transition: transform 0.3s ease;
    }

}


/* =========================================================
   HEADER EMAIL
========================================================= */

.header-area
.header-top
.contact-email span {

    font-size: 13px !important;

    text-transform: capitalize;

    font-weight: 700;
}


.header-area
.header-top
.contact-email span a {

    text-transform: lowercase;
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
document.querySelectorAll('.has-dropdown').forEach(function(item) {
    const trigger = item.querySelector('a');
    const menu = item.querySelector('.mega-menu-content');

    if (trigger && menu) {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            menu.classList.toggle('is-open');
            item.classList.toggle('active');
        });
    }
});

    if (trigger && menu) {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            menu.classList.toggle('is-open');
            this.parentElement.classList.toggle('active');
        });

        // Close menu when clicking anywhere else
        document.addEventListener('click', function(e) {
            if (!menu.contains(e.target) && !trigger.contains(e.target)) {
                menu.classList.remove('is-open');
                trigger.parentElement.classList.remove('active');
            }
        });
    }
});
</script>