<x-layout>
    <div class="container">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Superior</th>
            </tr>
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->phone }}</td>
                <td>{{ $employee->role }}</td>
                <td>{{ $employee->superior->name ?? 'no superiors' }}</td>
            </tr>
        </table>

        <a href="{{ route('employees.index') }}" >back</a>
    </div>
</x-layout>
