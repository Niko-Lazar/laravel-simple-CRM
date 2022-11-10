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

        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'logo' => 'required',
            'slug' => 'required|min:3|max:255',
            'website' => 'nullable'
        ]);

        Client::create($attributes);

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
