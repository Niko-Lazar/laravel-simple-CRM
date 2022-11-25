<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class ServiceClientStats
{
    public function getAll() : array
    {
        $stats = DB::table('clients')
            ->select(DB::raw('count(id) as totalClients, count(website) as numOfWebsites'))
            ->get();

        return [
            'totalClients' => $stats[0]->totalClients,
            'numOfWebsites' => $stats[0]->numOfWebsites
        ];
    }

    public function getWebsites() : int
    {
        return DB::table('clients')->count('website')->get();
    }

    public function getClients() : int
    {
        return DB::table('clients')->count('id');
    }
}
