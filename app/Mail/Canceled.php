<?php

namespace App\Mail;

use App\Models\Order;
use App\Repositories\BusinessRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class Canceled extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Order $order, 
        public string $name,
        protected BusinessRepository $businessRepository,
    ){}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Betaling mislukt – we houden je op de hoogte',
            from: env("APP_MAIL"),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'mail.emails.canceled',
            with: [
                'orderNumber' => $this->order->order_number,
                'customerName' => $this->name,
                'businessRepository' => $this->businessRepository
            ]
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
}
