<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class YourMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $order;
    public $orderItems;

    
    /**
     * Create a new message instance.
     */
    public function __construct($user, $order, $orderItems)
    {
        $this->user = $user;
        $this->order = $order;
        $this->orderItems = $orderItems;
 
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Order has been received',
        );
    }

    /**
     * Get the message content definition.
     */
//   public function content(): Content
//     {
//         return new Content(
//             view: 'emails.order_confirmation',
//         ); // Closing parentheses for content method
//     }
    public function build()
    {
        return $this->view('admin.mail') // Use this to pass the data
                    ->with([
                        'user' => $this->user,
                        'order' => $this->order,
                        'orderItems' => $this->orderItems,
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
