<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\ValidateLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function register(StoreUserRequest $request)
    {
        if(!(request('key') === config('app.register_key'))){
            return back();
        }

        $attributes = $request->validated();

        User::create($attributes);

        return redirect()->route('login');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(ValidateLoginRequest $request)
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended(route('admins.dashboard.stats'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
