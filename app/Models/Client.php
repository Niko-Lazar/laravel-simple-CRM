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
        $stats = DB::table('clients')->select(DB::raw('count(id) as totalClients, count(website) as numOfWebsites'))->get();

        return [
            'totalClients' => $stats[0]->totalClients,
            'numOfWebsites' => $stats[0]->numOfWebsites
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
