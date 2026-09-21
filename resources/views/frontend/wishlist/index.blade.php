@extends('layouts.app')
@section('title','Wishlist')

@section('content')
<!-- Dynamic Breadcrumb -->
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'Wishlist',
            'url' => '#'
        ]
    ]
]);

<livewire:frontend.wishlist-show />
@endsection