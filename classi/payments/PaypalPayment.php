<?php
namespace classi\payments;

class PaypalPayment extends AbPayment
{

    private $email;

    public function __construct($email)
    {
        if (is_string($email)) {
            $this->email = $email;
        } else {
            trigger_error('errore di tipo');
        }
    }

    public function sendPayment($import)
    {
        
 
    }
}

