<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PDFMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfFile;

    /**
     * Create a new message instance.
     */
    public function __construct( $pdfFile)
    {
        $this->pdfFile = $pdfFile;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Xoom Digital PDF Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */

     public function content(): Content // Ensure correct return type
     {
         return new Content(
            view: 'emails.pdfmail',
            with: ['pdfFile' => $this->pdfFile],
         );
     }

     /**
      * Get the attachments for the message.
      *
      * @return array
      */
     public function attachments(): array
     {
         // Ensure $pdfFile is not null before creating an attachment
        if ($this->pdfFile) {
            return [
                Attachment::fromPath($this->pdfFile)
                ->as('XoomDigital.pdf')
                ->withMime('application/pdf'),
                // ->withName('XoomDigital.pdf'),
            ];
        }

        return [];
     }
}
