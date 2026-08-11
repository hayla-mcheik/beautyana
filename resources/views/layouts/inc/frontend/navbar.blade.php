<!--== Start Header Wrapper ==-->
  <header class="header-area header-default header-style2">
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
<div></div>
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

    <!--== Start Header Middle ==-->
    <div class="header-middle hidden-md-down">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col col-md-4 col-sm-12">
            <div class="contact-link">
      <div class="contact-info">
    <span class="phone" style="display: block; font-weight: 600; margin-bottom: 3px;">
        Talk To Us: <a href="tel:00961 79353846" style="color: #D97DA5;">00961 79353846</a>
    </span>
<div class="time-contact" style="font-size: 9px; color: #aaa; text-transform: uppercase; letter-spacing: 1.2px; line-height: 1.4;">
    We believe jewelry is the final touch that brings a look together - for both women and men.
    
    @if(optional($appSetting)->address)
        <br/> 
        <span style="color: #888;">Address:</span> 
        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($appSetting->address) }}" target="_blank" style="color: #aaa; text-decoration: underline;">
            {{ $appSetting->address }}
        </a>
    @endif
</div>

</div>
            </div>
          </div>
          <div class="col col-md-4 col-sm-12">
            <div class="header-logo-area text-center">
              <a href="{{url('/') }}">
                <img class="logo-main" src="{{ asset('assets/img/logo.png')}}" alt="Logo">
                <img class="logo-light d-none" src="{{asset('assets/img/logo-light.png')}}" alt="Logo">
              </a>
            </div>
          </div>
          <div class="col col-md-4 col-sm-12">
            <div class="header-action-area float-end">
              {{-- <div class="search-content-wrap">
                <button class="btn-search">
                  <span class="icon icon-search icon-magnifier"></span>
                </button>
                <div class="btn-search-content">
                  <form action="{{ url('search') }}" method="GET" role="search">
                    <div class="form-input-item">
                      <input type="text" placeholder="Enter your search key ..."  value="{{ Request::get('search') }}" name="search">
                      <button type="submit" class="btn-src">
                        <i class="icon-magnifier"></i>
                      </button>
          
                    </div>
                  </form>
                </div>
              </div> --}}
              <div class="shop-button-group">
       
                    {{-- <div class="shop-button-item">
                      <a class="shop-button" href="{{ url('wishlist') }}">
                        <i class="icon-heart icon"></i>
                        <sup class="shop-count"><livewire:frontend.wishlist-count /></sup>
                      </a>
                    </div> --}}
                <div class="shop-button-item">
                  <a class="shop-button">
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
    <!--== End Header Middle ==-->

    <!--== Start Header Bottom ==-->
    <div class="header-bottom sticky-header hidden-md-down">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col col-12 position-relative">
            <div class="header-align align-default justify-content-center">
              <div class="header-navigation-area hidden-md-down">
        <ul class="main-menu nav boutique-main-menu">

    {{-- ABOUT --}}
    <li>
        <a href="{{ url('aboutus') }}">
            About Us
        </a>
    </li>


    {{-- DYNAMIC MENUS --}}
    @foreach($menus as $menu)

        @if($menu->categories->count())

            {{-- MENU WITH CATEGORIES --}}
            <li class="mega-menu-parent">

                <a href="javascript:void(0);" class="mega-menu-trigger">
                    {{ $menu->name }}

                    <i class="ion-ios-arrow-down"></i>
                </a>


<div class="mega-menu-wrapper">

    <div class="mega-menu-container">

        <div class="mega-menu-layout">

            {{-- ============================= --}}
            {{-- CATEGORIES --}}
            {{-- ============================= --}}

            <div class="mega-categories-area">

                <div class="mega-menu-grid">

                    @foreach($menu->categories as $category)

                        <div class="mega-menu-column">

                            {{-- MAIN CATEGORY --}}
                            <a
                                href="{{ url('collections/'.$category->slug) }}"
                                class="mega-category-title"
                            >
                                {{ $category->name }}
                            </a>


                            {{-- SUBCATEGORIES --}}
                            @if($category->children->count())

                                <ul class="mega-subcategories">

                                    @foreach($category->children as $sub)

                                        <li>
                                            <a href="{{ url('collections/'.$sub->slug) }}">
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


            {{-- ============================= --}}
            {{-- MEGA MENU IMAGE --}}
            {{-- ============================= --}}

            <div class="mega-image-column">

                <a href="{{ url('/collections/'.$menu->slug) }}">

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

                @if($menu->slug === 'news')

                    <a href="{{ url('blogs') }}">
                        {{ $menu->name }}
                    </a>

                @else

                    <a href="{{ url('/collections/'.$menu->slug) }}">
                        {{ $menu->name }}
                    </a>

                @endif

            </li>

        @endif

    @endforeach


    {{-- CONTACT --}}
    <li>
        <a href="{{ url('contactus') }}">
            Contact Us
        </a>
    </li>

</ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Header Bottom ==-->

    <!--== Start Responsive Header ==-->
    <div class="responsive-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4">
            <div class="header-item">
              <button class="btn-menu" type="button"><i class="icon-menu"></i></button>
            </div>
          </div>
          <div class="col-4">
            <div class="header-item justify-content-center">
              <div class="header-logo-area">
                <a href="{{ url('/')}}">
                  <img class="logo-main" src="assets/img/logo.png" alt="Logo">
                </a>
              </div>
            </div>
          </div>
          <div class="col-4">
            <div class="header-item justify-content-end">
              <button class="btn-user" onclick="window.location.href='{{url('account') }}'"><i class="icon-user"></i></button>
              <button class="btn-cart" onclick="window.location.href='{{url('cart')}}'"><i class="icon-bag"></i> <span class="item-count"><livewire:frontend.cart.cart-count /></span></button>
               {{-- <button class="btn-cart" onclick="window.location.href='{{url('wishlist')}}'"><i class="icon-heart"></i> <span class="item-count"><livewire:frontend.wishlist-count /></span></button>
        --}}
              </div>
          </div>
          {{-- <div class="col-12">
            <div class="responsive-search-content">
              <form action="{{ url('search') }}" method="GET" role="search">
                <div class="form-input-item">
                  <input type="text" placeholder="Enter your search key ..."  value="{{ Request::get('search') }}" name="search">
                  <button type="submit" class="btn-src">
                    <i class="icon-magnifier"></i>
                  </button>
           
                </div>
              </form>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
    <!--== End Responsive Header ==-->
  </header>
  <!--== End Header Wrapper ==-->
<style>
  /* =========================================================
   BEAUTYANA MEGA MENU
   ========================================================= */

.boutique-main-menu {
    position: relative;
}


/* ---------------------------------------------------------
   Main menu item
   --------------------------------------------------------- */

.boutique-main-menu > li {
    position: static !important;
}


.boutique-main-menu > li > a {
    position: relative;
    display: flex !important;
    align-items: center;
    gap: 6px;
}


/* ---------------------------------------------------------
   Arrow
   --------------------------------------------------------- */

.mega-menu-trigger i {
    font-size: 10px;
    transition: transform 0.3s ease;
}


.mega-menu-parent:hover .mega-menu-trigger i {
    transform: rotate(180deg);
}


/* ---------------------------------------------------------
   FULL WIDTH MEGA MENU
   --------------------------------------------------------- */

/* =========================================================
   BEAUTYANA MEGA MENU
   ========================================================= */

.mega-menu-parent {
    position: static !important;
}


/* ---------------------------------------------------------
   MEGA MENU WRAPPER
   --------------------------------------------------------- */

.mega-menu-wrapper {
    position: absolute;

    top: 100%;
    left: 0;

    width: 100%;

    background: #fff;

    border-top: 1px solid #eeeeee;

    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.10);

    visibility: hidden;
    opacity: 0;

    transform: translateY(10px);

    transition:
        opacity 0.25s ease,
        transform 0.25s ease,
        visibility 0.25s ease;

    z-index: 9999;

    pointer-events: none;
}


/* ---------------------------------------------------------
   SHOW ON HOVER
   --------------------------------------------------------- */

.mega-menu-parent:hover .mega-menu-wrapper {
    visibility: visible;
    opacity: 1;

    transform: translateY(0);

    pointer-events: auto;
}


/* ---------------------------------------------------------
   MAIN CONTAINER
   --------------------------------------------------------- */

.mega-menu-container {
    width: 100%;

    max-width: 1200px;

    margin: 0 auto;

    padding: 30px 35px;
}


/* ---------------------------------------------------------
   TWO PART LAYOUT

   LEFT  = categories
   RIGHT = image
   --------------------------------------------------------- */

.mega-menu-layout {
    display: grid;

    grid-template-columns: minmax(0, 1fr) 300px;

    gap: 35px;

    align-items: stretch;
}


/* ---------------------------------------------------------
   CATEGORY AREA
   --------------------------------------------------------- */

.mega-categories-area {
    min-width: 0;
}


/* ---------------------------------------------------------
   CATEGORY GRID

   Two columns for categories
   --------------------------------------------------------- */

.mega-menu-grid {
    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    column-gap: 50px;

    row-gap: 25px;
}


/* ---------------------------------------------------------
   CATEGORY COLUMN
   --------------------------------------------------------- */

.mega-menu-column {
    min-width: 0;
}


/* ---------------------------------------------------------
   CATEGORY TITLE
   --------------------------------------------------------- */

.mega-category-title {
    display: block;

    margin-bottom: 10px;

    padding-bottom: 8px !important;

    color: #222 !important;

    font-size: 14px !important;

    font-weight: 600 !important;

    text-transform: uppercase !important;

    letter-spacing: 0.8px;

    border-bottom: 1px solid #eeeeee;

    transition:
        color 0.25s ease,
        padding-left 0.25s ease;
}


.mega-category-title:hover {
    color: #D97DA5 !important;

    padding-left: 4px !important;

    background: transparent !important;
}


/* ---------------------------------------------------------
   SUBCATEGORIES
   --------------------------------------------------------- */

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

    padding: 4px 0 !important;

    color: #777 !important;

    font-size: 13px !important;

    font-weight: 400 !important;

    text-transform: capitalize !important;

    transition:
        color 0.2s ease,
        padding-left 0.2s ease;

    background: transparent !important;

    border: none !important;
}


.mega-subcategories li a:hover {
    color: #D97DA5 !important;

    padding-left: 6px !important;

    background: transparent !important;
}


/* ---------------------------------------------------------
   IMAGE COLUMN
   --------------------------------------------------------- */

.mega-image-column {
    position: relative;

    width: 100%;

    min-height: 260px;

    overflow: hidden;

    background: #f7f7f7;
}


/* ---------------------------------------------------------
   IMAGE
   --------------------------------------------------------- */

.mega-menu-image {
    display: block;

    width: 100%;

    height: 100%;

    min-height: 260px;

    object-fit: cover;

    transition: transform 0.5s ease;
}


/* ---------------------------------------------------------
   IMAGE HOVER
   --------------------------------------------------------- */

.mega-image-column:hover .mega-menu-image {
    transform: scale(1.04);
}


/* ---------------------------------------------------------
   IMAGE OVERLAY
   --------------------------------------------------------- */

.mega-image-overlay {
    position: absolute;

    left: 20px;

    bottom: 20px;

    z-index: 2;
}


.mega-image-overlay span {
    display: inline-block;

    padding: 10px 18px;

    color: #fff;

    border: 1px solid rgba(255,255,255,0.8);

    background: rgba(0,0,0,0.15);

    font-size: 11px;

    font-weight: 500;

    text-transform: uppercase;

    letter-spacing: 1px;

    backdrop-filter: blur(2px);

    transition:
        background 0.3s ease,
        color 0.3s ease;
}


.mega-image-column:hover .mega-image-overlay span {
    background: #fff;

    color: #222;
}


/* ---------------------------------------------------------
   IMAGE DARK OVERLAY
   --------------------------------------------------------- */

.mega-image-column::after {
    content: "";

    position: absolute;

    inset: 0;

    background: linear-gradient(
        to top,
        rgba(0,0,0,0.25),
        transparent 45%
    );

    pointer-events: none;
}


/* ---------------------------------------------------------
   ARROW
   --------------------------------------------------------- */

.mega-menu-trigger i {
    margin-left: 5px;

    font-size: 9px;

    transition: transform 0.3s ease;
}


.mega-menu-parent:hover .mega-menu-trigger i {
    transform: rotate(180deg);
}


/* ---------------------------------------------------------
   DESKTOP
   --------------------------------------------------------- */

@media (min-width: 992px) {

    .mega-menu-parent {
        padding-bottom: 20px !important;

        margin-bottom: -20px !important;
    }

}


/* ---------------------------------------------------------
   TABLET
   --------------------------------------------------------- */

@media (max-width: 1200px) {

    .mega-menu-container {
        padding: 25px;
    }

    .mega-menu-layout {
        grid-template-columns:
            minmax(0, 1fr) 250px;

        gap: 25px;
    }

    .mega-menu-grid {
        column-gap: 30px;
    }

}


/* ---------------------------------------------------------
   MOBILE
   --------------------------------------------------------- */

@media (max-width: 991px) {

    .mega-menu-wrapper {
        display: none !important;
    }

}
 1. Create an invisible bridge so the hover doesn't break */
.has-dropdown {
    position: relative;
    padding-bottom: 20px; /* Provides space for the bridge */
    margin-bottom: -20px;
}

.boutique-dropdown::before {
    content: "";
    position: absolute;
    top: -25px; /* Adjust this based on your header height */
    left: 0;
    width: 100%;
    height: 25px;
    background: transparent;
}

/* 2. Ensure the dropdown stays open while hovering the menu itself */
.has-dropdown:hover .boutique-dropdown {
    display: block !important;
}
    /* 1. New Classic Dropdown Styling */
  .boutique-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    background: #fff;
    min-width: 200px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    padding: 15px 0;
    display: none;
    z-index: 999;
    border: 1px solid #f2f2f2;
    border-radius: 4px;
    text-align: left;
  }

  /* Show on Hover */
  @media (min-width: 992px) {
    .has-dropdown:hover .boutique-dropdown {
        display: block;
    }
  }

  /* Show on Click (via JS) */
  .boutique-dropdown.is-open {
    display: block !important;
  }

  .boutique-dropdown li {
    display: block;
    width: 100%;
    padding: 0 !important;
    margin: 0 !important;
  }

  .boutique-dropdown li a {
    padding: 10px 25px !important;
    color: #444 !important;
    font-size: 13px !important;
    font-weight: 500 !important;
    text-transform: capitalize !important;
    display: block;
    border: none !important;
  }

  .boutique-dropdown li a:hover {
    color: #D97DA5 !important; /* Theme Pink */
    background: #fafafa;
    padding-left: 30px !important;
  }

  /* Make Mega Menu Smaller */
.small-mega {
    padding: 20px 0 !important; /* Reduced padding */
    width: 60% !important;      /* Don't span full 100% width if you want it smaller */
    left: 20% !important;       /* Center it because of the 80% width */
    max-height: 350px;          /* Limit height */
}

/* Compact Categories */
.mega-menu-items.compact li a {
    font-size: 12px !important; /* Smaller text */
    padding: 5px 0 !important;  /* Tighter spacing */
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Smaller Banner */
.small-banner {
    max-height: 180px;
    overflow: hidden;
}

.banner-content.compact h5 {
    font-size: 14px;
    color: #fff;
    margin: 0;
}

/* Click Functionality Classes */
.mega-menu.is-open {
    display: block !important;
}

/* Optional: Keep hover support too, or remove this to only allow clicks */
.has-dropdown:hover .mega-menu {
    display: block;
}
/* Mega Menu Base */
.position-static {
    position: static !important;
}

.mega-menu {
    position: absolute;
    width: 100%;
    left: 0;
    top: 100%;
    background: #ffffff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    padding: 30px 0;
    display: none; /* Hide by default */
    z-index: 999;
    border-top: 1px solid #f2f2f2;
}

.has-dropdown:hover .mega-menu {
    display: block; /* Show on hover */
}

/* Categories List Styling */
.mega-menu-items {
    list-style: none;
    padding: 0;
}

.mega-menu-items li a {
    font-size: 14px;
    color: #51555a;
    padding: 10px 0;
    display: block;
    font-weight: 700;
    transition: color 0.3s ease;
}

.mega-menu-items li a:hover {
    color: #D97DA5; /* Pink theme color */
}

/* Banner Styling */
.menu-banner {
    position: relative;
    overflow: hidden;
    border-radius: 4px;
}

.menu-banner img {
    transition: transform 0.5s ease;
    width: 100%;
}

.menu-banner:hover img {
    transform: scale(1.05);
}

.banner-content {
    position: absolute;
    bottom: 20px;
    left: 20px;
}

.banner-content h4 {
    color: #fff;
    margin-bottom: 5px;
    font-size: 18px;
    text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
}

.banner-content span {
    color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
}
    /* Small text aesthetic for luxury feel */
    .header-top, 
    .main-menu li a, 
    .contact-info span, 
    .dropdown-btn {
      font-size: 12px !important; 
      text-transform: capitalize;
      font-weight: 700;
    }

    .header-top {
      border-bottom: 1px solid #f2f2f2;
      padding: 6px 0;
    }

    .shop-count {
      background: #D97DA5 !important; /* Subtle gold/neutral tone for accessories */
      font-size: 9px !important;
    }

    .icon-user {
      display: none;
    }

    /* Sticky Blur Effect */
    .sticky-header.sticky-on {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    .header-area .header-top .contact-email span{
      font-size: 13px !important;
        text-transform: capitalize;
        font-weight: 700;
    }
      .header-area .header-top .contact-email span a { 
          text-transform: lowercase;
      }
  /* ANIMATED TICKER CSS */
    .luxury-ticker {
        height: 20px;
        overflow: hidden;
        position: relative;
    }
    .ticker-item {
        font-size: 12px;
        font-weight: 600;
        text-transform: lowercase;

        color: #D97DA5; /* Matches your logo pink */
        line-height: 20px;
        animation: tickerAnimation 9s infinite;
        position: absolute;
        width: 100%;
        opacity: 0;
    }
    .ticker-item:nth-child(1) { animation-delay: 0s; }
    .ticker-item:nth-child(2) { animation-delay: 3s; }
    .ticker-item:nth-child(3) { animation-delay: 6s; }

    @keyframes tickerAnimation {
        0% { opacity: 0; transform: translateY(10px); }
        5% { opacity: 1; transform: translateY(0); }
        30% { opacity: 1; transform: translateY(0); }
        35% { opacity: 0; transform: translateY(-10px); }
        100% { opacity: 0; }
    }
    @media (max-width: 991px) {
     .logo-main {
      max-width: 90px !important; /* Forces logo to be small and elegant */
      height: auto;
      transition: transform 0.3s ease;
    }
    
}
    @media (min-width: 991px) {
     .logo-main {
      max-width: 100px !important; /* Forces logo to be small and elegant */
      height: auto;
      transition: transform 0.3s ease;
    }
    
}
  </style>
  <script>
document.addEventListener('DOMContentLoaded', function() {
    const trigger = document.querySelector('.dropdown-click-trigger');
    const menu = document.querySelector('.mega-menu');

    trigger.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        menu.classList.toggle('is-open');
    });

    // Close menu when clicking anywhere else on the page
    document.addEventListener('click', function(e) {
        if (!menu.contains(e.target) && !trigger.contains(e.target)) {
            menu.classList.remove('is-open');
        }
    });
});
</script>