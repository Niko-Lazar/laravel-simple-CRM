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
                        <li><a class="dropdown-item" href="{{ route('admins.dashboard.stats') }}">Stats</a></li>
                        <li><a class="dropdown-item" href="{{ route('admins.dashboard.projects') }}">Projects</a></li>
                        <li><a class="dropdown-item" href="{{ route('admins.dashboard.clients') }}">Clients</a></li>
                        <li><a class="dropdown-item" href="{{ route('admins.dashboard.employees') }}">Employees</a></li>
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

    @auth
        <div class="mr-4">
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <button type="submit" name="submit" class="btn btn-secondary">logout</button>
            </form>
        </div>
    @endauth
    @guest
        @if(!Route::is('login'))
            <div class="mr-2">
                <a href="{{ route('login') }}" class="btn btn-secondary">login</a>
            </div>
        @endif
            <div class="mr-2">
                <a href="/register" class="btn btn-secondary">Register</a>
            </div>
    @endguest
</nav>
