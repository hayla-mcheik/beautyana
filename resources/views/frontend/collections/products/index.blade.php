@extends('layouts.app')

@section('title', $category->name)

@php

$breadcrumbs = [

    [
        'title' => 'Collections',
        'url' => url('/collections')
    ]
];

$breadcrumbs[] = [

    'title' => $category->name,
    'url' => '#'
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