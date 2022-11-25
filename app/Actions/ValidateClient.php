<?php

namespace App\Actions;

use App\Http\Requests\admin\ValidateClientRequest;

class ValidateClient
{
    public function handle(ValidateClientRequest $request) : array
    {
        $attributes = $request->validated();

        if(isset($attributes['logo'])) {
            $attributes['logo'] = request()->file('logo')->store('logos');
        }

        return $attributes;
    }
}
