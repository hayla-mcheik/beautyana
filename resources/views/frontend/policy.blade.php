@extends('layouts.app')
@section('title','Policy')

@section('content')

<!-- Dynamic Breadcrumb -->
@include('layouts.inc.frontend.breadcrumb', [
    'breadcrumbs' => [
        [
            'title' => 'Policy',
            'url' => '#'
        ]
    ]
])

<!--== Start Policy Area ==-->
<section class="policy-area">

    @if($policy)

        <div class="container">

            <div class="policy-page">

                <!-- Header -->
                <div class="policy-header">
          
                    <h1 class="policy-title">
                        {{ $policy->title ?? 'Policy' }}
                    </h1>

                    <div class="policy-line"></div>
                </div>

                <!-- Content -->
                <div class="policy-content">
                    {!! nl2br(e($policy->description)) !!}
                </div>

            </div>

        </div>

    @else

        <div class="container">
            <div class="policy-empty">
                <h3>Policy</h3>
                <p>
                    Policy content is currently being updated.
                </p>
            </div>
        </div>

    @endif

</section>
<!--== End Policy Area ==-->


<style>

    .policy-area {
        background: #fafafa;
        padding: 70px 0 90px;
    }

    .policy-page {
        margin: 0 auto;
        background: #ffffff;
        padding: 55px 70px;
        border: 1px solid #eeeeee;
    }

    /* Header */

    .policy-header {
        text-align: center;
        margin-bottom: 45px;
    }

    .policy-label {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 3px;
        color: #8b1e2d;
        margin-bottom: 12px;
        text-transform: uppercase;
    }

    .policy-title {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 42px;
        font-weight: 600;
        color: #222222;
        line-height: 1.2;
    }

    .policy-line {
        width: 55px;
        height: 2px;
        background: #8b1e2d;
        margin: 20px auto 0;
    }

    /* Content */

    .policy-content {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
        line-height: 1.9;
        color: #555555;
    }

    .policy-content p {
        margin-bottom: 20px;
    }

    .policy-content strong {
        color: #222222;
        font-weight: 600;
    }

    .policy-content h2,
    .policy-content h3,
    .policy-content h4 {
        color: #222222;
        font-weight: 600;
        margin-top: 35px;
        margin-bottom: 15px;
    }

    .policy-content h2 {
        font-size: 28px;
    }

    .policy-content h3 {
        font-size: 24px;
    }

    .policy-content h4 {
        font-size: 20px;
    }

    .policy-content ul,
    .policy-content ol {
        margin: 15px 0 25px;
        padding-left: 25px;
    }

    .policy-content li {
        margin-bottom: 8px;
    }

    /* Empty */

    .policy-empty {
        max-width: 700px;
        margin: 0 auto;
        padding: 70px 30px;
        text-align: center;
        background: #ffffff;
        border: 1px solid #eeeeee;
    }

    .policy-empty h3 {
        margin-bottom: 10px;
        font-size: 28px;
        color: #222222;
    }

    .policy-empty p {
        margin: 0;
        color: #777777;
    }

    /* Tablet */

    @media (max-width: 991px) {

        .policy-area {
            padding: 55px 0 70px;
        }

        .policy-page {
            padding: 45px 45px;
        }

        .policy-title {
            font-size: 36px;
        }

    }

    /* Mobile */

    @media (max-width: 767px) {

        .policy-area {
            padding: 40px 0 55px;
        }

        .policy-page {
            padding: 35px 22px;
        }

        .policy-header {
            margin-bottom: 35px;
        }

        .policy-title {
            font-size: 32px;
        }

        .policy-content {
            font-size: 15px;
            line-height: 1.8;
        }

        .policy-content h2 {
            font-size: 25px;
        }

        .policy-content h3 {
            font-size: 22px;
        }

    }

    @media (max-width: 480px) {

        .policy-page {
            padding: 30px 18px;
        }

        .policy-title {
            font-size: 28px;
        }

        .policy-label {
            font-size: 10px;
            letter-spacing: 2px;
        }

    }

</style>

@endsection