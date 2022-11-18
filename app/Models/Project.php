<?php

namespace App\Models;

use App\Enums\ROLE;
use App\Enums\ProjectStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $projectTitle = '';
        $clientName = '';
        $status = '%%';
        $dateFrom = '0000-00-00';
        $dateTo = '9999-12-31';

        if(request()->method() == 'POST'){
            $projectTitle = request('projectName');
            $clientName = request('clientName');
            $dateFrom = request('dateFrom');
            $dateTo = request('dateTo');

            if(request('status') === 'finished'){
                $status = ProjectStatus::FINISHED;
            } else if(request('status') === 'inProgress') {
                $status = ProjectStatus::INPROGRESS;
            }

            if(!request('dateFrom')) {
                $dateFrom = '0000-00-00';
            }
            if(!request('dateTo')) {
                $dateTo = '9999-12-31';
            }
        }

        $query->whereHas('client', function($query) use ($clientName) {
            $query->where('name', 'like', '%'.$clientName.'%');
        })
            ->where('title', 'like', '%'.$projectTitle.'%')
            ->where('status', 'like', $status)
            ->whereBetween('deadline', [$dateFrom, $dateTo]);
    }

    public function scopeStats($query) : array
    {
        $allProjects = self::all();

        return [
            'totalProjects' =>$allProjects->count(),
            'numOfFinished' => $allProjects
                ->where('status', '=', ProjectStatus::FINISHED)
                ->count(),
            'numOfInProgress' => $allProjects
                ->where('status', '=', ProjectStatus::INPROGRESS)
                ->count(),
        ];
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
