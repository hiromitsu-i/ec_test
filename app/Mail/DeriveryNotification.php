<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeriveryNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        //
        $this->title = 'お買い上げありがとうございます';
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.delivery_notification')
        ->text('emails.delivery_notification_plain')
        ->subject($this->title)
        ->with([
            'text' => $this->text,
        ]);
    }
}
