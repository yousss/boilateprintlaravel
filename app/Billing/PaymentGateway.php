<?php

namespace App\Billing;

use Illuminate\Support\Str;

class PaymentGateway implements BankPaymentGatewayContract
{

  protected $currency;
  protected $discount;

  public function __construct($currency)
  {
    $this->currency = $currency;
    $this->discount = 0;
  }

  public function charge($amount)
  {

    $discountedAmount = $amount * $this->discount;

    return [
      'amount' => $amount - $discountedAmount,
      'confirmation_number' => Str::random_int(1, 20),
      'currency' => $this->currency,
      'discount' => $discountedAmount,
    ];
  }

  public function setDiscount(float $amount)
  {
    $this->discount = $amount;
  }
}
