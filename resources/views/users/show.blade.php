<x-layout>
    <div class="container">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Superior</th>
                @if(in_array($user->role->value, ['superior', 'employee']))
                    <th class="text-center">Projects</th>
                @endif
            </tr>
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->superior->name ?? 'no superiors' }}</td>
                @if(in_array($user->role->value, ['superior', 'employee']))
                    <td>
                        <a class="btn btn-primary" href="{{ route('assignProject.create', $user->id) }}" >Assign Projects</a>
                    </td>
                @endif
            </tr>
        </table>

        <a href="{{ route('users.index') }}" >back</a>
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block mt-4">
                <strong>{{ $message }}</strong>
            </div>
        @endif
    </div>
</x-layout>
