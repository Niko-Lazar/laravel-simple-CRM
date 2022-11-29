<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class CreateModel
{
    public function handle(string $model, FormRequest $request) : Model
    {
        $attributes = $request->validated();

        return $model::create($attributes);
    }
}
