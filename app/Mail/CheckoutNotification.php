<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CheckoutNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $checkout;
    public $midtrans_link;

    public function __construct($checkout, $midtrans_link)
    {
        $this->checkout = $checkout;
        $this->midtrans_link = $midtrans_link;
    }

    public function build()
    {
        return $this->from('noreply@yourdomain.com')
                    ->subject('Pembelian Tiket Seminar')
                    ->view('emails.checkout');
    }
}

