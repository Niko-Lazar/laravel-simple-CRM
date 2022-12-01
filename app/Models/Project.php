<?php

namespace App\Models;

use App\Enums\Role;
use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => ProjectStatus::class
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // accessors
    protected function title() : Attribute
    {
        return Attribute::make(
            get: fn($title) => ucwords($title),
        );
    }

    protected function description() : Attribute
    {
        return Attribute::make(
            get: fn($desc) => ucfirst($desc),
        );
    }

    // scopes
    public function scopeFilter($query)
    {
        $projectTitle = request('projectName', '');
        $clientName = request('clientName', '');
        $dateFrom = request('dateFrom', '');
        $dateTo = request('dateTo', '');
        $status = request('status');
        $search = request('search', '');

        $query->whereHas('client', function ($query) use ($clientName) {
            $query->where('name', 'like', '%' . $clientName . '%');
        })
            ->where('title', 'like', '%' . $projectTitle . '%')
            ->when($status, fn($query) => $query->where('status', request()->enum('status', ProjectStatus::class)))
            ->when($dateFrom && $dateTo, fn($query) => $query->whereBetween('deadline', [$dateFrom, $dateTo]));
    }

    // relations
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function employees()
    {
        return $this->belongsToMany(User::class);
    }
}
