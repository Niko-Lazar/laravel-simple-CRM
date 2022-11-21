<x-layout>
    <div class="container">

        <table>
            <tr class="bg-dark">
                <form method="GET" action="/admins/clients">
                        <th>
                            <input
                                type="text"
                                name="clientName"
                                placeholder="Client Name"
                                >
                        </th>
                    <th>
                        <input
                            type="text"
                            name="website"
                            placeholder="website"
                        >
                    </th>
                        <th>
                            <select name="logoExtension">
                                <option value="">All</option>
                                <option value="jpg">jpg</option>
                                <option value="jpeg">jpeg</option>
                                <option value="png">png</option>
                                <option value="gif">gif</option>
                                <option value="svg">svg</option>
                            <select>
                        </th>
                        <th>
                            <button type="submit" name="submit">Search</button>
                        </th>
                    </form>
            <tr>
                <td colspan="5">
                    <ul class="list-group">
                        @foreach($clients as $client)
                            <li class="list-group-item">{{ $client->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </table>
    </div>
</x-layout>
