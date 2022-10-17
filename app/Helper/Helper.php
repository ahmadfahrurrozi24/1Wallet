<?php

namespace App\Helper;

class Helper
{
  public static function balanceFormat($balance)
  {
    $balance = number_format($balance, 0, ',', '.');
    return  "Rp $balance";
  }

  public static function amountFormat($amount)
  {
    $amount = number_format($amount, 0, ',', '.');
    if ($amount > 0) {
      return "+ Rp $amount";
    } elseif ($amount < 0) {
      $amount = abs($amount);
      return "- Rp $amount";
    }
  }
}
