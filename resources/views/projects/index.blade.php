<x-layout>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <table>
                    <tr>
                        <th>title</th>
                        <th>slug</th>
                        <th>description</th>
                        <th>deadline</th>
                        <th>status</th>
                        <th>Client</th>
                        <th>Employees</th>
                        <th colspan="2">Action</th>
                    </tr>
                    @foreach($projects as $project)
                        <tr>
                            <td>
                                <a href="/projects/{{ $project->slug }}"
                                   class="btn btn-primary"
                                >
                                    {{ $project->title }}
                                </a>
                            </td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->deadline }}</td>
                            <td>{{ $project->status }}</td>
                            <td>{{ $project->client->name }}</td>
                            <td>
                                @if(!($project->employees->count()))
                                    no employees
                                @else
                                    @foreach($project->employees as $projectEmployee)
                                        {{ $projectEmployee->name }}
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-warning" href="projects/{{ $project->slug }}/edit">Edit</a>
                            </td>
                            <td>
                                <form action="projects/{{ $project->slug }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div>
                    <a href="projects/create">add project</a>
                </div>
                <div class="mt-4">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
