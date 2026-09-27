<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Invoice #{{ $order->id }}</title>

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, sans-serif;
            color: #222;
            background: #fff;
        }

        body {
            padding: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        td,
        th {
            font-family: DejaVu Sans, sans-serif;
        }

        .header {
            width: 100%;
            margin-bottom: 25px;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 4px;
            color: #111;
        }

        .tagline {
            font-size: 11px;
            letter-spacing: 2px;
            color: #b08d57;
            margin-top: 5px;
        }

        .invoice-title {
            text-align: right;
        }

        .invoice-title h1 {
            margin: 0;
            font-size: 25px;
            color: #111;
        }

        .invoice-title p {
            margin: 5px 0 0;
            font-size: 12px;
            color: #777;
        }

        .thank-you {
            background: #faf8f3;
            border: 1px solid #e8e1d5;
            padding: 20px;
            margin-bottom: 25px;
            text-align: center;
        }

        .thank-you h2 {
            margin: 0 0 8px;
            font-size: 21px;
            color: #111;
        }

        .thank-you p {
            margin: 0;
            font-size: 12px;
            color: #666;
            line-height: 20px;
        }

        .section-title {
            font-size: 15px;
            font-weight: bold;
            color: #111;
            margin-bottom: 10px;
        }

        .details-table {
            border: 1px solid #e5e5e5;
            margin-bottom: 25px;
        }

        .details-table td {
            border: 1px solid #e5e5e5;
            padding: 9px;
            font-size: 11px;
        }

        .details-label {
            background: #fafafa;
            color: #777;
            font-weight: bold;
            width: 18%;
        }

        .details-value {
            width: 32%;
        }

        .items-table {
            border: 1px solid #ddd;
            margin-top: 10px;
        }

        .items-table th {
            background: #111;
            color: #fff;
            padding: 10px 8px;
            font-size: 11px;
            text-align: left;
        }

        .items-table td {
            border: 1px solid #e5e5e5;
            padding: 9px 8px;
            font-size: 11px;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .product-name {
            font-weight: bold;
            color: #222;
        }

        .variant {
            display: block;
            margin-top: 3px;
            font-size: 9px;
            color: #777;
        }

        .summary {
            width: 45%;
            margin-left: auto;
            margin-top: 15px;
        }

        .summary td {
            padding: 8px;
            font-size: 11px;
            border-bottom: 1px solid #eee;
        }

        .summary-label {
            color: #666;
            text-align: left;
        }

        .summary-value {
            text-align: right;
            font-weight: bold;
        }

        .grand-total td {
            padding-top: 12px;
            padding-bottom: 12px;
            font-size: 14px;
            font-weight: bold;
            border-top: 2px solid #111;
            border-bottom: none;
            color: #111;
        }

        .shipping {
            color: #555;
        }

        .footer {
            margin-top: 35px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            text-align: center;
        }

        .footer p {
            margin: 3px 0;
            font-size: 10px;
            color: #888;
        }

        .footer strong {
            color: #222;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <table class="header">
        <tr>
            <td style="border:none; width:50%; vertical-align:top;">

                <div class="logo">
                    Beautyana
                </div>

            </td>

            <td
                style="
                    border:none;
                    width:50%;
                    vertical-align:top;
                    text-align:right;
                "
            >

                <div class="invoice-title">

                    <h1>
                        INVOICE
                    </h1>

                    <p>
                        Invoice #{{ $order->id }}
                    </p>

                    <p>
                        {{ $order->created_at->format('d / m / Y') }}
                    </p>

                </div>

            </td>
        </tr>
    </table>


    {{-- THANK YOU --}}
    <div class="thank-you">

        <h2>
            Thank You for Your Order
        </h2>

        <p>
            Thank you for shopping with
            <strong>Beautyana</strong>.
            Your order details are provided below.
        </p>

    </div>


    {{-- ORDER + CUSTOMER DETAILS --}}
    <div class="section-title">
        Order Information
    </div>

    <table class="details-table">

        <tbody>

            <tr>

                <td class="details-label">
                    Order ID
                </td>

                <td class="details-value">
                    #{{ $order->id }}
                </td>

                <td class="details-label">
                    Customer Name
                </td>

                <td class="details-value">
                    {{ $order->fullname }}
                </td>

            </tr>

            <tr>

                <td class="details-label">
                    Tracking No.
                </td>

                <td class="details-value">
                    {{ $order->tracking_no }}
                </td>

                <td class="details-label">
                    Email
                </td>

                <td class="details-value">
                    {{ $order->email ?? 'N/A' }}
                </td>

            </tr>

            <tr>

                <td class="details-label">
                    Ordered Date
                </td>

                <td class="details-value">
                    {{ $order->created_at->format('d-m-Y') }}
                </td>

                <td class="details-label">
                    Phone
                </td>

                <td class="details-value">
                    {{ $order->phone }}
                </td>

            </tr>

            <tr>

                <td class="details-label">
                    Payment
                </td>

                <td class="details-value">
                    {{ $order->payment_mode }}
                </td>

                <td class="details-label">
                    Status
                </td>

                <td class="details-value">
                    {{ ucfirst($order->status_message) }}
                </td>

            </tr>

            <tr>

                <td class="details-label">
                    Address
                </td>

                <td colspan="3">
                    {{ $order->address }}

                    @if($order->pincode)
                        - {{ $order->pincode }}
                    @endif
                </td>

            </tr>

        </tbody>

    </table>


    {{-- ORDER ITEMS --}}
    <div class="section-title">
        Order Items
    </div>

    @php
        $subtotal = 0;
    @endphp

    <table class="items-table">

        <thead>

            <tr>

                <th width="8%" class="text-center">
                    ID
                </th>

                <th width="42%">
                    Product
                </th>

                <th width="15%" class="text-right">
                    Price
                </th>

                <th width="15%" class="text-center">
                    Quantity
                </th>

                <th width="20%" class="text-right">
                    Total
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($order->orderItems as $orderItem)

                @php
                    $itemTotal = $orderItem->quantity * $orderItem->price;
                    $subtotal += $itemTotal;
                @endphp

                <tr>

                    <td class="text-center">
                        {{ $orderItem->id }}
                    </td>

                    <td>

                        <span class="product-name">
                            {{ $orderItem->product->name ?? 'Product Deleted' }}
                        </span>

                        {{-- Color --}}
                        @if($orderItem->productColor)

                            @if($orderItem->productColor->color)

                                <span class="variant">
                                    Color:
                                    {{ $orderItem->productColor->color->name }}
                                </span>

                            @endif

                        @endif

                        {{-- Size --}}
                        @if(isset($orderItem->productVariant))

                            @if($orderItem->productVariant->size)

                                <span class="variant">
                                    Size:
                                    {{ $orderItem->productVariant->size->name }}
                                </span>

                            @endif

                        @endif

                    </td>

                    <td class="text-right">
                        ${{ number_format($orderItem->price, 2) }}
                    </td>

                    <td class="text-center">
                        {{ $orderItem->quantity }}
                    </td>

                    <td class="text-right">
                        <strong>
                            ${{ number_format($itemTotal, 2) }}
                        </strong>
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>


    {{-- TOTALS --}}

    @php
        /*
         * If your shipping is always $4,
         * this will show $4.
         *
         * Later, it is better to save the shipping
         * amount directly on the order.
         */
        $shippingAmount = 4.00;

        $grandTotal = $subtotal + $shippingAmount;
    @endphp


    <table class="summary">

        <tr>

            <td class="summary-label">
                Subtotal
            </td>

            <td class="summary-value">
                ${{ number_format($subtotal, 2) }}
            </td>

        </tr>

        <tr>

            <td class="summary-label shipping">
                Shipping
            </td>

            <td class="summary-value shipping">
                ${{ number_format($shippingAmount, 2) }}
            </td>

        </tr>

        <tr class="grand-total">

            <td class="summary-label">
                TOTAL
            </td>

            <td class="summary-value">
                ${{ number_format($grandTotal, 2) }}
            </td>

        </tr>

    </table>


    {{-- FOOTER --}}

    <div class="footer">

        <p>
            Thank you for shopping with
            <strong>Beautyana</strong>.
        </p>

   

        <p>
            © {{ date('Y') }} Beautyana. All Rights Reserved.
        </p>

    </div>

</body>
</html>