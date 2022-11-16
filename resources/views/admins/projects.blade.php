<x-layout>
    <div class="container">

        <table>
            <tr class="bg-dark">
                <form method="POST" action="/admins/projects">
                    @csrf
                    <th>
                        <input
                            type="text"
                            name="projectName"
                            placeholder="Project Name"
                            value="{{ request('projectName') ?? null }}"
                    </th>
                    <th>
                        <input
                            type="text"
                            name="clientName"
                            placeholder="Client Name"
                            value="{{ request('clientName') ?? null }}"
                    </th>
                    <th>
                        <Select name="status">
                            <option
                            @if(request('status') === '')
                                selected
                            @endif
                            >All</option>
                            <option value="finished"
                            @if(request('status') === 'finished')
                                selected
                            @endif
                            >Finished</option>
                            <option value="inProgress"
                            @if(request('status') === 'inProgress')
                                selected
                            @endif
                            >In progress</option>
                        </Select>
                    </th>
                    <th>
                        <button type="submit" name="submit">Search</button>
                    </th>
                </form>
            </tr>
            <tr>
                <td colspan="5">
                    <ul class="list-group">
                        @foreach($projects as $project)
                            <li class="list-group-item">{{ $project->title }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </table>
    </div>
</x-layout>
