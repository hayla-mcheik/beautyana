@extends('layouts.app')
@section('title','Cart List')

@section('content')
<!-- Dynamic Breadcrumb -->
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'Cart',
            'url' => '#'
        ]
    ]
]);

<livewire:frontend.cart.cart-show/>

@endsection