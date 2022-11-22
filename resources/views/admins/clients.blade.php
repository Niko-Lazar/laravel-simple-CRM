<x-layout>
    <div class="container">

        <div class="row">
            <div class="col-6">
                <table>
                    <tr class="bg-dark">
                        <form method="GET" action="/admins/clients">
                            <th>
                                <input
                                    type="text"
                                    name="clientName"
                                    placeholder="Client Name"
                                    value="{{ request('clientName') }}"
                                >
                            </th>
                            <th>
                                <input
                                    type="text"
                                    name="website"
                                    placeholder="website"
                                    value="{{ request('website') }}"
                                >
                            </th>
                            <th>
                                <select name="logoExtension">
                                    <option value="" {{ request('logoExtension') == '' ? 'selected' : null }}>All</option>
                                    <option value="jpg"{{ request('logoExtension') == 'jpg' ? 'selected' : null }}>jpg</option>
                                    <option value="jpeg"{{ request('logoExtension') == 'jpeg' ? 'selected' : null }}>jpeg</option>
                                    <option value="png"{{ request('logoExtension') == 'png' ? 'selected' : null }}>png</option>
                                    <option value="gif"{{ request('logoExtension') == 'gif' ? 'selected' : null }}>gif</option>
                                    <option value="svg"{{ request('logoExtension') == 'svg' ? 'selected' : null }}>svg</option>
                                </select>
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
                    <caption>
                        {{ $clients->links() }}
                    </caption>
                </table>
            </div>
        </div>

    </div>
</x-layout>
