@extends('layouts.app')

@section('title', 'Categories')

@section('content')

{{-- Breadcrumb --}}
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'Collections',
            'url'   => '#'
        ]
    ]
])

<section class="all-categories-section">
    <div class="container">

        {{-- Page Title --}}
        <div class="categories-heading text-center">
            <span class="categories-eyebrow">Discover</span>

            <h1>Our Collections</h1>

            <p>
                Explore our collections and discover pieces created
                to complement your style.
            </p>
        </div>

        {{-- MENUS --}}
        @forelse($menus as $menu)

            <div class="menu-collection-section">

                {{-- Menu Title --}}
                <div class="menu-title-wrapper">
                    <div class="menu-title-line"></div>
                    <h2>{{ $menu->name }}</h2>
                    <div class="menu-title-line"></div>
                </div>

                {{-- Categories --}}
                @if($menu->categories->count())

                    <div class="row g-4">

                        @foreach($menu->categories as $category)

                            <div class="col-6 col-md-4 col-lg-3">

                                <div class="category-card">

                                    {{-- Category Image --}}
                                <a href="{{ url('/collections/' . $category->slug) }}">
                                       class="category-card-image">

                                        @if($category->image)
                                            <img
                                                src="{{ asset($category->image) }}"
                                                alt="{{ $category->name }}"
                                            >
                                        @else
                                            <div class="category-placeholder">
                                                <span>{{ $category->name }}</span>
                                            </div>
                                        @endif

                                    </a>

                                    {{-- Category Content --}}
                                    <div class="category-card-content">

                                        <h3>
                                  <a href="{{ url('/collections/' . $category->slug) }}">
                                                {{ $category->name }}
                                            </a>
                                        </h3>

                                  

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="no-category-message">
                        <p>
                            No categories available in {{ $menu->name }}.
                        </p>
                    </div>

                @endif

            </div>

        @empty

            <div class="no-category-message text-center">
                <p>No collections available.</p>
            </div>

        @endforelse

    </div>
</section>

<style>

/* ============================================================
   COLLECTIONS PAGE
============================================================ */

.all-categories-section {
    padding: 80px 0;
    background: #ffffff;
}

/* ============================================================
   PAGE HEADING
============================================================ */

.categories-heading {
    margin-bottom: 70px;
}

.categories-eyebrow {
    display: block;
    margin-bottom: 10px;
    font-size: 11px;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: #e0a4a4;
}

.categories-heading h1 {
    margin: 0;
    font-family: "Playfair Display", serif;
    font-size: 42px;
    font-weight: 500;
    color: #333;
}

.categories-heading p {
    max-width: 550px;
    margin: 15px auto 0;
    font-size: 14px;
    line-height: 1.8;
    color: #777;
}

/* ============================================================
   MENU SECTION
============================================================ */

.menu-collection-section {
    margin-bottom: 80px;
}

/* ============================================================
   MENU TITLE
============================================================ */

.menu-title-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    margin-bottom: 35px;
}

.menu-title-wrapper h2 {
    margin: 0;
    font-family: "Playfair Display", serif;
    font-size: 28px;
    font-weight: 500;
    color: #333;
    text-transform: capitalize;
    white-space: nowrap;
}

.menu-title-line {
    width: 60px;
    height: 1px;
    background: #e0a4a4;
}

/* ============================================================
   CATEGORY CARD
============================================================ */

.category-card {
    height: 100%;
    background: #fff;
    border: 1px solid #f0e4e4;
    transition: all 0.3s ease;
    overflow: hidden;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
}

/* ============================================================
   CATEGORY IMAGE
============================================================ */

.category-card-image {
    display: block;
    width: 100%;
    height: 280px;
    overflow: hidden;
    background: #f8f4f4;
}

.category-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}

.category-card:hover .category-card-image img {
    transform: scale(1.05);
}

/* ============================================================
   IMAGE PLACEHOLDER
============================================================ */

.category-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #faf5f5;
    color: #888;
    font-family: "Playfair Display", serif;
    font-size: 20px;
}

/* ============================================================
   CARD CONTENT
============================================================ */

.category-card-content {
    padding: 20px;
}

.category-card-content h3 {
    margin: 0 0 12px;
    font-family: "Playfair Display", serif;
    font-size: 20px;
    font-weight: 500;
    text-transform: capitalize;
}

.category-card-content h3 a {
    color: #333;
    text-decoration: none;
    transition: color 0.3s ease;
}

.category-card-content h3 a:hover {
    color: #e0a4a4;
}

/* ============================================================
   SUBCATEGORIES
============================================================ */

.subcategory-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.subcategory-list li {
    margin-bottom: 6px;
}

.subcategory-list li a {
    position: relative;
    padding-left: 12px;
    font-size: 12px;
    color: #888;
    text-decoration: none;
    transition: all 0.3s ease;
}

.subcategory-list li a::before {
    content: "—";
    position: absolute;
    left: 0;
    color: #e0a4a4;
}

.subcategory-list li a:hover {
    color: #e0a4a4;
    padding-left: 16px;
}

/* ============================================================
   EMPTY
============================================================ */

.no-category-message {
    padding: 30px;
    text-align: center;
    color: #999;
    font-size: 14px;
}

/* ============================================================
   MOBILE
============================================================ */

@media (max-width: 768px) {
    .all-categories-section {
        padding: 50px 0;
    }

    .categories-heading {
        margin-bottom: 45px;
    }

    .categories-heading h1 {
        font-size: 32px;
    }

    .categories-heading p {
        font-size: 13px;
    }

    .menu-collection-section {
        margin-bottom: 55px;
    }

    .menu-title-wrapper {
        gap: 12px;
    }

    .menu-title-wrapper h2 {
        font-size: 23px;
    }

    .menu-title-line {
        width: 35px;
    }

    .category-card-image {
        height: 220px;
    }

    .category-card-content {
        padding: 15px;
    }

    .category-card-content h3 {
        font-size: 17px;
    }
}

</style>

@endsection