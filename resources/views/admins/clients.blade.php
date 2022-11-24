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
                                    <option value="" @selected(request('logoExtension') == '')>All</option>
                                    <option value="jpg" @selected(request('logoExtension') == 'jpg')>jpg</option>
                                    <option value="jpeg" @selected(request('logoExtension') == 'jpeg')>jpeg</option>
                                    <option value="png" @selected(request('logoExtension') == 'png')>png</option>
                                    <option value="gif" @selected(request('logoExtension') == 'gif')>gif</option>
                                    <option value="svg" @selected(request('logoExtension') == 'svg')>svg</option>
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
