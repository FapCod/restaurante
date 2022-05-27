<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarAvisoMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject="Informacion de Stock";
    public $user="";
    public $product="";
    public $presentations="";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($product,$user,$presentations)
    {
        //
        $this->user = $user;
        $this->product = $product;
        $this->presentations = $presentations;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.aviso');
    }
}
