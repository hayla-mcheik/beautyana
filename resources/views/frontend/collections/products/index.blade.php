@extends('layouts.app')
@section('title')
{{ $category->meta_title }}
@endsection

@section('meta_keyword')
{{ $category->meta_keyword }}
@endsection

@section('meta_description')
{{ $category->meta_description }}
@endsection

@section('content')
<style>
   .product-item{
  margin-bottom: 10px;
 }
 
</style>

@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => $category->menu,
            'url' => url('/categories')
        ],
        [
            'title' => $category->name,
            'url' => '#'
        ]
    ]
])
<livewire:frontend.product.index 
    :category="$category" 
    :collections="$collections" 
    :accessories="$accessories" 
    :onSale="$onSale" 
    :inStockCount="$inStockCount" 
    :outOfStockCount="$outOfStockCount" 
/>
      


@endsection