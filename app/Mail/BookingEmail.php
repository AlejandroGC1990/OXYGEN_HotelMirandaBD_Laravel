<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingEmail extends Mailable
{
    use Queueable, SerializesModels;

    private string $guest;
    private int $room_id;
    private string $check_in;
    private string $check_out;
    private float $discount;
    /**
     * Create a new message instance.
     */
    public function __construct($guest, $room_id, $check_in, $check_out, $discount)
    {
        $this->guest = $guest;
        $this->room_id = $room_id;
        $this->check_in = $check_in;
        $this->check_out = $check_out;
        $this->discount = $discount;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.email-booking',
            with: ['guest' => $this->guest,
            'room_id' => $this->room_id,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'discount' => $this->discount,
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