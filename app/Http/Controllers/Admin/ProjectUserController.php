<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateModel;
use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\validateProjectUserRequest;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;

class ProjectUserController extends Controller
{
    public function create(User $user)
    {
        if(!in_array($user->role, [Role::SUPERIOR, Role::EMPLOYEE], true)) {
            return back()->with('error', 'User must be an employee or superior');
        }

        return view('assignProjects.create', [
            'projects' => Project::query()->select('id', 'title')->get(),
            'user' => $user,
        ]);
    }

    public function store(ValidateProjectUserRequest $request, CreateModel $model)
    {
        $model->handle(ProjectUser::class, $request);

        return back()->with('message', 'Project assigned to user');
    }
}
