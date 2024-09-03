<!-- Toggle Button -->
<button id="sidebarToggle" class="sidenav-toggle d-lg-none">
    <i class="fas fa-bars"></i>
</button>

<!-- Sidebar -->
<aside id="sidebar" class="sidenav">
    <div class="sidenav-header">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/img/logo-removebg-preview.png') }}" class="navbar-brand-img" alt="Logo">
            <span class="font-weight-bold">Dashboard T-ticket</span>
        </a>
    </div>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('home-dashboard') ? 'active' : '' }}" href="{{ url('home-dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/seminar-management') ? 'active' : '' }}" href="{{ route('dashboard.seminarM') }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Seminar Management</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/ticket-management') ? 'active' : '' }}" href="{{ route('dashboard.ticketM') }}">
                <i class="fas fa-ticket-alt"></i>
                <span>Manajemen Tiket</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/pengguna') ? 'active' : '' }}" href="{{ route('dashboard.pengguna') }}">
                <i class="fas fa-user"></i>
                <span>Pengguna</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard/reports') ? 'active' : '' }}" href="{{ route('dashboard.reports') }}">
                <i class="fas fa-chart-line"></i>
                <span>Reports</span>
            </a>
        </li>
    </ul>
</aside>