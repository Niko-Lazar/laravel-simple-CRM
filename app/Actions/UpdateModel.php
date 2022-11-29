<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class UpdateModel
{
    public function handle(Model $model, FormRequest $request) : Model
    {
        $attributes = $request->validated();

        $model->update($attributes);

        return $model;
    }
}
