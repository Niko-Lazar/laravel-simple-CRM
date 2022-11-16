<?php

namespace App\Models;

use App\Enums\ProjectStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
