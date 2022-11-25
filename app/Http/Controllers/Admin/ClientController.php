<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ValidateClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ValidateClientRequest;
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

    public function store(ValidateClient $validate, ValidateClientRequest $request)
    {
        Client::create($validate->handle($request));

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    public function update(Client $client, ValidateClient $validate, ValidateClientRequest $request)
    {
        $attributes = $validate->handle($request);

        $client->update($attributes);

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }
}
