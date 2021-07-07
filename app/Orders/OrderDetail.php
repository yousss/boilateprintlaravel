<?php 

namespace App\Orders;

use App\Billing\PaymentGateway;

class OrderDetail {

  protected $paymentGateway;

  public function __construct(PaymentGateway $paymentGateway)
  {
    $this->paymentGateway = $paymentGateway;
  }

  public function all ()
  {
    $this->paymentGateway->setDiscount(0.04);
    return [
      'name' => "Ayous Slika",
      'address' => 'Boeung kok I, Toul kouk ,PP'
    ];
  }
 
}