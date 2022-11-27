<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class UpdateModel
{
    public function handle(Model $model, FormRequest $request, ?StoreFile $storeFile = null, string $attribute = null, string $file = null, string $dir = null) : Model
    {
        $attributes = $request->validated();

        // find a better way
        if($storeFile && isset($attributes[$attribute])) {
            $attributes[$attribute] = $storeFile->handle($file, $dir);
        }

        $model->update($attributes);

        return $model;
    }
}
