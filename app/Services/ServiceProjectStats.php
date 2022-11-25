<?php

namespace App\Services;

use App\Enums\ProjectStatus;
use Illuminate\Support\Facades\DB;

class ServiceProjectStats
{
    public function getAll() : array
    {
        $projects = DB::table('projects')->select(DB::raw('count(status) as status'))->groupBy('status')->get();

        return [
            'totalProjects' => $this->getTotal(),
            'numOfFinished' => $projects[0]->status,
            'numOfInProgress' => $projects[1]->status,
        ];
    }

    public function getTotal() : int
    {
        return DB::table('projects')->count();
    }

    public function getFinished() : int
    {
        return DB::table('projects')
            ->where('status', '=', ProjectStatus::FINISHED)
            ->count();
    }

    public function getInProgress() : int
    {
        return DB::table('projects')
            ->where('status', '=', ProjectStatus::INPROGRESS)
            ->count();
    }
}
