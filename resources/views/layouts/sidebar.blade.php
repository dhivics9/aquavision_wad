@php
@endphp

<nav class="">
    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-3 text-white min-vh-100 ">
        <a href="/home" class="d-flex align-items-center pb-3 mb-md-3 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline fw-bold">AquaVision</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item mb-5 @if (Route::is('home')) fw-bold @endif">
                <a href="/home" class="nav-link px-0 align-middle text-white d-flex">
                    <div class="">
                        <span class="material-symbols-rounded">
                            dashboard
                        </span>
                    </div>
                    <div class="ms-3 d-none d-sm-inline fs-5">
                        <span>Dashboard</span>
                    </div>
                    @if (Route::is('home'))
                        <div class="ms-3">
                            <span class="material-symbols-rounded fs-6 text-warning shadow">circle</span>
                        </div>
                    @endif
                </a>
            </li>
            <li class="mb-3 @if (Route::is('sensor.index')) fw-bold ms-3 @endif">
                <a href="/sensor" class="nav-link px-0 align-middle text-white d-flex">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="animated-image" width="25" height="25" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M7 0a1.5 1.5 0 0 0-1.5 1.5v11a1.5 1.5 0 0 0 1.404 1.497c-.35.305-.872.678-1.628 1.056A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .224-.947c-.756-.378-1.278-.75-1.628-1.056A1.5 1.5 0 0 0 10.5 12.5v-11A1.5 1.5 0 0 0 9 0zm1 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m.5 1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M8 9a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1"/>
                        </svg>
                    </div>
                    <div class="ms-3 d-none d-sm-inline ">
                        <span>Data Sensor</span>
                    </div>
                    @if (Route::is('sensor.index'))
                        <div class="ms-3">
                            <span class="material-symbols-rounded fs-6 text-warning shadow">circle</span>
                        </div>
                    @endif
                </a>
            </li>
            <li class="mb-3 @if (Route::is('analisis')) fw-bold ms-3 @endif">
                <a href="/analisis/index" class="nav-link px-0 align-middle text-white d-flex">
                    <div class="">
                        <span class="material-symbols-rounded">
                            book_4
                        </span>
                    </div>
                    <div class="ms-3 d-none d-sm-inline ">
                        <span>Daftar Monitoring Air</span>
                    </div>
                    @if (Route::is('analisis'))
                        <div class="ms-3">
                            <span class="material-symbols-rounded fs-6 text-warning shadow">circle</span>
                        </div>
                    @endif
                </a>
            </li>

            <li class="mb-3 @if (Route::is('dosen.create')) fw-bold ms-3 @endif">
                <a href="/dosen/create" class="nav-link px-0 align-middle text-white d-flex">
                    <div class="">
                        <span class="material-symbols-rounded">
                            add
                        </span>
                    </div>
                    <div class="ms-3 d-none d-sm-inline ">
                        <span>Tambah Sensor</span>
                    </div>
                    @if (Route::is('dosen.create'))
                        <div class="ms-3">
                            <span class="material-symbols-rounded fs-6 text-warning shadow">circle</span>
                        </div>
                    @endif
                </a>
            </li>
            {{-- <li class="mb-3 @if (Route::is('sensor')) fw-bold ms-3 @endif">
                <a href="/sensor" class="nav-link px-0 align-middle text-white d-flex">
                    <div class="">
                        <span class="material-symbols-rounded">
                            book_4
                        </span>
                    </div>
                    <div class="ms-3 d-none d-sm-inline ">
                        <span>Data Analisis</span>
                    </div>
                    @if (Route::is('sensor'))
                        <div class="ms-3">
                            <span class="material-symbols-rounded fs-6 text-warning shadow">circle</span>
                        </div>
                    @endif
                </a>
            </li> --}}
        </ul>
        <hr>
        {{-- @if (Auth::check())
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        @endif --}}
    </div>
</nav>
