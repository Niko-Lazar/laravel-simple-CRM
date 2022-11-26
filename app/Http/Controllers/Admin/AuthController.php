<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Auth\loginUser;
use App\Actions\Auth\logoutUser;
use App\Actions\Auth\registerUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\ValidateLoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function register(StoreUserRequest $request, registerUser $registerUser)
    {
        if(!$registerUser->handle($request)){
            return redirect()->route('auth.register');
        }

        return redirect()->route('login');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(ValidateLoginRequest $request, loginUser $loginUser)
    {
        if(!$loginUser->handle($request))
        {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        return redirect()->intended(route('admins.dashboard.stats'));
    }

    public function logout(Request $request, logoutUser $logoutUser)
    {
        $logoutUser->handle($request);

        return redirect()->route('login');
    }
}
