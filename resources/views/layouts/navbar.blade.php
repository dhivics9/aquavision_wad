<nav class="navbar bg-body-secondary rounded-3 p-2">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold fs-3">{{ $nav ?? 'Dashboard' }}</a>
        {{-- @if (!Route::is('dashboard'))
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        @endif --}}
        @if (Auth::check())
        <div class="dropdown ms-auto">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('images/person-fill.svg') }}" alt="">
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
        </div>
        @endif
    </div>
</nav>
