@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Profit </h4>
    
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="row mb-4">

        {{-- Total Products --}}
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Total Products</p>
                            <h3 class="mb-0">
                                {{ $products->count() }}
                            </h3>
                        </div>

                        <div class="icon-box">
                            <i class="fa fa-box"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Stock --}}
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Total Stock</p>
                            <h3 class="mb-0">
                                {{ $products->sum('quantity') }}
                            </h3>
                        </div>

                        <div class="icon-box">
                            <i class="fa fa-cubes"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Initial Cost --}}
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Stock Cost</p>
                            <h3 class="mb-0">
                                ${{ number_format($totalStockCost, 2) }}
                            </h3>
                        </div>

                        <div class="icon-box">
                            <i class="fa fa-money"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Potential Profit --}}
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Potential Profit</p>
                            <h3 class="mb-0 text-success">
                                ${{ number_format($totalPotentialProfit, 2) }}
                            </h3>
                        </div>

                        <div class="icon-box">
                            <i class="fa fa-line-chart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- Profit Table --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">
            <h5 class="mb-0">
                Product Profit
            </h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Initial Cost</th>
                            <th>Selling Price</th>
                            <th>Profit / Item</th>
                            <th>Stock</th>
                            <th>Potential Profit</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($products as $product)

                            @php
                                $profitPerItem =
                                    (float) $product->selling_price -
                                    (float) $product->initial_cost;

                                $potentialProfit =
                                    $profitPerItem *
                                    (int) $product->quantity;
                            @endphp

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <div class="d-flex align-items-center">

                                        @if($product->productImages->first())
                                            <img
                                                src="{{ asset('storage/' . $product->productImages->first()->image) }}"
                                                alt="{{ $product->name }}"
                                                width="50"
                                                height="50"
                                                style="object-fit: cover; border-radius: 6px;"
                                                class="me-2"
                                            >
                                        @endif

                                        <div>
                                            <strong>
                                                {{ $product->name }}
                                            </strong>

                                            @if($product->category)
                                                <small class="d-block text-muted">
                                                    {{ $product->category->name }}
                                                </small>
                                            @endif
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    ${{ number_format((float) $product->initial_cost, 2) }}
                                </td>

                                <td>
                                    ${{ number_format((float) $product->selling_price, 2) }}
                                </td>

                                <td>
                                    @if($profitPerItem > 0)
                                        <span class="text-success fw-bold">
                                            +${{ number_format($profitPerItem, 2) }}
                                        </span>
                                    @elseif($profitPerItem < 0)
                                        <span class="text-danger fw-bold">
                                            -${{ number_format(abs($profitPerItem), 2) }}
                                        </span>
                                    @else
                                        <span class="text-muted">
                                            $0.00
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $product->quantity }}
                                </td>

                                <td>
                                    @if($potentialProfit > 0)
                                        <span class="text-success fw-bold">
                                            +${{ number_format($potentialProfit, 2) }}
                                        </span>
                                    @elseif($potentialProfit < 0)
                                        <span class="text-danger fw-bold">
                                            -${{ number_format(abs($potentialProfit), 2) }}
                                        </span>
                                    @else
                                        <span class="text-muted">
                                            $0.00
                                        </span>
                                    @endif
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <p class="text-muted mb-0">
                                        No products found.
                                    </p>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

@endsection