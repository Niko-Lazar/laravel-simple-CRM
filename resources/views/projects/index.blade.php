<x-layout>
    <div class="container text-center">
        <table>
            <tr>
                <th>title</th>
                <th>slug</th>
                <th>description</th>
                <th>deadline</th>
                <th>status</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->deadline }}</td>
                    <td>{{ $project->status }}</td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="">add project</a>
        </div>
    </div>
</x-layout>
