<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $contact)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Portfolio Enquiry — ' . ($this->contact->organization ?: $this->contact->name),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_submitted',
            with: ['contact' => $this->contact],
        );
    }
}
