<?php


namespace App\Utils\Rostelekom;


use QSOFT\Payment\Payment;

class PaymentHelper extends Payment
{
    public function loadPayment($retailerXmlId, $paySystemId, $userTypeId = '')
    {
        return parent::loadPayment($retailerXmlId, $paySystemId, $userTypeId);
    }
}