<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class CreateModel
{
    public function handle(Model $model, FormRequest $request, ?StoreFile $storeFile = null, string $attribute = null, string $file = null, string $dir = null) : Model
    {
        $attributes = $request->validated();

        // find a better way
        if($storeFile) {
            $attributes[$attribute] = $storeFile->handle($file, $dir);
        }

        return $model->create($attributes);
    }
}
