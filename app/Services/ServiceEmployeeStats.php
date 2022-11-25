<?php

namespace App\Services;

use App\Enums\ROLE;
use App\Models\EmployeeProject;
use Illuminate\Support\Facades\DB;

class ServiceEmployeeStats
{
    public function getAll() : array
    {
        $rolesCount = DB::table('employees')->select(DB::raw('count(role) as count'))->groupBy('role')->get();

        return [
            'totalEmployees' => $this->getTotal(),
            'numOfSuperiors' => $rolesCount[1]->count,
            'numOfEmployees' => $rolesCount[0]->count,
            'employeesWithoutProjects' => $this->getEmployeesWithoutProjects(),
        ];
    }

    public function getTotal() : int
    {
        return DB::table('employees')
            ->count();
    }

    public function getSuperiors() : int
    {
        return DB::table('employees')
            ->where('role', '=', ROLE::SUPERIOR)
            ->count('role');
    }

    public function getEmployees() : int
    {
        return DB::table('employees')
            ->where('role', '=', ROLE::EMPLOYEE)
            ->count('role');
    }

    public function getEmployeesWithoutProjects() : int
    {
        return DB::table('employees')
            ->whereNotIn('id', EmployeeProject::all()->pluck('employee_id'))
            ->count();
    }
}
