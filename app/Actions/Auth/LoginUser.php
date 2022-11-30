<?php

namespace App\Actions\Auth;

use App\Http\Requests\Admin\ValidateLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class loginUser
{
    public function handle(ValidateLoginRequest $request) : void
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return;
        }

        throw ValidationException::withMessages(['invalid credentials']);
    }
}
