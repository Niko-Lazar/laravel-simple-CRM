<nav class="navbar navbar-expand-lg bg-dark navbar-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">CRM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="dropdown">
                    <a class="btn btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dashboard
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/admins/stats">Stats</a></li>
                        <li><a class="dropdown-item" href="/admins/projects">Projects</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
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
