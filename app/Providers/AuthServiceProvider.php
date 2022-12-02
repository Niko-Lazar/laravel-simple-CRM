<?php

namespace App\Providers;

use App\Enums\Role;
use App\Models\Client;
use App\Models\User;
use App\Models\Project;
use App\Policies\ClientPolicy;
use App\Policies\UserPolicy;
use App\Policies\ProjectPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Client::class => ClientPolicy::class,
        User::class => UserPolicy::class,
        Project::class => ProjectPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function(User $user) {
            if($user->role === Role::SUPERADMIN) {
                return true;
            }
            return null;
        });
    }
}
