<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => Role::class
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
    public function scopeFilter($query)
    {
        return $query
            ->where('name', 'like', '%'.request('name').'%')
            ->where('email', 'like', '%'.request('email').'%')
            ->where('phone', 'like', '%'.request('phone').'%')
            ->when(request('role'), fn($query) => $query->where('role', 'like', '%'.request('role').'%'));
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
