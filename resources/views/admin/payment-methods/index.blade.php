@extends('layouts.admin')

@section('content')

<div class="content-wrapper">

    <div class="row">

        <div class="col-md-8 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Payment Methods
                    </h4>

                    <p class="card-description">
                        Enable or disable the payment methods available during checkout.
                    </p>

                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form
                        action="{{ route('admin.payment-methods.update') }}"
                        method="POST"
                    >

                        @csrf

                        {{-- COD --}}
                        <div class="d-flex justify-content-between align-items-center border-bottom py-4">

                            <div>
                                <h5 class="mb-1">
                                    Cash on Delivery (COD)
                                </h5>

                                <p class="text-muted mb-0">
                                    Allow customers to pay when they receive their order.
                                </p>
                            </div>

                            <div class="form-check form-switch">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="cod_enabled"
                                    value="1"
                                    id="cod_enabled"
                                    {{ $settings?->cod_enabled ? 'checked' : '' }}
                                >

                                <label
                                    class="form-check-label"
                                    for="cod_enabled"
                                >
                                    {{ $settings?->cod_enabled ? 'Enabled' : 'Disabled' }}
                                </label>

                            </div>

                        </div>


                        {{-- Wish Money --}}
                        <div class="d-flex justify-content-between align-items-center py-4">

                            <div>
                                <h5 class="mb-1">
                                    Wish Money
                                </h5>

                                <p class="text-muted mb-0">
                                    Allow customers to pay using Wish Money.
                                </p>
                            </div>

                            <div class="form-check form-switch">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="wish_money_enabled"
                                    value="1"
                                    id="wish_money_enabled"
                                    {{ $settings?->wish_money_enabled ? 'checked' : '' }}
                                >

                                <label
                                    class="form-check-label"
                                    for="wish_money_enabled"
                                >
                                    {{ $settings?->wish_money_enabled ? 'Enabled' : 'Disabled' }}
                                </label>

                            </div>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-primary mt-3"
                        >
                            Save Payment Methods
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection