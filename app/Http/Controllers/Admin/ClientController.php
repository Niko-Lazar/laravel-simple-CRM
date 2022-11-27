<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateModel;
use App\Actions\UpdateModel;
use App\Actions\StoreFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateClientRequest;
use App\Http\Requests\Admin\UpdateClientRequest;
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

    public function store(Client $client, ValidateClientRequest $request, CreateModel $createModel, StoreFile $storeFile)
    {
        $createModel->handle($client, $request, $storeFile, 'logo', 'logo', 'logos');

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    public function update(Client $client, ValidateClientRequest $request, UpdateModel $updateModel, StoreFile $storeFile)
    {
        $updateModel->handle($client, $request, $storeFile, 'logo', 'logo', 'logos');

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }
}
