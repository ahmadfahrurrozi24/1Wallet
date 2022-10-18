<?php

namespace App\Helper;

use App\Models\Category;

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

  public static function storeNumberFormat($amount){
    return join("", explode(".", str_replace(",00", "", $amount)));
  }

  public static function newRecordCategoryCheck($id , $amount){
    $category = Category::findOrFail($id);

    if($category->type->name == "EXPENSE"){ 
      return $amount * -1;
    }

    return $amount;
  }

}
