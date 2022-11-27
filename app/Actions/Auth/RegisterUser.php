<?php

namespace App\Actions\Auth;

use App\Http\Requests\Admin\StoreUserRequest;
use App\Models\User;

class registerUser
{
    public function handle(StoreUserRequest $request) : bool
    {
//        if(!(request('key') === config('app.register_key'))){
//
//            return false;
//        }

        $attributes = $request->validated();

        User::create($attributes);

        return true;
    }
}
