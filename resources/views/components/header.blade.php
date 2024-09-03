<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a href="{{ url('/') }}"><img src="{{ asset('assets/img/logo-removebg-preview.png') }}" alt="logo" width="68" height="68" class="m-0 p-0"></a>
        <a class="navbar-brand" href="{{ url('/') }}">T-Ticket</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item {{ request()->is('kategori') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/kategori') }}">Kategori</a>
                </li>
                <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-light">
                        <a href="{{ url('/login') }}" class="fw-bold text-light">Login</a>
                    </button>
                </li>
<!--                 
                    <li class="nav-item d-flex gap-2 align-items-center">
                        <div class="row">
                            <div class="col d-flex gap-2 align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-circle text-light" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg>
                                <a href="login.php" class="p-0 m-0">
                                    <p class="text-light fw-bold">user</p>
                                </a>
                            </div>
                        </div>
                    </li> 
                    -->
            </ul>
        </div>
    </div>
</nav>