<?php

namespace App\Http\Controllers\API;

use App\Actions\CreateModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\ValidateLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(ValidateLoginRequest $request)
    {
        $attributes = $request->validated();
        $user = User::where('email', $attributes['email'])->first();

        if(Hash::check($attributes['password'], $user->password)) {
            return response()->json([
               'status' =>'success',
                'data' => [
                    'user' => $user,
                    'token' => $user->tokens,
                ],
            ]);
        }
        return response()->json([
           'status' => 'error',
        ]);
    }

    public function register(StoreUserRequest $request, CreateModel $createModel)
    {
        $user = $createModel->handle(User::class, $request);

        $token = $user->createToken('user-token')->plainTextToken;

        return [
            'message' => 'User registered',
            'token' => $token,
        ];
    }
    public function logout(Request $request)
    {
        //
    }
}
