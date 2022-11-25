<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ROLE;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use App\Services\ServiceClientStats;
use App\Services\ServiceProjectStats;
use App\Services\ServiceEmployeeStats;
use Illuminate\Validation\Rules\Enum;

class DashboardController extends Controller
{
    public function stats(ServiceProjectStats $projectStats, ServiceClientStats $clientStats, ServiceEmployeeStats $employeeStats)
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
        $employees = Employee::filter()->paginate(10)->withQueryString();

        return view('admins.employees', ['employees' => $employees]);
    }
}
