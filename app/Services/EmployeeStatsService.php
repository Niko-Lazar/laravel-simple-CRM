<?php

namespace App\Services;

use App\Enums\Role;
use App\Models\EmployeeProject;
use Illuminate\Support\Facades\DB;

class EmployeeStatsService
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
            ->where('role', '=', Role::SUPERIOR)
            ->count('role');
    }

    public function getEmployees() : int
    {
        return DB::table('employees')
            ->where('role', '=', Role::EMPLOYEE)
            ->count('role');
    }

    public function getEmployeesWithoutProjects() : int
    {
        return DB::table('employees')
            ->whereNotIn('id', EmployeeProject::all()->pluck('employee_id'))
            ->count();
    }
}
