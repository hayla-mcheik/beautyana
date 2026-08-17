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
                            @endif
                        </span>
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
                        <div class="theme-setting"></div>
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
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sign Out
                                    </a>
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
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Sign Out
                                    </a>
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

    <!--== Start Header Bottom ==-->
    <div class="header-bottom sticky-header hidden-md-down to-be-sticky">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col col-12">
                    <div class="header-align align-default">
                        <div class="align-left">
                            <div class="header-logo-area">
                                <a href="{{ url('/') }}">
                                    <img class="logo-main boutique-logo" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                                </a>
                            </div>
                            <div class="header-navigation-area hidden-md-down">
                                <ul class="main-menu nav position-relative boutique-nav ul-header-nav">
                                    {{-- ABOUT US --}}
                                    <li>
                                        <a href="{{ url('aboutus') }}">About Us</a>
                                    </li>

                                    {{-- DYNAMIC MENUS --}}
                                    @foreach($menus as $menu)
                                        @if($menu->categories->count() > 0)
                                            <li class="mega-menu-parent">
                                                <a  href="javascript:void(0);" class="mega-menu-trigger">
                                                    {{ $menu->name }}
                                                    <i class="ion-ios-arrow-down"></i>
                                                </a>

                                                <div class="mega-menu-wrapper">
                                                    <div class="mega-menu-container">
                                                        <div class="mega-menu-layout">
                                                            <div class="mega-categories-area">
                                                                <div class="mega-menu-grid">
                                                                    @foreach($menu->categories as $category)
                                                                        <div class="mega-menu-column">
                                                                            <a href="{{ url('/collections/' . $category->slug) }}" class="mega-category-title">
                                                                                {{ $category->name }}
                                                                            </a>

                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <div class="mega-image-column">
                                                                <a href="{{ url('/collections/' . $menu->slug) }}">
                                                                    <img src="{{ asset('assets/img/megaimg.webp') }}" alt="{{ $menu->name }}" class="mega-menu-image">
                                                                
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @else
                                            <li>
                                                <a href="javascript:void(0);">
                                                    {{ $menu->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach

                                    {{-- NEWS --}}
                                    <li>
                                        <a href="{{ url('blogs') }}">News</a>
                                    </li>

                                    {{-- CONTACT --}}
                                    <li>
                                        <a href="{{ url('contactus') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="align-right">
                            <div class="contact-link float-start boutique-text-small">
                                <div class="phone">
                                    <span>Call us:</span>
                              <span class="phone" style="display: block; font-weight: 600; margin-bottom: 3px;">
    Talk To Us:
    <a href="tel:{{ $appSetting->phone1 ?? '+96179353846' }}" style="color: #D97DA5;">
        {{ $appSetting->phone1 ?? '+96179353846' }}
    </a>
</span>
                                </div>
                            </div>
                            <div class="header-action-area float-start">
                                <div class="shop-button-group">
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
    <!--== End Header Bottom ==-->

    <!--== Start Responsive Header ==-->
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
                                <img class="logo-main boutique-logo" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="header-item justify-content-end boutique-icon-small">
                        <button class="btn-cart" onclick="window.location.href='{{ url('cart') }}'">
                            <i class="icon-bag"></i> 
                            <span class="item-count"><livewire:frontend.cart.cart-count /></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Responsive Header ==-->
</header>

<style>
    /* Header Base Styling */
    .boutique-nav {
        position: relative;
    }

    .boutique-nav > li {
        position: static !important;
    }

    .boutique-nav > li > a {
        display: flex !important;
        align-items: center;
        gap: 5px;
    }

    .mega-menu-parent {
        position: static !important;
        padding-bottom: 20px !important;
        margin-bottom: -20px !important;
    }

    .mega-menu-trigger i {
        margin-left: 5px;
        font-size: 9px;
        transition: transform 0.3s ease;
    }

    .mega-menu-parent:hover .mega-menu-trigger i {
        transform: rotate(180deg);
    }

    /* Mega Menu Structure */
    .mega-menu-wrapper {
        position: absolute;
        top: 100%;
        left: 50%;
        width: 900px;
        max-width: calc(100vw - 40px);
        background: #ffffff;
        border-top: 1px solid #eeeeee;
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.10);
        z-index: 9999;
        visibility: hidden;
        opacity: 0;
        transform: translateX(-50%) translateY(10px);
        pointer-events: none;
        transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s ease;
    }

    .mega-menu-parent:hover .mega-menu-wrapper {
        visibility: visible;
        opacity: 1;
        transform: translateX(-50%) translateY(0);
        pointer-events: auto;
    }

    .mega-menu-container {
        width: 100%;
        padding: 28px 30px;
    }

    .mega-menu-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 240px;
        gap: 30px;
        align-items: stretch;
        width: 100%;
    }

    .mega-categories-area {
        width: 100%;
        min-width: 0;
    }

    .mega-menu-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        column-gap: 45px;
        row-gap: 20px;
        width: 100%;
    }

    .mega-menu-column {
        min-width: 0;
        width: 100%;
    }

    .mega-category-title {
        display: block;
        width: 100%;
        margin-bottom: 8px;
        padding-bottom: 7px !important;
        color: #222 !important;
        font-family: "Montserrat", sans-serif;
        font-size: 13px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.7px;
        line-height: 1.4;
        white-space: nowrap;
        border-bottom: 1px solid #eeeeee;
        background: transparent !important;
        text-decoration: none;
        transition: color 0.25s ease, padding-left 0.25s ease;
    }

    .mega-category-title:hover {
        color: #D97DA5 !important;
        padding-left: 4px !important;
        background: transparent !important;
    }

    .mega-subcategories {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .mega-subcategories li {
        display: block;
        width: 100%;
        margin: 0 !important;
        padding: 0 !important;
    }

    .mega-subcategories li a {
        display: block;
        width: 100%;
        padding: 4px 0 !important;
        color: #777 !important;
        font-family: "Montserrat", sans-serif;
        font-size: 12px !important;
        font-weight: 400 !important;
        line-height: 1.5;
        text-transform: capitalize !important;
        white-space: nowrap;
        background: transparent !important;
        border: none !important;
        text-decoration: none;
        transition: color 0.2s ease, padding-left 0.2s ease;
    }

    .mega-subcategories li a:hover {
        color: #D97DA5 !important;
        padding-left: 5px !important;
        background: transparent !important;
    }

    /* Image Box Styling */
    .mega-image-column {
        position: relative;
        width: 240px;
        height: 250px;
        overflow: hidden;
        background: #f7f7f7;
        flex-shrink: 0;
    }

    .mega-image-column a {
        display: block;
        width: 100%;
        height: 100%;
    }

    .mega-menu-image {
        display: block;
        width: 100%;
        height: 100%;
        min-height: 250px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .mega-image-column:hover .mega-menu-image {
        transform: scale(1.04);
    }

    .mega-image-column::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.25), transparent 50%);
        pointer-events: none;
        z-index: 1;
    }

    .mega-image-overlay {
        position: absolute;
        left: 18px;
        bottom: 18px;
        z-index: 2;
    }

    .mega-image-overlay span {
        display: inline-block;
        padding: 9px 17px;
        color: #ffffff;
        border: 1px solid rgba(255,255,255,0.85);
        background: rgba(0,0,0,0.18);
        font-family: "Montserrat", sans-serif;
        font-size: 10px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        white-space: nowrap;
        transition: background 0.3s ease, color 0.3s ease;
    }

    .mega-image-column:hover .mega-image-overlay span {
        background: #ffffff;
        color: #222222;
    }

    /* Logos & Text Standards */
    .boutique-logo {
        max-width: 100px !important;
        height: auto !important;
    }

    .header-top,
    .boutique-nav li a,
    .boutique-text-small a {
        font-size: 11px !important;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 700;
    }

    .shop-count {
        background: #D97DA5 !important;
        font-size: 9px !important;
    }

    .sticky-header.sticky-on {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

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

    .header-area .header-top .contact-email span {
        font-size: 13px !important;
        text-transform: capitalize;
        font-weight: 700;
    }

    .header-area .header-top .contact-email span a {
        text-transform: lowercase;
    }

    /* Breakpoint Specific Media Queries */
    @media (min-width: 1201px) {
        .mega-menu-wrapper {
            width: 900px;
            max-width: calc(100vw - 60px);
        }
        .mega-menu-container {
            padding: 30px 35px;
        }
        .mega-menu-layout {
            grid-template-columns: minmax(0, 1fr) 250px;
            gap: 35px;
        }
        .mega-image-column {
            width: 250px;
            height: 260px;
        }
        .mega-menu-image {
            min-height: 260px;
        }
    }

    @media (max-width: 1200px) and (min-width: 992px) {
        .mega-menu-wrapper {
            width: 760px;
            max-width: calc(100vw - 30px);
        }
        .mega-menu-container {
            padding: 25px;
        }
        .mega-menu-layout {
            grid-template-columns: minmax(0, 1fr) 210px;
            gap: 25px;
        }
        .mega-menu-grid {
            column-gap: 30px;
            row-gap: 18px;
        }
        .mega-image-column {
            width: 210px;
            height: 230px;
        }
        .mega-menu-image {
            min-height: 230px;
        }
    }

    @media (max-width: 991px) {
        .mega-menu-wrapper {
            display: none !important;
        }
        .logo-main {
            max-width: 90px !important;
            height: auto;
            transition: transform 0.3s ease;
        }
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
                e.stopPropagation();
                menu.classList.toggle('is-open');
                item.classList.toggle('active');
            });

            document.addEventListener('click', function(e) {
                if (!menu.contains(e.target) && !trigger.contains(e.target)) {
                    menu.classList.remove('is-open');
                    item.classList.remove('active');
                }
            });
        }
    });
});
</script>