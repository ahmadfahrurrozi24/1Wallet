<?php

namespace App\Rules;

use App\Helper\Helper;
use Illuminate\Contracts\Validation\InvokableRule;

class MaxNumberAmount implements InvokableRule
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
        if (Helper::storeNumberFormat($value) > 1000000000) {
            $fail("The :attribute has reached the maximum limit");
        }
    }
}
