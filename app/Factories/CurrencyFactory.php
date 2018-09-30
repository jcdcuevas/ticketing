<?php

namespace App\Factories;

class CurrencyFactory
{

  static function find($code = 'MXN')
  {
    $currency = \App\Currency::where('code', $code)
      ->first();

    if(!$currency){
      // Get currency from API Call
      $currency = new \App\Currency;
      // http://free.currencyconverterapi.com/api/v5/convert?q=USD_MXN&compact=y

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, "http://free.currencyconverterapi.com/api/v5/convert?q={$code}_MXN&compact=y");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      $curl_result = curl_exec($ch);
      if (curl_errno($ch)) {

      }
      curl_close ($ch);
      $read_currency = json_decode($curl_result);
      $requested_conversion = "{$code}_MXN";

      $currency->code = $code;
      $currency->exchange_rate = bcmul($read_currency->$requested_conversion->val, "1", 2);
    }

    return $currency;
  }

}
