<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    // accessors
    public function getNameAttribute($name) : string
    {
        return ucwords($name);
    }

    public function getSlugAttribute($slug) : string
    {
        return strtolower($slug);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
