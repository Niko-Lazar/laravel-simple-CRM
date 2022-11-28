<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>role</th>
                        <th>Superior</th>
                        <th>Projects</th>
                        @can(['update', 'delete'], App\Models\Employee::class)
                            <th colspan="2">Action</th>
                            @elsecanany(['update'], App\Models\Employee::class)
                                <th >Action</th>
                        @endcan

                    </tr>
                    @foreach($employees as $employee)
                        <tr>
                            <td>
                                <a class="btn btn-primary" href="{{ route('employees.show', $employee->id) }}">{{ $employee->name }}</a>
                            </td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->role }}</td>
                            <td>{{ $employee->superior->name }}</td>
                            <td>
                                @if(!($employee->projects->count()))
                                    no projects
                            @else
                                @foreach($employee->projects as $employeeProject)
                                    {{ $employeeProject->title }}
                                @endforeach
                            @endif
                            @can(['update', 'delete'], App\Models\Employee::class)
                                <td>
                                    <a class="btn btn-warning" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
                                        @csrf
                                        @method('Delete')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            @elsecan(['update'], App\Models\Employee::class)
                                <td>
                                    <a class="btn btn-warning" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </table>
                @canany(['update', 'delete'], App\Models\Employee::class)
                    <div>
                        <a href="{{ route('employees.create') }}">add employee</a>
                    </div>
                @endcanany
                <div class="mt-4">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
