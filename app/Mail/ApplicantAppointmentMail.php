<?php

namespace App\Mail;

use App\Models\HumanResource\Applicant;
use App\Models\HumanResource\Interview;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicantAppointmentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public Interview $interview
    ){}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from : new Address("emmanmale@gmail.com", "Rapidmart"),
            subject: 'Interview with Rapidmart for '.$this->interview->applicant->position->name.' position',
            to: $this->interview->applicant->email
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.appointment-applicant',
            with: [
                'applicantName' => $this->interview->applicant->last_name,
                'positionName' => $this->interview->applicant->position->name,
                'appointmentDate' => $this->interview->interviewDate(),
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