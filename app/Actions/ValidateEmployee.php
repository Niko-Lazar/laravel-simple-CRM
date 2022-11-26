<?php

namespace App\Actions;

use App\Http\Requests\Admin\ValidateEmployeeRequest;

class ValidateEmployee
{
    public function handle(ValidateEmployeeRequest $request) : array
    {
        return $request->validated();
    }
}
