<?php
namespace classi\payments;
require_once 'AbPayment.php';

class CardPayment extends AbPayment
{

    private $code;    // codice numerico di 16 cifre
    private $cvv;    // codice di 3 cifre posto sul retro della carta
    const CODE_SIZE = 16;    // lunghezza codice identificativo carta di credito
    const CVV_SIZE = 3;    // lunghezza codice cvv

    public function sendPayment($import)
    {
        parent::sendPayment($import);
    }

    public function __construct(){
        parent::__construct();
    }
    
    public function setCode($code)
    {
        if (is_string($code)) {

            $this->code = $code;
            
        } else {
            trigger_error('errore di tipo');
        }
    }

    public function setCvv($cvv){
        $this->cvv = $cvv;
    }
}
