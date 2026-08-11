@extends('layouts.app')

@php

$breadcrumbs = [];


/*
|--------------------------------------------------------------------------
| CATEGORY BREADCRUMBS
|--------------------------------------------------------------------------
*/

if (isset($category)) {

    /*
    |--------------------------------------------------------------------------
    | Get Menu
    |--------------------------------------------------------------------------
    */

    $menu = null;

    if (!empty($category->menu_id)) {
        $menu = \App\Models\Menu::find($category->menu_id);
    }


    /*
    |--------------------------------------------------------------------------
    | Add Menu
    |--------------------------------------------------------------------------
    */

    if ($menu) {

        $breadcrumbs[] = [
            'title' => $menu->name,
            'url'   => url('/collections/' . $menu->slug),
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Build Category Hierarchy
    |--------------------------------------------------------------------------
    */

    $categoryHierarchy = [];

    $currentCategory = $category;

    while ($currentCategory) {

        $categoryHierarchy[] = $currentCategory;

        if (!empty($currentCategory->parent_id)) {

            $currentCategory =
                \App\Models\Category::find(
                    $currentCategory->parent_id
                );

        } else {

            $currentCategory = null;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Reverse hierarchy
    |--------------------------------------------------------------------------
    |
    | Example:
    |
    | Rings
    |   ↓
    | Jewelry
    |
    | becomes:
    |
    | Jewelry → Rings
    |
    */

    $categoryHierarchy = array_reverse(
        $categoryHierarchy
    );


    /*
    |--------------------------------------------------------------------------
    | Add Categories
    |--------------------------------------------------------------------------
    */

    foreach ($categoryHierarchy as $categoryItem) {

        $categoryUrl = $menu
            ? url(
                '/collections/' .
                $menu->slug .
                '/' .
                $categoryItem->slug
            )
            : url(
                '/collections/' .
                $categoryItem->slug
            );


        $breadcrumbs[] = [
            'title' => $categoryItem->name,
            'url'   => $categoryUrl,
        ];
    }
}


/*
|--------------------------------------------------------------------------
| PRODUCT
|--------------------------------------------------------------------------
*/

if (isset($product)) {

    $breadcrumbs[] = [
        'title' => $product->name,
        'url'   => '#',
    ];
}

@endphp


@section('content')

    @include(
        'layouts.inc.frontend.breadcrumb',
        ['breadcrumbs' => $breadcrumbs]
    )

@endsection