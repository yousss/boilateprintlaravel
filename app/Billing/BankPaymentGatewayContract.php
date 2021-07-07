<?php

namespace App\Billing;

interface BankPaymentGatewayContract
{
  public function charge($amount);
  public function setDiscount(float $amount);
}
