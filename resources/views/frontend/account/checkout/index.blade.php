@extends('layouts.app')
@section('title','Checkout')

@section('content')

<!-- Dynamic Breadcrumb -->
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'Checkout',
            'url' => '#'
        ]
    ]
]);

<livewire:frontend.checkout.checkout-show />
@endsection