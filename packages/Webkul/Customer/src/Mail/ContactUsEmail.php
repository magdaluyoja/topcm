<?php

namespace Webkul\Customer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * ContactUs Mail class
 *
 * @author    Rahul Shukla <rahulshukla.symfony517@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ContactUsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactusData;

    public function __construct($contactusData) {
        $this->contactusData = $contactusData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->contactusData['email'])
            ->from(env('SHOP_MAIL_FROM'))
            ->subject($this->contactusData['subject'])
            ->view('shop::emails.customer.contactus-email')
            ->with(
                'data', 
                [
                    'full_name' => $this->contactusData['full_name'], 
                    'email' => $this->contactusData['email'], 
                    'subject' => $this->contactusData['subject'], 
                    'message' => $this->contactusData['message'], 
                    'token' => $this->contactusData['token']
                ]
            );
    }
}