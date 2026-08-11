@extends('layouts.app')

@section('title', 'Blogs Page')

@section('content')

@php
    $breadcrumbs = [
        [
            'title' => 'News',
            'url'   => '#'
        ]
    ];
@endphp

{{-- Breadcrumb --}}
@include('layouts.inc.frontend.breadcrumb', ['breadcrumbs' => $breadcrumbs])


<!--== Start Blog Area Wrapper ==-->
<section class="blog-area">

    <div class="container pb-80">

        <div class="row">

            @forelse($blogs as $blog)

                <div class="col-sm-6 col-lg-4">

                    <!--== Start Blog Item ==-->
                    <div class="post-item">

                        <div class="inner-content mb-70 mb-md-30">

                            {{-- Image --}}
                            <div class="thumb">

                                <a href="{{ url('blog/details/' . $blog->id) }}">

                                    <img
                                        src="{{ asset($blog->image) }}"
                                        class="img"
                                        alt="{{ $blog->title }}"
                                    >

                                </a>

                            </div>


                            {{-- Content --}}
                            <div class="content">

                                <h4 class="title">

                                    <a href="{{ url('blog/details/' . $blog->id) }}">

                                        {{ $blog->title }}

                                    </a>

                                </h4>

                            </div>

                        </div>

                    </div>
                    <!--== End Blog Item ==-->

                </div>

            @empty

                <div class="col-12">

                    <p>No Blogs Available</p>

                </div>

            @endforelse

        </div>

    </div>

</section>
<!--== End Blog Area Wrapper ==-->

@endsection