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
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->superior->name ?? 'no superiors' }}</td>
            </tr>
        </table>

        <a href="{{ route('users.index') }}" >back</a>
    </div>
</x-layout>
