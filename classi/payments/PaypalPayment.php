<?php
namespace classi\payments;
require_once 'AbPayment.php';

class PaypalPayment extends AbPayment
{

    private $mail;

    public function __construct($mail)
    {
        parent::__construct();
        
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

