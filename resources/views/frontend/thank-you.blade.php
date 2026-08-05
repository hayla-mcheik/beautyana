@extends('layouts.app')

@section('title', 'Order Confirmed')

@section('content')

<!-- Dynamic Breadcrumb -->
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'Order Confirmation',
            'url' => '#'
        ]
    ]
])

<div class="py-5">
    <div class="container">

        @if(session('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body text-center p-5">

                        <!-- Success Icon -->
                        <div class="mb-4">
                            <div class="success-icon mx-auto">
                                <i class="fa fa-check"></i>
                            </div>
                        </div>

                        <h2 class="fw-bold mb-3 text-dark">
                            Thank You for Your Order!
                        </h2>

                        <p class="text-muted fs-5 mb-2">
                            Your order has been placed successfully.
                        </p>

                        <p class="text-muted mb-4">
                            We've received your order and will begin processing it shortly.
                            A confirmation email will be sent to you with your order details.
                        </p>

                        <hr>

                        <div class="row mt-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <a href="{{ url('/categories') }}" class="btn btn-outline-dark w-100 py-2">
                                    Continue Shopping
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ url('/') }}" class="btn btn-promocode-apply w-100 py-2">
                                    Back to Home
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<style>
.success-icon{
    width:90px;
    height:90px;
    border-radius:50%;
    background:#28a745;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:40px;
    box-shadow:0 10px 25px rgba(40,167,69,.25);
}
</style>

@endsection