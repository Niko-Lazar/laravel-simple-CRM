<?php

namespace App\Actions\auth;

use Illuminate\Http\Request;

class logoutUser
{
    public function handle(Request $request) : void
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }
}
