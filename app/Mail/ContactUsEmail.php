<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $fullname;
    public $email;
    public $content;
    public $subject;
    public function __construct($fullname,$email,$subject,$content)
    {
        //
        $this->fullname = $fullname;
        $this->email = $email;
        $this->content = $content;
        $this->subject = $subject;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Us:'.$this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'home.contactEmail',
    //     );
    // }

    public function build()
    {
        return $this->view('home.contactEmail') // Use this to pass the data
                    ->with([
                        'fullname'=>$this->fullname,
                        'email' => $this->email,
                        'content' => $this->content,
                    ]);
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
