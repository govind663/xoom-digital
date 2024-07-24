<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PDFMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $pdfPath;

    /**
     * Create a new message instance.
     */
    public function __construct($pdfPath)
    {
        $this->pdfPath = $pdfPath;
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pdfmail')
                    ->attach($this->pdfPath, [
                        'as' => 'purposel_doc.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
