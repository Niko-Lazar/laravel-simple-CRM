<?php

namespace App\Actions\Auth;

use App\Http\Requests\Admin\StoreUserRequest;
use App\Models\User;

class registerUser
{
    public function handle(StoreUserRequest $request) : bool
    {
        $attributes = $request->validated();

        User::create($attributes);

        return true;
    }
}
