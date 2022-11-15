<?php

namespace App\Models;

use App\Enums\EmployeeRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => EmployeeRoleEnum::class
    ];

    public function scopeSuperiors($query)
    {
        return $query->where('role', 'superior');
    }

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
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
