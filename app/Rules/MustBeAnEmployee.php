<?php

namespace App\Rules;

use App\Enums\Role;
use Illuminate\Contracts\Validation\InvokableRule;

class MustBeAnEmployee implements InvokableRule
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
        if(request()->user->role !== Role::EMPLOYEE) {
            $fail('A user must be an employee');
        }
    }
}
