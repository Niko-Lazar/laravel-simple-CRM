<?php

namespace App\Http\Controllers;

use App\Enums\EmployeeRole;
use App\Enums\ProjectStatusEnum;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function projects()
    {
        $projects = [
            'totalProjects' =>Project::all()->count(),
            'numOfFinished' => Project::all()
                ->where('status', '=', ProjectStatusEnum::Finished)
                ->count(),
            'numOfInProgress' => Project::all()
                ->where('status', '=', ProjectStatusEnum::InProgress)
                ->count(),
        ];

        $employees = [
            'totalEmployees' => Employee::all()
                ->count(),
            'numOfSuperiors' => Employee::all()
                ->where('role', '=', EmployeeRole::Superior)
                ->count(),
            'numOfEmployees' =>Employee::all()
                ->where('role', '=', EmployeeRole::Employee)
                ->count(),
        ];

        $clients = [
            'totalClients' => Client::all()->count(),
        ];

        return view('admins.index', [
            'projects' => $projects,
            'employees' => $employees,
            'clients' => $clients,
        ]);
    }
}
