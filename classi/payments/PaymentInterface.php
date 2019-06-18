<?php
namespace classi\payments;

interface PaymentInterface
{
    public function setPaymentType(PaymentType $paymentType);
    public function sendPayment(float $import);
    
}

?>