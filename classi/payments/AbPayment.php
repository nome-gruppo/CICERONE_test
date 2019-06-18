<?php 
namespace classi\payments;


abstract class AbPayment implements PaymentInterface{
    
    private $import;
    private $paymentType;
    

    public function sendPayment($import)
    {
        if(is_float($import)){
       $this->import = $import;
        } else{
            trigger_error('errore di tipo');
        }
    }

    public function setPaymentType(\classi\payments\PaymentType $paymentType)
    {
       $this->paymentType = $paymentType; 
    }
    
}
