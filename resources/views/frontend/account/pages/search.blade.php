@extends('layouts.app')

@section('title','Search Products')
@section('content')
<div class="page-header-area bg-img" data-bg-img="{{ asset('assets/img/bg-02.webp') }}">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <div class="page-header-content">
          <nav class="breadcrumb-area">
            <ul class="breadcrumb">
              <li><a href="{{ url('/') }}">Home</a></li>
              <li class="breadcrumb-sep"><i class="fa fa-angle-right"></i></li>
              <li>Search Results</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="py-5 bg-white">
  <div class="container">
    <div class="row justify-content-center">

@forelse ($searchProducts as $productItem)
<div class="col-sm-6 col-md-3 mt-5 mb-5">
  <!--== Start Shop Item ==-->
  <div class="product-item">
    <div class="inner-content">
      <div class="product-thumb">

          @if($productItem->productImages->count() > 0)    
          <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
              <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
              @if($productItem->productImages->count() > 1)
                  <img class="second-image" src="{{ asset($productItem->productImages[1]->image) }}" alt="{{ $productItem->name }}">
              @endif
          </a>
      @endif


        <ul class="product-flag">
          <li class="new">
            @if ($productItem->quantity > 0)
            <span>In Stock</span>
        @else
          Out of Stock
        @endif</li>
          <li class="discount">-10%</li>
        </ul>
      </div>
      <div class="product-desc">
          <div class="product-info">
            <h4 class="title"><a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">{{ $productItem->small_description }}</a></h4>
      
          <div class="prices">
              @if($productItem->original_price)
                  <span class="price-old">${{ $productItem->original_price }}</span>
              @endif
              <span class="price">${{ $productItem->selling_price }}</span>
          </div>

          </div>

        </div>                          </div>
  </div>
  <!--== End Shop Item ==-->
</div>


@empty

<div class="col-md-12 p-2">
                        <h4>No such Products Found</h4>
</div>

@endforelse

<div class="col-md-10">
    {{ $searchProducts->appends(request()->input())->links() }}
</div>

</div>
</div>
</div>
@endsection