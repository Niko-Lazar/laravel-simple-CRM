<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Actions\CreateModel;
use App\Actions\UpdateModel;
use App\Actions\ValidateEmployee;
use App\Enums\Role;
use App\Models\ProjectUser;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateUserRequest;
use App\Http\Requests\Admin\ValidateProjectUserRequest;
use App\Http\Requests\Admin\UpdateEmployeeRequest;

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

    public function store(User $user, ValidateUserRequest $request, CreateModel $createModel)
    {
        $createModel->handle(User::class, $request);

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
