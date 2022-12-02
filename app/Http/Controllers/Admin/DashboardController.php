<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;
use App\Services\ClientStatsService;
use App\Services\ProjectStatsService;
use App\Services\EmployeeStatsService;
use Illuminate\Validation\Rules\Enum;

class DashboardController extends Controller
{
    public function stats(ProjectStatsService $projectStats, ClientStatsService $clientStats, EmployeeStatsService $employeeStats)
    {
        return view('admins.index', [
            'clients' => $clientStats->getAll(),
            'projects' => $projectStats->getAll(),
            'employees' => $employeeStats->getAll(),
        ]);
    }

    public function projects()
    {
        $projects = Project::filter()->paginate(10)->withQueryString();
        return view('admins.projects', ['projects' => $projects]);
    }

    public function clients()
    {
        $clients = Client::filter()->paginate(10)->withQueryString();

        return view('admins.clients', ['clients' => $clients]);
    }

    public function employees()
    {
        $employees = User::where('role', '=', Role::EMPLOYEE)->orWhere('role', '=', Role::SUPERIOR)->filter()->paginate(10)->withQueryString();

        return view('admins.employees', ['employees' => $employees]);
    }
}
