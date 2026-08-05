<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

public function build()
{
    $subject = match($this->order->status_message) {
        'pending' => 'Your Order Has Been Received',
        'in progress' => 'Your Order is Being Prepared',
        'out-for-delivery' => 'Your Order is On the Way',
        'completed' => 'Your Order Has Been Delivered',
        'cancelled' => 'Your Order Has Been Cancelled',
        default => 'Your Order Status Has Been Updated',
    };

    return $this->subject('Demanto - '.$subject)
                ->view('emails.order-status');
}
}