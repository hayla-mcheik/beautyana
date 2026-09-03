<!--== Start Header Wrapper ==-->
  <header class="header-area header-default header-style2">
    <!--== Start Header Top ==-->
    <div class="header-top">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 hidden-md-down">
            <div class="contact-email">
              <span>Email us:
                        <a href="mailto:{{ $appSetting->email1 ?? 'demanto@demanto.com' }}">
                            {{ $appSetting->email1 ?? 'demanto@demanto.com' }}
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
                <ul class="main-menu nav">
              
                      <li><a href="{{ url('aboutus') }}">About Us</a></li>
<li class="has-dropdown mega-menu-parent">

    <a href="javascript:void(0)" class="dropdown-click-trigger">
        Products <i class="ion-ios-arrow-down"></i>
    </a>

    <div class="mega-menu">

        <div class="container">

            <div class="row">

                {{-- LEFT SIDE --}}
                <div class="col-lg-3">

                    <div class="mega-menu-title">
                        <h4>Shop Collections</h4>
                        <span>Discover our collections</span>
                    </div>

                </div>

                {{-- CATEGORIES --}}
                <div class="col-lg-9">

                    <div class="row">

                        @if(isset($allCategories))

                            @foreach($allCategories as $categoryItem)

                                <div class="col-lg-4 col-md-6 mega-category">

                                    <a href="{{ url('collections/'.$categoryItem->slug) }}">

                                        <span class="mega-category-name">
                                            {{ $categoryItem->name }}
                                        </span>

                                        <i class="ion-ios-arrow-forward"></i>

                                    </a>

                                </div>

                            @endforeach

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</li>
                      <li><a href="{{ url('blogs')}}">News</a>           
                      </li>
                      <li><a href="{{ url('contactus') }}">Contact us</a></li>
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
  /* 1. Create an invisible bridge so the hover doesn't break */
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
/* =========================================
   PRODUCTS MEGA MENU
========================================= */

.mega-menu-parent {
    position: static !important;
}

/* Mega menu container */
.mega-menu {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: #fff;

    padding: 35px 0;

    border-top: 1px solid #f1f1f1;
    border-bottom: 1px solid #eeeeee;

    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);

    display: none;
    z-index: 9999;

    text-align: left;
}

/* Desktop hover */
@media (min-width: 992px) {

    .mega-menu-parent:hover .mega-menu {
        display: block;
    }

}

/* Open from JavaScript */
.mega-menu.is-open {
    display: block !important;
}


/* =========================================
   LEFT TITLE
========================================= */

.mega-menu-title {
    padding: 5px 30px 10px 0;
    border-right: 1px solid #eeeeee;
    min-height: 120px;
}

.mega-menu-title h4 {
    margin: 0 0 8px;

    font-size: 18px;
    font-weight: 600;

    color: #333;

    text-transform: uppercase;
    letter-spacing: 1px;
}

.mega-menu-title span {
    display: block;

    font-size: 12px;
    font-weight: 400;

    color: #999;

    text-transform: uppercase;
    letter-spacing: 1px;
}


/* =========================================
   CATEGORY AREA
========================================= */

.mega-category {
    margin-bottom: 12px;
}

.mega-category a {
    display: flex;

    align-items: center;
    justify-content: space-between;

    padding: 12px 15px;

    color: #444 !important;

    background: #fff;

    border-bottom: 1px solid #f2f2f2;

    transition: all 0.25s ease;
}

.mega-category-name {
    font-size: 13px;

    font-weight: 600;

    text-transform: capitalize;

    letter-spacing: 0.4px;
}

.mega-category a i {
    font-size: 14px;

    color: #aaa;

    transition: transform 0.25s ease,
                color 0.25s ease;
}


/* Hover */

.mega-category a:hover {
    color: #D97DA5 !important;

    padding-left: 20px;

    background: #fafafa;
}

.mega-category a:hover i {
    color: #D97DA5;

    transform: translateX(4px);
}


/* =========================================
   INVISIBLE HOVER BRIDGE
========================================= */

.mega-menu-parent::after {
    content: "";

    position: absolute;

    left: 0;
    right: 0;

    top: 100%;

    height: 15px;

    background: transparent;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 991px) {

    .mega-menu {
        position: static;

        width: 100%;

        padding: 20px 15px;

        box-shadow: none;

        border-top: 1px solid #eee;
    }

    .mega-menu-title {
        border-right: none;

        border-bottom: 1px solid #eee;

        padding: 0 0 15px;

        margin-bottom: 15px;

        min-height: auto;
    }

    .mega-category {
        margin-bottom: 5px;
    }

    .mega-category a {
        padding: 10px 5px;
    }

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
document.addEventListener('DOMContentLoaded', function () {

    const parent = document.querySelector('.mega-menu-parent');

    if (!parent) return;

    const trigger = parent.querySelector('.dropdown-click-trigger');
    const menu = parent.querySelector('.mega-menu');

    if (!trigger || !menu) return;


    /* CLICK */
    trigger.addEventListener('click', function (e) {

        e.preventDefault();
        e.stopPropagation();

        menu.classList.toggle('is-open');

    });


    /* CLICK OUTSIDE */
    document.addEventListener('click', function (e) {

        if (!parent.contains(e.target)) {

            menu.classList.remove('is-open');

        }

    });


    /* ESCAPE */
    document.addEventListener('keydown', function (e) {

        if (e.key === 'Escape') {

            menu.classList.remove('is-open');

        }

    });

});
</script>