<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th colspan="2">Action</th>
                    </tr>
                    @foreach($clients as $client)
                        <tr>
                            <td>
                                <a href="{{ route('clients.show', $client->slug) }}"
                                   class="btn btn-primary"
                                >
                                    {{ $client->name }}
                                </a>
                            </td>
                            <td>{{ $client->logo }}</td>
                            <td>
                                @if($client->website)
                                    {{ $client->website }}
                                @else
                                    no website
                                @endif
                            </td>
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
                        </tr>
                    @endforeach
                </table>
                <div>
                    <a href="{{ route('clients.create') }}">add client</a>
                </div>
                <div class="mt-4">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
