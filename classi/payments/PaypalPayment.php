<?php
namespace classi\payments;

class PaypalPayment extends AbPayment
{

    private $mail;

    public function __construct($mail)
    {
        if (is_string($mail)) {
            $this->mail = $mail;
        } else {
            trigger_error('errore di tipo');
        }
    }

    public function sendPayment($import)
    {
        parent::sendPayment($import);
 
    }
}

