<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TravelMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->markdown('mail.travel')->subject(config('app.name') . 'Экскурсии');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Заявка с страницы Экскурсии',
        );
    }

}