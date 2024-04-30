<?php

namespace App\Mail;

use App\Models\HumanResource\Applicant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailRejectedApplicant extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private Applicant $applicant;
    public function __construct(Applicant $applicant)
    {
        $this->applicant = $applicant;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
                subject: 'Applicantion Update: ' . $this->applicant->position->name . ' at RapidMart',
                to: $this->applicant->email
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.rejected-applicant',
            with: [
                'applicantName' => $this->applicant->first_name,
                'positionName' => $this->applicant->position->name,
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