@extends('layouts.app')

@php

    $breadcrumbs = [];

    /*
    |--------------------------------------------------------------------------
    | MENU
    |--------------------------------------------------------------------------
    */

    $menu = null;

    // Get the Menu through menu_id instead of relying directly
    // on $category->menu
    if (!empty($category->menu_id)) {
        $menu = \App\Models\Menu::find($category->menu_id);
    }

    if ($menu) {
        $breadcrumbs[] = [
            'title' => $menu->name,
            'url'   => url('/collections/' . $menu->slug),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | PARENT CATEGORY
    |--------------------------------------------------------------------------
    */

    $parentCategory = null;

    if (!empty($category->parent_id)) {
        $parentCategory = \App\Models\Category::find(
            $category->parent_id
        );
    }

    if ($parentCategory) {

        $breadcrumbs[] = [
            'title' => $parentCategory->name,

            'url' => $menu
                ? url(
                    '/collections/' .
                    $menu->slug .
                    '/' .
                    $parentCategory->slug
                )
                : url(
                    '/collections/' .
                    $parentCategory->slug
                ),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | CURRENT CATEGORY
    |--------------------------------------------------------------------------
    */

    $breadcrumbs[] = [
        'title' => $category->name,
        'url'   => '#',
    ];

@endphp


@section('content')

    @include(
        'layouts.inc.frontend.breadcrumb',
        ['breadcrumbs' => $breadcrumbs]
    )


    <livewire:frontend.product.index
        :category="$category"
        :collections="$collections"
        :highJewelry="$highJewelry"
        :adSignature="$adSignature"
        :inStockCount="$inStockCount"
        :outOfStockCount="$outOfStockCount"
    />

@endsection