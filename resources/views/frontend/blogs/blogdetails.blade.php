@extends('layouts.app')

@section('title', 'Blog Details Page')

@section('content')

@php
    $breadcrumbs = [
        [
            'title' => 'News',
            'url'   => url('/blogs')
        ],
        [
            'title' => $blog->title,
            'url'   => '#'
        ]
    ];
@endphp

{{-- Breadcrumb --}}
@include('layouts.inc.frontend.breadcrumb', ['breadcrumbs' => $breadcrumbs])


<!--== Start Blog Area Wrapper ==-->
<section class="blog-area blog-single-area">

    <div class="container">

        <div class="row">

            {{-- Sidebar --}}
            <div class="col-lg-4 order-1 order-lg-1">

                <!--== Start Sidebar Area ==-->
                <div class="sidebar-area inner-left-padding">

                    {{-- Sidebar content if you have any --}}

                </div>
                <!--== End Sidebar Area -->

            </div>


            {{-- Blog Content --}}
            <div class="col-lg-8 order-0 order-lg-2">

                <div class="row">

                    <div class="col-12">

                        <!--== Start Blog Item ==-->
                        <div class="post-single-item">

                            {{-- Blog Image --}}
                            <div class="thumb">

                                <img
                                    src="{{ asset($blog->image) }}"
                                    class="img"
                                    alt="{{ $blog->title }}"
                                >

                            </div>


                            {{-- Blog Content --}}
                            <div class="content">

                                <div class="meta">

                                    <ul>

                                        <li>
                                            <a class="date">
                                                {{ $blog->date }}
                                            </a>
                                        </li>

                                    </ul>

                                </div>


                                <h2 class="title">
                                    {{ $blog->title }}
                                </h2>


                                <p class="p-text1">
                                    {{ $blog->description }}
                                </p>

                            </div>

                        </div>
                        <!--== End Blog Item ==-->

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!--== End Blog Area Wrapper ==-->

@endsection