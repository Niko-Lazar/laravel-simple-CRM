<?php

namespace App\Actions\Auth;

use App\Http\Requests\Admin\ValidateLoginRequest;
use Illuminate\Support\Facades\Auth;

class loginUser
{
    public function handle(ValidateLoginRequest $request) : bool
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return true;
        }

        return false;
    }
}
