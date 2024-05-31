<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Attachment;

class ReportShipmentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $description;
    public $report_path;
    public $po_path;
    public $supplier;
    public $type;

    public function __construct($description, $report_path, $po_path, $supplier, $type)
    {
        $this->description = $description;
        $this->report_path = $report_path;
        $this->po_path = $po_path;
        $this->supplier = $supplier;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        if ($this->type == 'return') {
            return new Envelope(
                subject: 'Return Shipment From Rapid Mart',
            );
        } else {
            return new Envelope(
                subject: 'Release Shipment From Rapid Mart',
            );
        }

    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if ($this->type == 'return') {
            return new Content(
                view: 'mail.ReturnShipment',
            );
        } else {
            return new Content(
                view: 'mail.ReleaseShipment',
            );
        }

    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->po_path)
                ->as('PurchaseOrderFile.pdf')
                ->withMime('application/pdf'),
            Attachment::fromPath($this->report_path)
                ->as('QualityReportFile.pdf')
                ->withMime('application/pdf')
        ];
    }
}
