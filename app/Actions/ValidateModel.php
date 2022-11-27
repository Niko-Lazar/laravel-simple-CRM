<?php

namespace App\Actions;

use App\Enums\ProjectStatus;
use App\Http\Requests\Admin\ValidateClientRequest;
use App\Http\Requests\Admin\ValidateEmployeeRequest;
use Illuminate\Foundation\Http\FormRequest;

class ValidateModel
{
    public function handle(FormRequest $request) : array
    {
        $attributes = $request->validated();

        if(isset($attributes['logo'])) {
            $attributes['logo'] = request()->file('logo')->store('logos');
        }

        return $attributes;
    }
}
