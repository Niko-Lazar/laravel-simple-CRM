<?php

namespace App\Providers;

use App\Enums\Role;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use App\Models\User;
use App\Policies\ClientPolicy;
use App\Policies\EmployeePolicy;
use App\Policies\ProjectPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Client::class => ClientPolicy::class,
        Employee::class => EmployeePolicy::class,
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
    }
}
