<x-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <table>
                    <caption>Projects</caption>
                    <tr>
                        <th>No. Projects</th>
                        <th>Finished</th>
                        <th>In Progress</th>
                    </tr>
                    <tr>
                        <td>{{ $projects['totalProjects'] }}</td>
                        <td>{{ $projects['numOfFinished'] }}</td>
                        <td>{{ $projects['numOfInProgress'] }}</td>
                    </tr>

                </table>
            </div>

            <div class="col-4">
                <table>
                    <caption>Employees</caption>
                    <tr>
                        <th>No. Employees</th>
                        <th>Superiors</th>
                        <th>Employees</th>
                        <th>Employees w/o project</th>
                    </tr>
                    <tr>
                        <td>{{ $employees['totalEmployees'] }}</td>
                        <td>{{ $employees['numOfSuperiors'] }}</td>
                        <td>{{ $employees['numOfEmployees'] }}</td>
                        <td>{{ $employees['employeesWithoutProjects'] }}</td>
                    </tr>

                </table>
            </div>

            <div class="col-4">
                <table>
                    <caption>Clients</caption>
                    <tr>
                        <th>No. Clients</th>
                        <th>Websites</th>
                    </tr>
                    <tr>
                        <td>{{ $clients['totalClients'] }}</td>
                        <td>{{ $clients['numOfWebsites'] }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</x-layout>
