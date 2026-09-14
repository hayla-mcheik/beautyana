@php

    // Default breadcrumb image
    $breadcrumbImage = asset('assets/img/breadcrumb.jpg');

    /*
    |--------------------------------------------------------------------------
    | About Us
    |--------------------------------------------------------------------------
    */
    if (request()->is('aboutus')) {

        if (!empty($appSetting?->breadcrumb_about)) {
            $breadcrumbImage = asset($appSetting->breadcrumb_about);
        }

    /*
    |--------------------------------------------------------------------------
    | Contact Us
    |--------------------------------------------------------------------------
    */
    } elseif (request()->is('contactus')) {

        if (!empty($appSetting?->breadcrumb_contact)) {
            $breadcrumbImage = asset($appSetting->breadcrumb_contact);
        }

    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */
    } elseif (request()->is('categories')) {

        if (!empty($appSetting?->breadcrumb_categories)) {
            $breadcrumbImage = asset($appSetting->breadcrumb_categories);
        }

    /*
    |--------------------------------------------------------------------------
    | Collections / Accessories / On Sale
    |--------------------------------------------------------------------------
    */
    } elseif (request()->is('collections/*')) {

        $categorySlug = request()->segment(2);

        $breadcrumbCategory = \App\Models\Category::where(
            'slug',
            $categorySlug
        )->first();

        if ($breadcrumbCategory) {

            // Collections
            if (
                $breadcrumbCategory->menu === 'Collections'
                && !empty($appSetting?->breadcrumb_collections)
            ) {
                $breadcrumbImage = asset(
                    $appSetting->breadcrumb_collections
                );
            }

            // Accessories
            elseif (
                $breadcrumbCategory->menu === 'Accessories'
                && !empty($appSetting?->breadcrumb_accessories)
            ) {
                $breadcrumbImage = asset(
                    $appSetting->breadcrumb_accessories
                );
            }

            // On Sale
            elseif (
                $breadcrumbCategory->menu === 'OnSale'
                && !empty($appSetting?->breadcrumb_onsale)
            ) {
                $breadcrumbImage = asset(
                    $appSetting->breadcrumb_onsale
                );
            }
        }
    }

@endphp


<div
    class="page-header-area bg-img"
    style="background-image: url('{{ $breadcrumbImage }}') !important;"
    data-bg-img="{{ $breadcrumbImage }}"
>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-header-content">
                    <nav class="breadcrumb-area">
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{ url('/') }}">Home</a>
                            </li>

                            @foreach($breadcrumbs as $breadcrumb)
                                <li class="breadcrumb-sep">
                                /
                                </li>

                                @if(!$loop->last)
                                    <li>
                                        <a href="{{ $breadcrumb['url'] }}">
                                            {{ $breadcrumb['title'] }}
                                        </a>
                                    </li>
                                @else
                                    <li>{{ $breadcrumb['title'] }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>