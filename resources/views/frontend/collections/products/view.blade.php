@extends('layouts.app')

@section('title', $category->name)

@php

$breadcrumbs = [

    [
        'title' => 'Collections',
        'url' => url('/collections')
    ],

    [
        'title' => $category->name,
        'url' => url('/collections/' . $category->slug)
    ],

    [
        'title' => $product->name,
        'url' => '#'
    ]

];

@endphp

@section('content')

@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => $breadcrumbs
])

<div>
    <livewire:frontend.product.view
        :category="$category"
        :product="$product"
    />
</div>

@endsection