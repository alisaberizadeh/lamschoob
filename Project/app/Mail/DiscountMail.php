<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DiscountMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name ;
    public $discount ;
    public $date ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name , $discount , $date)
    {
        $this->name = $name ;
        $this->discount = $discount ;
        $this->date = $date ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.discount')->subject('کد تخفیف برای شما');
    }
}
