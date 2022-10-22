<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $accountEmail)
    {
        $this->token = $token;
        $this->accountEmail = $accountEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $token = $this->token;
        $accountEmail = $this->accountEmail;

        return $this->from('19521198@gm.uit.edu.vn')
        ->View('auth.passwords.forgetPasswordEmail', compact('token'))
        ->subject('Reset password');
    }
}
