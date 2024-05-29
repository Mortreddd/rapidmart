<?php

namespace App\Mail;

// use App\Models\HumanResource\Employee;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Auth;

class EmployedApplicantMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        private $employee,
        private bool $isAuthorized,
        private string $start_date

    ){} 

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(Auth::user()->email, 'Rapidmart'),
            subject: 'Applicantion Update: ' . $this->employee->position->name . ' at RapidMart',
            to: $this->employee->email
        ); 
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.accepted-applicant',
            with: [
                'employee' => $this->employee,
                'isAuthorized' => $this->isAuthorized,
                'startDate' => $this->start_date
            ],
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