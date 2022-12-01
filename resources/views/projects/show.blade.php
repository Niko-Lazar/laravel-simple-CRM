<x-layout>
    <div class="container">
        <table>
            <tr>
                <th>title</th>
                <th>slug</th>
                <th>description</th>
                <th>deadline</th>
                <th>status</th>
                <th>Client</th>
            </tr>
            <tr>
                <td>{{ $project->title }}</td>
                <td>{{ $project->slug }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->deadline }}</td>
                <td>{{ $project->status }}</td>
                <td>{{ $project->client->name }}</td>
            </tr>
        </table>

        <a href="{{ route('users.index') }}" >back</a>
    </div>
</x-layout>
