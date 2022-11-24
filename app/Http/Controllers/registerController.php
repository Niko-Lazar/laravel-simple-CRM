<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class registerController extends Controller
{

    public function create()
    {
        return view('register.create');
    }

    public function store(StoreUserRequest $request)
    {
        if(!(request('key') === config('app.register_key'))){
            return back();
        }

        $attributes = $request->validated();

        User::create($attributes);

        return redirect()->route('login');
    }
}
