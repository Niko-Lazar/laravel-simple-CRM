<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => Role::class,
    ];

    protected function password() : Attribute
    {
        return Attribute::make(
            set: fn($value) => Hash::make($value)
        );
    }

    // accesors
    protected function name() : Attribute
    {
        return Attribute::make(
            get: fn($name) => ucwords($name),
        );
    }

    public function scopeSuperiors($query)
    {
        return $query->where('role', '=', Role::SUPERIOR);
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
        return $this->hasMany(User::class);
    }

    public function superior()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault(['name' => 'no superiors']);
    }
}
