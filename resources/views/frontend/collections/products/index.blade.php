@extends('layouts.app')

@section('title', $category->name)

@php
    /*
    |--------------------------------------------------------------------------
    | BREADCRUMBS SETUP
    |--------------------------------------------------------------------------
    */
    $breadcrumbs = [];

    // 1. MENU LEVEL
    $menu = $category->menu ?? null;

    if ($menu) {
        $breadcrumbs[] = [
            'title' => $menu->name,
            'url'   => url('/collections/' . $menu->slug),
        ];
    }

    // 2. PARENT CATEGORY LEVEL (If present)
    $parentCategory = $category->parent ?? null;

    if ($parentCategory) {
        $breadcrumbs[] = [
            'title' => $parentCategory->name,
            'url'   => $menu
                ? url('/collections/' . $menu->slug . '/' . $parentCategory->slug)
                : url('/collections/' . $parentCategory->slug),
        ];
    }

    // 3. CURRENT ACTIVE CATEGORY
    $breadcrumbs[] = [
        'title' => $category->name,
        'url'   => '#',
    ];
@endphp

@section('content')

{{-- ============================================================
     BREADCRUMB
============================================================ --}}
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => $breadcrumbs
])

{{-- ============================================================
     PRODUCTS LISTING
============================================================ --}}
<livewire:frontend.product.index
    :category="$category"
    :menus="$menus"
    :inStockCount="$inStockCount"
    :outOfStockCount="$outOfStockCount"
/>

@endsection