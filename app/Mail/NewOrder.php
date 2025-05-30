<?php

namespace App\Mail;

use App\Models\BusinessSettings;
use App\Models\Order;
use App\Models\Shipping;
use App\Repositories\BusinessRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Order $order,
        public Shipping $shipping,
        public string $name,
        public BusinessSettings $businessSettings,
    ){}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: env("APP_NAME")." | Nieuwe Bestelling | ".$this->order['order_number'],
            from: env("APP_MAIL"),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'mail.emails.order',
            with: [
                'orderNumber' => $this->order->order_number,
                'customerName' => $this->name,
                'businessSettings' => $this->businessSettings,
                'order' => $this->order,
                'shipping' => $this->shipping,
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
        return [
           //
        ];
    }
}
