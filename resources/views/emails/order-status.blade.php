@php

$message = '';

switch($order->status_message){

    case 'pending':
        $message = 'Thank you for your purchase! We have successfully received your order and it is currently pending confirmation. We will notify you as soon as we begin preparing it.';
        break;

    case 'in progress':
        $message = 'Good news! Our team is currently preparing your order with care. We will notify you again once it has been shipped.';
        break;

    case 'out-for-delivery':
        $message = 'Your order has left our warehouse and is now out for delivery. It will arrive very soon.';
        break;

    case 'completed':
        $message = 'Your order has been delivered successfully. We sincerely thank you for shopping with Beautyana and hope you enjoy your purchase.';
        break;

    case 'cancelled':
        $message = 'Unfortunately, your order has been cancelled. If you believe this was a mistake or need assistance, please contact our support team.';
        break;

    default:
        $message = 'Your order status has been updated. Please log in to your account to view the latest information.';
}

@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>

<body style="margin:0;padding:30px;background:#f4f4f4;font-family:Arial,Helvetica,sans-serif;">

<table width="650" align="center" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:10px;overflow:hidden;box-shadow:0 5px 20px rgba(0,0,0,.08);">

    <!-- Header -->
    <tr>
        <td style="background:#111;padding:30px;text-align:center;color:#fff;">
            <h1 style="margin:0;font-size:30px;letter-spacing:2px;">
                Beautyana
            </h1>

            <p style="margin:10px 0 0;color:#d8c08b;">
                Luxury Fashion
            </p>
        </td>
    </tr>

    <!-- Greeting -->
    <tr>
        <td style="padding:35px;">

            <h2 style="margin-top:0;">
                Hello {{ $order->fullname }},
            </h2>

            <p style="font-size:16px;line-height:28px;color:#555;">
                {{ $message }}
            </p>

            @if($order->status_message == 'cancelled')

                <div style="background:#fdecec;border-left:5px solid #dc3545;padding:20px;margin:30px 0;border-radius:6px;">

                    <h3 style="margin-top:0;color:#dc3545;">
                        ❌ Order Cancelled
                    </h3>

                    <p style="margin-bottom:0;color:#555;">
                        We sincerely apologize for the inconvenience.
                        If you need assistance or believe this cancellation was made by mistake,
                        please contact our customer support.
                    </p>

                </div>

            @endif

            <table width="100%" cellpadding="12" cellspacing="0" style="margin-top:25px;border-collapse:collapse;border:1px solid #eee;">

                <tr style="background:#fafafa;">
                    <td width="35%"><strong>Order Number</strong></td>
                    <td>{{ $order->tracking_no }}</td>
                </tr>

                <tr>
                    <td><strong>Status</strong></td>
                    <td>
                        <strong style="
                        @if($order->status_message == 'pending') color:#ff9800;
                        @elseif($order->status_message == 'in progress') color:#2196f3;
                        @elseif($order->status_message == 'out-for-delivery') color:#9c27b0;
                        @elseif($order->status_message == 'completed') color:#28a745;
                        @elseif($order->status_message == 'cancelled') color:#dc3545;
                        @endif
                        ">
                            {{ strtoupper($order->status_message) }}
                        </strong>
                    </td>
                </tr>

                <tr style="background:#fafafa;">
                    <td><strong>Payment Method</strong></td>
                    <td>{{ $order->payment_mode }}</td>
                </tr>

                <tr>
                    <td><strong>Total Amount</strong></td>
                    <td>
                        <strong>
                            ${{ number_format($order->total_price,2) }}
                        </strong>
                    </td>
                </tr>

            </table>

            <h3 style="margin-top:35px;">
                Ordered Items
            </h3>

            <table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;border:1px solid #eee;">

                <thead style="background:#111;color:#fff;">

                    <tr>

                        <th align="left">Product</th>

                        <th align="center">Qty</th>

                        <th align="right">Price</th>

                    </tr>

                </thead>

                <tbody>

                @foreach($order->orderItems as $item)

                    <tr style="border-bottom:1px solid #eee;">

                        <td>
                            {{ $item->product->name ?? 'Product Deleted' }}
                        </td>

                        <td align="center">
                            {{ $item->quantity }}
                        </td>

                        <td align="right">
                            ${{ number_format($item->price,2) }}
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

            <p style="margin-top:35px;font-size:15px;color:#666;line-height:26px;">
                Thank you for shopping with <strong>Beautyna</strong>.
                We truly appreciate your trust and look forward to serving you again.
            </p>

        </td>
    </tr>

    <!-- Footer -->

    <tr>

        <td style="background:#111;color:#999;padding:20px;text-align:center;font-size:13px;">

            © {{ date('Y') }} Beautyana. All Rights Reserved.

        </td>

    </tr>

</table>

</body>
</html>
