<?php

namespace App\Http\Controllers\Admin;

use App\Mail\UserCreated;
use App\Actions\CreateModel;
use App\Actions\UpdateModel;
use App\Enums\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateUserRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    public function index()
    {
        return view('users.index', [
            'users' => User::with(['superior', 'projects'])->simplePaginate(10)
        ]);
    }

    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function create()
    {
        return view('users.create', ['superiors' => User::superiors()->get()]);
    }

    public function store(ValidateUserRequest $request, CreateModel $createModel)
    {
        $password = Str::random(32);
        $attributes = $request->validated();
        $attributes['password'] = $password;

        $newUser = User::create($attributes);

        Mail::to($newUser)->send(new UserCreated($newUser->email, $password));

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'superiors' => User::where('role', Role::SUPERIOR)->get(),
        ]);
    }

    public function update(User $user, ValidateUserRequest $request, UpdateModel $updateModel)
    {
        $updateModel->handle($user, $request);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
