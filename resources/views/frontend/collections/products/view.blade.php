@extends('layouts.app')

@php
    $breadcrumbs = [];

    if (isset($category)) {
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

        // 3. Category Level
        $breadcrumbs[] = [
            'title' => $category->name,
            'url'   => url('/collections/' . ($category->menu->slug ?? 'all') . '/' . $category->slug)
        ];
    }

    // 4. Product Name
    if (isset($product)) {
        $breadcrumbs[] = [
            'title' => $product->name,
            'url'   => '#'
        ];
    }
@endphp

@section('content')

@include('layouts.inc.frontend.breadcrumb', ['breadcrumbs' => $breadcrumbs])

<div>
    <livewire:frontend.product.view :category="$category" :product="$product" />
</div>

@endsection