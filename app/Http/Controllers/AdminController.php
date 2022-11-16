<?php

namespace App\Http\Controllers;

use App\Enums\EmployeeRoleEnum;
use App\Enums\ProjectStatusEnum;
use App\Models\Client;
use App\Models\Employee;
use App\Models\EmployeeProject;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function stats()
    {
        $allProjects = Project::all();
        $allEmployees = Employee::all();
        $allClients = Client::all();

        $projects = [
            'totalProjects' =>$allProjects->count(),
            'numOfFinished' => $allProjects
                ->where('status', '=', ProjectStatusEnum::Finished)
                ->count(),
            'numOfInProgress' => $allProjects
                ->where('status', '=', ProjectStatusEnum::InProgress)
                ->count(),
        ];

        $employees = [
            'totalEmployees' => $allEmployees
                ->count(),
            'numOfSuperiors' => $allEmployees
                ->where('role', '=', EmployeeRoleEnum::Superior->value)
                ->count(),
            'numOfEmployees' =>$allEmployees
                ->where('role', '=', EmployeeRoleEnum::Employee->value)
                ->count(),
            'employeesWithoutProjects' => $allEmployees
                ->whereNotIn('id',
                    EmployeeProject::all()->pluck('employee_id')
                )
                ->count()
        ];

        $clients = [
            'totalClients' => $allClients->count(),
            'numOfWebsites' => $allClients
                ->whereNotNull('website')
                ->count(),
        ];

        return view('admins.index', [
            'projects' => $projects,
            'employees' => $employees,
            'clients' => $clients,
        ]);
    }

    public function projects()
    {
        $projects = Project::filter()->get();

        return view('admins.projects', ['projects' => $projects]);
    }
}
