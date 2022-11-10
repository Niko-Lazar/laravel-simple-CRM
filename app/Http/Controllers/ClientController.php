<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index', ['clients' => Client::all()]);
    }

    public function show(Client $client)
    {
        return view('client.show', ['client' => $client]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store()
    {

        $client = new Client;

        $client->name = request('name');
        $client->logo = request('logo');
        $client->slug = request('slug');
        $client->website = request('website');

        $client->save();

        return redirect('/clients');
    }

    public function edit(CLient $client)
    {
        return view('client.edit', ['client' => $client]);
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect('/clients');
    }
}
