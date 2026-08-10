@extends('layouts.app')

@section('title', 'All Categories')

@section('content')

@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'All Categories',
            'url'   => '#'
        ]
    ]
])

<div class="all-categories pt-5">
    <div class="container pt-5 pb-5">
        <div class="row pt-5">
            <div class="col-md-12">
                <h4 class="mb-4 mt-5">Our Categories</h4>
            </div>

            @forelse($categories as $categoryItem)
                <div class="col-6 col-md-4 mt-4 pb-4">
                    <div class="category-card">
                        <a href="{{ url('/collections/' . $categoryItem->slug) }}">
                            <div class="category-card-img">
                                <img src="{{ asset($categoryItem->image) }}" class="w-100" alt="{{ $categoryItem->name }}">
                            </div>
                            <div class="category-card-body pt-2 pb-2 d-flex justify-content-center align-items-center">
                                <h5>{{ $categoryItem->name }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <h5>No Categories Available</h5>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection