<?php

namespace App\Billing;

class CreditCardPaymentGateway implements BankPaymentGatewayContract
{

  protected $currency;

  public function __construct(String $currency)
  {
    $this->currency = $currency;
  }

  public function charge($amount)
  {
  }

  public function setDiscount(float $amount)
  {
  }
}
