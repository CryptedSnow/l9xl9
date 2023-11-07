<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $hunter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($hunter)
    {
        $this->hunter = $hunter;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: "Hunter {$this->hunter->nome_hunter}, seu e-mail está aqui",
            from: new Address('iury@email.com', 'Iury Fernandes'),
            replyTo: [
                new Address($this->hunter->email_hunter, "{$this->hunter->nome_hunter}"),
            ],
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email_message',
            with: [
                'id' => $this->hunter->id,
                'nome_hunter' => $this->hunter->nome_hunter,
                'email_hunter' => $this->hunter->email_hunter,
                'idade_hunter' => $this->hunter->idade_hunter,
                'altura_hunter' => $this->hunter->altura_hunter,
                'peso_hunter' => $this->hunter->peso_hunter,
                'tipo_hunter' => $this->hunter->tipo_hunter,
                'tipo_nen' => $this->hunter->tipo_nen,
                'tipo_sangue' => $this->hunter->tipo_sangue,
                'imagem_hunter' => $this->hunter->imagem_hunter,
                'serial' => $this->hunter->serial,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
