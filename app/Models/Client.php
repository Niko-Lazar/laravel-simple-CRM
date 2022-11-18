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
    public function scopeStats($query) : array
    {
        return [
            'totalClients' => DB::table('clients')->count(),
            'numOfWebsites' => DB::table('clients')
                ->whereNotNull('website')
                ->count(),
        ];
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
