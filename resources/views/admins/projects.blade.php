<x-layout>
    <div class="container">

        <table>
            <tr class="bg-dark">
                <form method="GET" action="{{ route('admins.dashboard.projects') }}">
                    <tr>
                        <th>
                            <input
                                type="text"
                                name="projectName"
                                placeholder="Project Name"
                                value="{{ request('projectName') ?? null }}"
                                >
                        </th>
                        <th>
                            <input
                                type="text"
                                name="clientName"
                                placeholder="Client Name"
                                value="{{ request('clientName') ?? null }}"
                                >
                        </th>
                        <th>
                            <Select name="status">
                                <option value=""
                                    @if(request('status') === '')
                                        selected
                                    @endif
                                >All</option>
                                <option value="finished"
                                        @if(request('status') === 'finished')
                                            selected
                                    @endif
                                >Finished</option>
                                <option value="in progress"
                                        @if(request('status') === 'inProgress')
                                            selected
                                        @endif
                                >In progress</option>
                            </Select>
                        </th>
                        <th>
                            <button type="submit" name="submit">Search</button>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="dateFrom">date from</label>
                            <input
                                type="date"
                                name="dateFrom"
                                id="dateFrom"
                                value="{{ request('dateFrom') }}"
                            />
                        </th>
                        <th>
                            <label for="dateTo">date to</label>
                            <input
                                type="date"
                                name="dateTo"
                                id="dateTo"
                                value="{{ request('dateTo') }}"
                            />
                        </th>
                        <th colspan="2">
                            <button type="reset" name="reset" value="reset">Reset</button>
                        </th>
                    </tr>
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
            <caption>{{ $projects->links() }}</caption>
        </table>
    </div>
</x-layout>
