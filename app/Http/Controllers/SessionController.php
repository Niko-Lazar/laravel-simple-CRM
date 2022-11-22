<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateLoginRequest;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(ValidateLoginRequest $request)
    {
        $credentials = $request->validated();

        if(Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('admins/stats');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
