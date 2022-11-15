<?php

namespace App\Models;

use App\Enums\ProjectStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => ProjectStatusEnum::class
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // accessors
    public function getTitleAttribute($title) : string
    {
        return ucwords($title);
    }

    public function getDescriptionAttribute($description) : string
    {
        return ucfirst($description);
    }

    // relations
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
