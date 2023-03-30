<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailContact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $email;
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email,$msg)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to('contato@gpcadministradora.com.br')
            ->from($this->email)
            ->subject('Mensagem do site')
            ->view('emails.contact')
            ->with([
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'msg' => $this->msg,
            ]);
    }
}
