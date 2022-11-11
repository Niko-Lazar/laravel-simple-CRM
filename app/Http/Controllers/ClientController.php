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
            'logo' => 'required|image',
            'slug' => 'required|min:3|max:255',
            'website' => 'nullable'
        ]);

        $attributes['logo'] = request()->file('logo')->store('logos');

        Client::create($attributes);

        return redirect('/clients');
    }

    public function edit(Client $client)
    {
        return view('client.edit', ['client' => $client]);
    }

    public function update(Client $client)
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:255',
            'logo' => 'required',
            'slug' => 'required|min:3|max:255',
            'website' => 'nullable'
        ]);

        $client->update($attributes);

        return redirect('/clients');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect('/clients');
    }
}
