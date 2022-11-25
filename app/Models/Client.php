<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    // accessors
    protected function name() : Attribute
    {
        return Attribute::make(
            get: fn($name) => ucwords($name),
        );
    }

    // scopes
    public function scopeFilter($query)
    {
        return $query
            ->where('name', 'like', '%'.request('clientName').'%')
            ->where('logo', 'like', '%.'.request('logoExtension').'%')
            ->when(request('website'), fn($query) => $query->where('website', 'like', '%'.request('website').'%'));
    }

    protected function Slug() : Attribute
    {
        return Attribute::make(
            get: fn($slug) => strtolower($slug),
        );
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
