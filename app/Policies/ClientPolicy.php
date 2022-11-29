<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ClientPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user) : Response
    {
        return (in_array($user->role, [Role::ADMIN, Role::SUPERADMIN]))
            ? Response::allow()
            : Response::deny('Only admin can do that');
    }

    public function create(User $user) : Response
    {
        return ($user->role === Role::SUPERADMIN)
            ? Response::allow()
            : Response::deny('Only super admin can do that');
    }

    public function update(User $user) : Response
    {
        return ($user->role === Role::SUPERADMIN)
            ? Response::allow()
            : Response::deny('Only super admin can do that');
    }

    public function delete(User $user) : Response
    {
        return ($user->role === Role::SUPERADMIN)
            ? Response::allow()
            : Response::deny('Only super admin can do that');
    }
}
