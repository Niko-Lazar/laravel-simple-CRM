<?php

namespace App\Actions;

use App\Http\Requests\admin\ValidateEmployeeRequest;

class ValidateEmployee
{
    public function handle(ValidateEmployeeRequest $request) : array
    {
        return $request->validated();
    }
}
