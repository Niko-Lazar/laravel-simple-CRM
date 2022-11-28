<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Website</th>
                        @canany(['update', 'delete'], App\Models\Client::class)
                            <th colspan="2">Action</th>
                        @endcanany
                    </tr>
                    @foreach($clients as $client)
                        <tr>
                            <td>
                                @can('view', App\Models\Client::class)
                                    <a href="{{ route('clients.show', $client->slug) }}"
                                       class="btn btn-primary"
                                    >
                                        {{ $client->name }}
                                    </a>
                                @endcan
                                @cannot('view', App\Models\Client::class)
                                        {{ $client->name }}
                                @endcannot
                            </td>
                            <td>{{ $client->logo['path'] }}</td>
                            <td>
                                @if($client->website)
                                    {{ $client->website }}
                                @else
                                    no website
                                @endif
                            </td>
                            @canany(['update', 'delete'], App\Models\Client::class)
                                <td>
                                    <a href="{{ route('clients.edit', $client->slug) }}" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('clients.destroy', $client->slug) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            @endcanany
                        </tr>
                    @endforeach
                </table>
                @can('create', App\Models\Client::class)
                    <div>
                        <a href="{{ route('clients.create') }}">add client</a>
                    </div>
                @endcan
                <div class="mt-4">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
