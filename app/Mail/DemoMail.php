<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class DemoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData, $username;
    /**
     * Create a new message instance.
     */
    public function __construct($mailData,$username)
    {
        $this->mailData = $mailData;
        $this->username = $username;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mailData['title'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.demoMail',
            with:[$this->mailData, $this->username],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if(!empty($this->mailData['files'])){
            foreach ($this->mailData['files'] as $key => $file) {
                $attachments[] = Attachment::fromPath($file);
            }
        }

        return $attachments;    
    }
}
