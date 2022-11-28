<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateModel;
use App\Actions\UpdateModel;
use App\Actions\StoreFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ValidateClientRequest;
use App\Http\Requests\Admin\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index', ['clients' => Client::simplePaginate(10)]);
    }

    public function show(Request $request, Client $client)
    {
        $this->authorize('view', $client);

        return view('clients.show', ['client' => $client]);
    }

    public function create()
    {
        $this->authorize('create');

        return view('clients.create');
    }

    public function store(Client $client, ValidateClientRequest $request, CreateModel $createModel, StoreFile $storeFile)
    {
        $createModel->handle($client, $request, $storeFile, 'logo', 'logo', 'logos');

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        $this->authorize('update', $client);

        return view('clients.edit', ['client' => $client]);
    }

    public function update(Client $client, ValidateClientRequest $request, UpdateModel $updateModel, StoreFile $storeFile)
    {
        $this->authorize('update', $client);

        $updateModel->handle($client, $request, $storeFile, 'logo', 'logo', 'logos');

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();

        return redirect()->route('clients.index');
    }
}
