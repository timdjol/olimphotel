<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HotelMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->markdown('mail.hotel')->subject(config('app.name') . 'Бронирование');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Заявка с бронирования',
        );
    }

}