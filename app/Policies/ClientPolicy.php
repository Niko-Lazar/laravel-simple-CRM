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

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user) : Response
    {
        return (in_array($user->role, [Role::ADMIN, Role::SUPERADMIN]))
            ? Response::allow()
            : Response::deny('Only admin can do that');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user) : Response
    {
        return ($user->role === Role::SUPERADMIN)
            ? Response::allow()
            : Response::deny('Only super admin can do that');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user) : Response
    {
        return ($user->role === Role::SUPERADMIN)
            ? Response::allow()
            : Response::deny('Only super admin can do that');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user) : Response
    {
        return ($user->role === Role::SUPERADMIN)
            ? Response::allow()
            : Response::deny('Only super admin can do that');
    }
}
