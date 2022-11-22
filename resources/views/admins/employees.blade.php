<x-layout>
    <div class="container">

        <table>
            <tr class="bg-dark">
                <form method="GET" action="/admins/employees">
                    <th>
                        <input
                            type="text"
                            name="name"
                            placeholder="Employee name"
                            value="{{ request('name') }}"
                        >
                    </th>
                    <th>
                        <input
                            type="text"
                            name="email"
                            placeholder="Employee email"
                            value="{{ request('email') }}"
                        >
                    </th>
                    <th>
                        <input
                            type="text"
                            name="phone"
                            placeholder="phone"
                            value="{{ request('phone') }}"
                        >
                    </th>
                    <th>
                        <select name="role">
                            <option value="" {{ request('role') == '' ? 'selected' : null }}>All</option>
                            <option value="employee" {{ request('role') == 'employee' ? 'selected' : null }}>Employee</option>
                            <option value="superior" {{ request('role') == 'superior' ? 'selected' : null }}>Superior</option>
                        </select>
                    </th>
                    <th>
                        <button type="submit" name="submit">Search</button>
                    </th>
                </form>
            <tr>
                <td colspan="5">
                    <ul class="list-group">
                        @foreach($employees as $employee)
                            <li class="list-group-item">{{ $employee->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <caption>{{ $employees->links() }}</caption>
        </table>
    </div>
</x-layout>
