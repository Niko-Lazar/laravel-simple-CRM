<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Auth\loginUser;
use App\Actions\Auth\logoutUser;
use App\Actions\CreateModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\ValidateLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.register');
    }

    public function register(StoreUserRequest $request, CreateModel $model)
    {
        $model->handle(User::class, $request);

        return redirect()->route('login');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(ValidateLoginRequest $request, loginUser $loginUser)
    {
        $loginUser->handle($request);

        return redirect()->intended(route('clients.index'));
    }

    public function logout(Request $request, logoutUser $logoutUser)
    {
        $logoutUser->handle($request);

        return redirect()->route('login');
    }
}
