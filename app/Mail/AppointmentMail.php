<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class AppointmentMail extends Mailable
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

public function build()
{
    return $this
        ->subject('New Appointment Request - DEMANTO')
        ->view('emails.appointment');
}
}