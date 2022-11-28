<x-layout>
    <div class="container">
        <table>
            <tr>
                <th>Name</th>
                <th>Logo</th>
                <th>Website</th>
            </tr>
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->logo['path'] }}</td>
                <td>
                    @if($client->website)
                        {{ $client->website }}
                    @else
                        no website
                    @endif
                </td>
            </tr>
        </table>

        <a href="{{ route('clients.index') }}">back</a>
    </div>
</x-layout>
