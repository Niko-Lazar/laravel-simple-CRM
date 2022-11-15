<x-layout>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">CRM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employees.index') }}#">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('projects.index') }}">Projects</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                    </tr>
                    <tr>
                        <td>{{ $employees['totalEmployees'] }}</td>
                        <td>{{ $employees['numOfSuperiors'] }}</td>
                        <td>{{ $employees['numOfEmployees'] }}</td>
                    </tr>

                </table>
            </div>

            <div class="col-4">
                <table>
                    <caption>Clients</caption>
                    <tr>
                        <th>No. Clients</th>
                    </tr>
                    <tr>
                        <td>{{ $clients['totalClients'] }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</x-layout>