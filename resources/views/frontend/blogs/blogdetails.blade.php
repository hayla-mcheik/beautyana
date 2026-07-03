@extends('layouts.app')
@section('title','Blog Details Page')
@section('content')
  <!-- Dynamic Breadcrumb -->
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'Event Details',
            'url' => '#'
        ]
    ]
]);
  
      <!--== Start Blog Area Wrapper ==-->
      <section class="blog-area blog-single-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 order-1 order-lg-1">
              <!--== Start Sidebar Area ==-->
              <div class="sidebar-area inner-left-padding">
   
<div class="widget-item">
    <div class="widget-title">
        <h3 class="title">Recent Posts</h3>
    </div>
    <div class="widget-body">
        <div class="widget-blog-post">
            <ul>
                @foreach($latestBlogs as $latestItem)
                <li>
                    <div class="thumb">
                        <a href="{{ url('blog/details/' . $latestItem->id)}}">
                            <img src="{{ asset($latestItem->image) }}" alt="Image-HasTech">
                        </a>
                    </div>
                    <div class="content">
                        <span>{{ $latestItem->date }}</span>
                        <h4>
                            <a href="{{ url('blog/details/' . $latestItem->id)}}">{{ $latestItem->title }}</a>
                        </h4>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

              </div>
              <!--== End Sidebar Area ==-->
            </div>
            <div class="col-lg-8 order-0 order-lg-2">
              <div class="row">
                <div class="col-12">
                  <!--== Start Blog Item ==-->
                  <div class="post-single-item">
                    <div class="thumb">
                      <img src="{{ asset($blog->image) }}" class="img" alt="Image-HasTech">
                    </div>
                    <div class="content">
                      <div class="meta">
                        <ul>
                          <li><a class="date">{{ $blog->date }}</a></li>
                        </ul>
                      </div>
                      <h2 class="title">{{$blog->title }}</h2>
                      <p class="p-text1">{{ $blog->description }}</p>
                      @if($blog->images->count())

    <div class="blog-gallery mt-5">

        <div class="section-title mb-4">
            <h3>Gallery</h3>
        </div>

        <div class="row g-4">

            @foreach($blog->images as $gallery)

                <div class="col-lg-4 col-md-6">

                    <a href="{{ asset($gallery->image) }}"
                       target="_blank"
                       class="gallery-item">

                        <img
                            src="{{ asset($gallery->image) }}"
                            alt="Gallery Image"
                            class="img-fluid">

                    </a>

                </div>

            @endforeach

        </div>

    </div>

@endif
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