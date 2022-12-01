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
                            <th colspan="2">Action</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <a class="btn btn-primary"
                                   href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->superior->name }}</td>
                            <td>
                                @if(!($user->projects->count()))
                                    no projects
                            @else
                                @foreach($user->projects as $userProject)
                                    {{ $userProject->title }}
                                @endforeach
                            @endif
                                <td>
                                    <a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                        @csrf
                                        @method('Delete')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                        </tr>
                    @endforeach
                </table>
                    <div>
                        <a href="{{ route('users.create') }}">add user</a>
                    </div>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
