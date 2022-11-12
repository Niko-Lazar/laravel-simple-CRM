<x-layout>
    <div class="container text-center">
        <table>
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>phone</th>
                <th>role</th>
                <th>Superior</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach($employees as $employee)
                <tr>
                    <td>
                        <a class="btn btn-primary" href="/employees/{{ $employee->id }}">{{ $employee->name }}</a>
                    </td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->role }}</td>
                    <td>{{ $employee->superior->name ?? 'no superiors' }}</td>
                    <td>
                        <a class="btn btn-warning" href="/employees/{{ $employee->id }}/edit">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="/employees/{{ $employee->id }}">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="/employees/create">add employee</a>
        </div>
    </div>
</x-layout>
