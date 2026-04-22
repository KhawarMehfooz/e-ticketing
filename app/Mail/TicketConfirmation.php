<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketConfirmation extends Mailable
{
    use SerializesModels;

    public function __construct(public readonly Ticket $ticket) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your E-Ticket — '.$this->ticket->reference_number,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.ticket-confirmation',
            with: ['ticket' => $this->ticket],
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromStorageDisk('local', $this->ticket->pdf_path)
                ->as($this->ticket->reference_number.'.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
