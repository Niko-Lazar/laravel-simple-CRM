<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user)
    {
        //
    }

    public function create(User $user) : Response
    {
        return (in_array($user->role, [Role::ADMIN, Role::SUPERADMIN]))
            ? Response::allow()
            : Response::deny('Only admin or above can do that');
    }

    public function update(User $user)
    {
        return (in_array($user->role, [Role::ADMIN, Role::SUPERADMIN]))
            ? Response::allow()
            : Response::deny('Only admin or above can do that');
    }

    public function delete(User $user)
    {
        return ($user->role === Role::SUPERADMIN)
            ? Response::allow()
            : Response::deny('Only super admin can do that');
    }
}
