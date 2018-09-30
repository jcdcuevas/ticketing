<?php

namespace App\Strategies;

class OpenPayChargeStrategy implements ChargeStrategyInterface
{

  public function pay()
  {
    echo "Pagar utilizando openpay";
  }

}
