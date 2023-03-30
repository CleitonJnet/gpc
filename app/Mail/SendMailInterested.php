<?php

namespace App\Mail;

use http\Url;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailInterested extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone;
    public $email;
    public $url;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone, $email,$url)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->url = $url;
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
            ->subject('Tenho interesse em um imóvel')
            ->view('emails.interested')
            ->with([
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'url' => $this->url,
            ]);
    }
}
