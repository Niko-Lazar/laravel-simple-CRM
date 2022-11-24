<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ROLE;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Validation\Rules\Enum;

class DashboardController extends Controller
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
