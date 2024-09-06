<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class SuccessfulWithdrawal extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @var Demo
     */
    public $demo;

    public function __construct( $demo)
    {
        $this->demo = $demo;
    }

/**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Withdrawal approved',
        );
    }
    
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.emailproof',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    
}




