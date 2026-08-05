@extends('layouts.app')

@section('title','Book Appointment')

@section('content')

@include('layouts.inc.frontend.breadcrumb',[
'breadcrumbs'=>[
[
'title'=>'Book Appointment',
'url'=>'#'
]
]
])

<section class="appointment-page py-5">

<div class="container">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="appointment-card">

<div class="text-center mb-5">

<h1 class="appointment-title">
Book Appointment
</h1>

<p class="appointment-subtitle">
</p>

</div>

{{-- Paste the same appointment form here --}}

@include('frontend.appointment.form')

</div>

</div>

</div>

</div>

</section>

@endsection