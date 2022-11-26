<?php

namespace App\Actions;

use App\Enums\ProjectStatus;
use App\Http\Requests\admin\ValidateProjectRequest;

class ValidateProject
{
    public function handle(ValidateProjectRequest $request) : array
    {
        $attributes = $request->validated();

        if(request('status')){
            $attributes['status'] = ProjectStatus::FINISHED;
        }

        return $attributes;
    }
}
