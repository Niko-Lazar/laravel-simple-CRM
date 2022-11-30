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

    public function before(User $user) : null|bool
    {
        if($user->role === Role::SUPERADMIN) {
            return true;
        }
        return null;
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user) : Response
    {
        return ($user->role === Role::ADMIN)
            ? Response::allow()
            : Response::deny('Only admin can do that');
    }

    public function create(User $user) : Response
    {
        return Response::deny('Only super admin can do that');
    }

    public function edit(User $user, Client $client) : Response
    {
        return Response::deny('Only super admin can do that');
    }

    public function update(User $user) : Response
    {
        return Response::deny('Only super admin can do that');
    }

    public function delete(User $user, Client $client) : Response
    {
        return Response::deny('Only super admin can do that');
    }
}
