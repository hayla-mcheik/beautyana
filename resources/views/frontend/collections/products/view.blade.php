@extends('layouts.app')

@section('title')
    {{ $product->meta_title }}
@endsection

@section('meta_keyword')
    {{ $product->meta_keyword }}
@endsection

@section('meta_description')
    {{ $product->meta_description }}
@endsection

@section('content')

    {{-- BREADCRUMB --}}
    @include('layouts.inc.frontend.breadcrumb', [
        'breadcrumbs' => [
            [
                'title' => 'Collections',
                'url' => url('/categories')
            ],
            [
                'title' => $category->name,
                'url' => url('/collections/' . $category->slug)
            ],
            [
                'title' => $product->name,
                'url' => '#'
            ]
        ]
    ])

    {{-- PRODUCT --}}
    <div>
        <livewire:frontend.product.view
            :category="$category"
            :product="$product"
        />
    </div>

@endsection