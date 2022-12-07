<?php

namespace App\Rules;

use App\Enums\Role;
use Illuminate\Contracts\Validation\InvokableRule;

class MustBeSuperior implements InvokableRule
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
        if(request()->user->role !== Role::SUPERIOR) {
            $fail('A user must be an superior');
        }
    }
}
