@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

@php
    $breadcrumbs = [
        [
            'title' => 'Contact Us',
            'url'   => '#'
        ]
    ];
@endphp

{{-- Breadcrumb --}}
@include('layouts.inc.frontend.breadcrumb', ['breadcrumbs' => $breadcrumbs])


<!--== Start Contact Area Wrapper ==-->
<section class="contact-area contact-page-area">

    <div class="container">

        <div class="row contact-page-wrapper">

            <div class="col-lg-6">

                <div class="contact-form-wrap">

                    <div class="contact-form-title">

                        <h5 class="sub-title">
                            Don't worry!
                        </h5>

                        <h2 class="title">
                            If you have any query? Contact with us.
                        </h2>

                    </div>


                    {{-- Validation Errors --}}
                    @if ($errors->any())

                        <div class="alert alert-danger mb-4">

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- Success Message --}}
                    @if (session('success'))

                        <div class="alert alert-success mb-4">

                            {{ session('success') }}

                        </div>

                    @endif


                    <!--== Start Contact Form ==-->
                    <div class="contact-form">

                        <form
                            id="contact-form"
                            action="{{ url('contact/submit') }}"
                            method="POST"
                        >

                            @csrf

                            {{-- Your existing contact form fields go here --}}

                        </form>

                    </div>
                    <!--== End Contact Form -->


                </div>

            </div>


            {{-- Contact Information --}}
            <div class="col-lg-6">

                <div class="contact-info">

                    {{-- Email --}}
                    <div class="info-item">

                        <div class="info">

                            <h5 class="title">
                                Email:
                            </h5>

                            <p>

                                <a href="mailto:{{ $appSetting->email1 ?? 'info@beautyana.com' }}">

                                    {{ $appSetting->email1 ?? 'info@beautyana.com' }}

                                </a>

                                @if($appSetting->email2)

                                    <br>

                                    <a href="mailto:{{ $appSetting->email2 }}">

                                        {{ $appSetting->email2 }}

                                    </a>

                                @endif

                            </p>

                        </div>

                    </div>


                    {{-- Address --}}
                    <div class="info-item">

                        <div class="info">

                            <h5 class="title">
                                Address:
                            </h5>

                            <p>

                                {!! nl2br(
                                    e(
                                        $appSetting->address
                                        ??
                                        "PH trading SARL\nMansourieh Maten, main street"
                                    )
                                ) !!}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!--== End Contact Area Wrapper ==-->

@endsection