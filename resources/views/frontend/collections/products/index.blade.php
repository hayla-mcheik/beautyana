@extends('layouts.app')

@php
    $breadcrumbs = [];

    // 1. Menu Level
    if (isset($category->menu)) {
        $breadcrumbs[] = [
            'title' => $category->menu->name,
            'url'   => url('/collections/' . $category->menu->slug)
        ];
    }

    // 2. Parent Category Level (if applicable)
    if (isset($category->parent)) {
        $breadcrumbs[] = [
            'title' => $category->parent->name,
            'url'   => url('/collections/' . ($category->menu->slug ?? 'all') . '/' . $category->parent->slug)
        ];
    }

    // 3. Current Category
    $breadcrumbs[] = [
        'title' => $category->name,
        'url'   => '#'
    ];
@endphp

@section('content')

@include('layouts.inc.frontend.breadcrumb', ['breadcrumbs' => $breadcrumbs])

<livewire:frontend.product.index
    :category="$category"
    :collections="$collections"
    :highJewelry="$highJewelry"
    :adSignature="$adSignature"
    :inStockCount="$inStockCount"
    :outOfStockCount="$outOfStockCount"
/>

@endsection