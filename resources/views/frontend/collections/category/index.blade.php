@extends('layouts.app')

@section('title', 'All Categories')

@section('content')

@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'All Categories',
            'url'   => '#'
        ]
    ]
])

<div class="all-categories py-5">

    <div class="container py-5">

        <div class="text-center mb-5">
            <h2 class="categories-main-title">Our Categories</h2>
            <p class="categories-subtitle">
                Discover our collections and explore our categories.
            </p>
        </div>


        {{-- ========================= --}}
        {{-- MENUS --}}
        {{-- ========================= --}}

        @forelse($menus as $menu)

            <section class="category-menu-section mb-5">

                {{-- Menu Title --}}
                <div class="menu-heading text-center mb-4">

                    <h3>
                        {{ $menu->name }}
                    </h3>

                    <span class="menu-heading-line"></span>

                </div>


                {{-- Categories --}}
                @if($menu->categories->count())

                    <div class="row justify-content-center">

                        @foreach($menu->categories as $categoryItem)

                            <div class="col-6 col-md-4 col-lg-3 mb-4">

                                <div class="category-card">

                                    <a href="{{ url('/collections/' . $categoryItem->slug) }}">

                                        {{-- Image --}}
                                        <div class="category-card-img">

                                            @if($categoryItem->image)

                                                <img
                                                    src="{{ asset($categoryItem->image) }}"
                                                    alt="{{ $categoryItem->name }}"
                                                >

                                            @else

                                                <div class="category-no-image">
                                                    <span>{{ $categoryItem->name }}</span>
                                                </div>

                                            @endif

                                        </div>


                                        {{-- Category Name --}}
                                        <div class="category-card-body">

                                            <h5>
                                                {{ $categoryItem->name }}
                                            </h5>

                                        </div>

                                    </a>


                                    {{-- ========================= --}}
                                    {{-- SUBCATEGORIES --}}
                                    {{-- ========================= --}}

                                    @if($categoryItem->children->count())

                                        <div class="category-subcategories">

                                            @foreach($categoryItem->children as $subcategory)

                                                <a
                                                    href="{{ url('/collections/' . $subcategory->slug) }}"
                                                    class="subcategory-link"
                                                >
                                                    {{ $subcategory->name }}
                                                </a>

                                            @endforeach

                                        </div>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="text-center py-3">

                        <p class="text-muted">
                            No categories available.
                        </p>

                    </div>

                @endif

            </section>

        @empty

            <div class="text-center py-5">

                <h5>No Categories Available</h5>

            </div>

        @endforelse

    </div>

</div>


<style>

/* =========================================
   ALL CATEGORIES
========================================= */

.all-categories {
    background: #fff;
}


/* =========================================
   PAGE TITLE
========================================= */

.categories-main-title {
    margin-bottom: 10px;

    font-family: "Cormorant Garamond", serif;

    font-size: 38px;

    font-weight: 500;

    color: #51555A;

    letter-spacing: 1px;
}


.categories-subtitle {
    margin: 0;

    font-family: "Montserrat", sans-serif;

    font-size: 13px;

    color: #999;

    letter-spacing: 0.5px;
}


/* =========================================
   MENU SECTION
========================================= */

.category-menu-section {
    padding: 30px 0;
}


/* =========================================
   MENU TITLE
========================================= */

.menu-heading {
    margin-bottom: 30px;
}


.menu-heading h3 {
    margin: 0;

    font-family: "Cormorant Garamond", serif;

    font-size: 27px;

    font-weight: 500;

    color: #51555A;

    text-transform: uppercase;

    letter-spacing: 2px;
}


.menu-heading-line {
    display: block;

    width: 45px;

    height: 1px;

    background: #e0a4a4;

    margin: 12px auto 0;
}


/* =========================================
   CATEGORY CARD
========================================= */

.category-card {
    height: 100%;

    background: #fff;

    border: 1px solid #f0e5e5;

    transition: all 0.35s ease;

    overflow: hidden;
}


.category-card:hover {
    transform: translateY(-5px);

    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);

    border-color: #e0a4a4;
}


/* =========================================
   CATEGORY IMAGE
========================================= */

.category-card-img {
    width: 100%;

    height: 260px;

    overflow: hidden;

    background: #f8f4f4;
}


.category-card-img img {
    width: 100%;

    height: 100%;

    object-fit: cover;

    display: block;

    transition: transform 0.5s ease;
}


.category-card:hover .category-card-img img {
    transform: scale(1.05);
}


/* =========================================
   NO IMAGE
========================================= */

.category-no-image {
    width: 100%;

    height: 100%;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #faf5f5;

    color: #777;

    font-family: "Cormorant Garamond", serif;

    font-size: 20px;
}


/* =========================================
   CATEGORY NAME
========================================= */

.category-card-body {
    padding: 17px 10px;

    text-align: center;

    background: #fff;
}


.category-card-body h5 {
    margin: 0;

    font-family: "Cormorant Garamond", serif;

    font-size: 19px;

    font-weight: 500;

    color: #51555A;

    text-transform: capitalize;

    transition: color 0.3s ease;
}


.category-card:hover .category-card-body h5 {
    color: #e0a4a4;
}


/* =========================================
   SUBCATEGORIES
========================================= */

.category-subcategories {
    padding: 10px 15px 15px;

    border-top: 1px solid #f4eeee;

    text-align: center;
}


.subcategory-link {
    display: block;

    padding: 4px 0;

    color: #999;

    font-family: "Montserrat", sans-serif;

    font-size: 11px;

    text-decoration: none;

    transition: all 0.25s ease;
}


.subcategory-link:hover {
    color: #e0a4a4;

    padding-left: 3px;
}


/* =========================================
   MOBILE
========================================= */

@media (max-width: 767px) {

    .all-categories {
        padding-top: 20px;
    }


    .categories-main-title {
        font-size: 30px;
    }


    .categories-subtitle {
        font-size: 11px;
    }


    .menu-heading h3 {
        font-size: 23px;

        letter-spacing: 1.5px;
    }


    .category-card-img {
        height: 190px;
    }


    .category-card-body h5 {
        font-size: 17px;
    }


    .subcategory-link {
        font-size: 10px;
    }

}


/* =========================================
   SMALL MOBILE
========================================= */

@media (max-width: 480px) {

    .category-card-img {
        height: 160px;
    }

}

</style>

@endsection