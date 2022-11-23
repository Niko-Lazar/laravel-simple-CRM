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
        $attributes = $request->validated();

        User::create($attributes);

        return redirect()->route('login');
    }
}
