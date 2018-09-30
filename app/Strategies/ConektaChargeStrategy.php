<?php

namespace App\Strategies;

class ConektaChargeStrategy implements ChargeStrategyInterface
{

  public function pay()
  {
    echo "Pagar utilizando conekta";
  }

}
