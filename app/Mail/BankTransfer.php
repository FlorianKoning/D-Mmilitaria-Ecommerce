<?php

namespace App\Mail;

use App\Models\BusinessSettings;
use App\Models\Order;
use App\Repositories\BusinessRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;

class BankTransfer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Order $order,
        public string $email,
        public string $name,
        public BusinessSettings $businessSettings,
    )
    {
        $this->order = $order;
        $this->email = $email;
        $this->name = $name;
        $this->businessSettings = $businessSettings;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: env("APP_NAME")." | Nieuwe Bestelling | ".$this->order['order_number'],
            from: env('MAIL_FROM_ADDRESS'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'mail.emails.bankTransfer',
            with: [
                'orderNumber' => $this->order['order_number'],
                'customerName' => $this->name,
                'businessSettings' => $this->businessSettings,
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
