<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user) : null|bool
    {
        if($user->role === Role::SUPERADMIN) {
            return true;
        }
        return null;
    }

    public function viewAny(User $user) : bool
    {
        return true;
    }

    public function view(User $user) : Response
    {
        return true;
    }

    public function create(User $user) : Response
    {
        return ($user->role === Role::ADMIN)
            ? Response::allow()
            : Response::deny('Only admin can do that');
    }

    public function update(User $user) : Response
    {
        return ($user->role === Role::ADMIN)
            ? Response::allow()
            : Response::deny('Only admin can do that');
    }

    public function delete(User $user) : Response
    {
        return Response::deny('Only super admin can do that');
    }
}
