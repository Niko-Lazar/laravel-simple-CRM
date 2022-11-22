<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreClientRequest;
use App\Http\Requests\admin\UpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index', ['clients' => Client::simplePaginate(10)]);
    }

    public function show(Client $client)
    {
        return view('clients.show', ['client' => $client]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        $attributes = $request->validated();
        $attributes['logo'] = request()->file('logo')->store('logos');

        Client::create($attributes);

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    public function update(Client $client, UpdateClientRequest $update)
    {
        $attributes = $update->validated();

        if(isset($attributes['logo'])) {
            $attributes['logo'] = request()->file('logo')->store('logos');
        }

        $client->update($attributes);

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }
}
