<?php

namespace App\Rules;

use App\Helper\Helper;
use Illuminate\Contracts\Validation\InvokableRule;

class IsNotNegative implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (Helper::storeNumberFormat($value) < 0) {
            $fail("The :attribute must be a positive number");
        }
    }
}
