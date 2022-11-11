<x-layout>
    <div class="container text-center">
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
                        <a href="/clients/{{ $client->slug }}"
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
                        <a href="/clients/{{ $client->slug }}/edit" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="/clients/{{ $client->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-layout>
