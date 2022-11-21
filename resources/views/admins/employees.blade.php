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
                        >
                    </th>
                    <th>
                        <input
                            type="text"
                            name="email"
                            placeholder="Employee email"
                        >
                    </th>
                    <th>
                        <input
                            type="text"
                            name="phone"
                            placeholder="phone"
                        >
                    </th>
                    <th>
                        <select name="role">
                            <option value="">All</option>
                            <option value="employee">Employee</option>
                            <option value="superior">Superior</option>
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
        </table>
    </div>
</x-layout>
