<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class SecretKey implements InvokableRule
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
        if(!(request('key') === config('app.register_key'))) {
            $fail('The :attribute is not correct');
        }
    }
}
