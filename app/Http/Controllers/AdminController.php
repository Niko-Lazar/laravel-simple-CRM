<?php

namespace App\Http\Controllers;

use App\Enums\ROLE;
use App\Enums\ProjectStatus;
use App\Models\Client;
use App\Models\Employee;
use App\Models\EmployeeProject;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function stats()
    {
        return view('admins.index', [
            'clients' => Client::stats(),
            'projects' => Project::stats(),
            'employees' => Employee::stats(),
        ]);
    }

    public function projects()
    {
        $projects = Project::filter()->get();

        return view('admins.projects', ['projects' => $projects]);
    }
}
