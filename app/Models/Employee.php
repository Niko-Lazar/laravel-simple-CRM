<?php

namespace App\Models;

use App\Enums\ROLE;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => ROLE::class
    ];

    // accesors
    protected function name() : Attribute
    {
        return Attribute::make(
            get: fn($name) => ucwords($name),
        );
    }

    public function scopeSuperiors($query)
    {
        return $query->where('role', 'superior');
    }

    // scopes
    public function scopeStats()
    {
        $allEmployees = self::all();

        return [
            'totalEmployees' => $allEmployees
                ->count(),
            'numOfSuperiors' => $allEmployees
                ->where('role', '=', ROLE::SUPERIOR->value)
                ->count(),
            'numOfEmployees' =>$allEmployees
                ->where('role', '=', ROLE::EMPLOYEE->value)
                ->count(),
            'employeesWithoutProjects' => $allEmployees
                ->whereNotIn('id',
                    EmployeeProject::all()->pluck('employee_id')
                )
                ->count()
        ];
    }


    // relations
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function superiorTo()
    {
        return $this->hasMany(Employee::class);
    }

    public function superior()
    {
        return $this->belongsTo(Employee::class, 'employee_id')->withDefault(['name' => 'no superiors']);
    }
}
