<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/logo-removebg-preview.png') }}">
    <link rel="icon" href="{{ asset('assets/img/logo-removebg-preview.png') }}" type="image/x-icon">
    <title>T-ticket Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style-dashboard.css') }}" type="text/css" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        @include('dashboard.components.sidebar-d')

        <div class="main-content">
            @include('dashboard.components.navbar')

            @yield('content')

            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Tentang Kami</h5>
                            <p>Kami adalah perusahaan e-ticketing terkemuka yang menyediakan layanan reservasi tiket seminar dan konferensi. Misi kami adalah memberikan pengalaman reservasi yang mudah dan cepat bagi semua pengguna.</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Kontak</h5>
                            <ul class="list-unstyled">
                                <li><a href="mailto:info@eticketing.com">info@eticketing.com</a></li>
                                <li><a href="tel:+62212345678">+62 21 2345678</a></li>
                                <li>Jl. Semangat No. 45, Jakarta</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5>Ikuti Kami</h5>
                            <div class="social-icons">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center">
                            <p>&copy; 2024 E-Ticketing Seminar & Konferensi. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- JavaScript for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');

            sidebarToggle.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    sidebar.classList.toggle('sidenav-hidden');
                }
            });
        });
    </script>
</body>

</html>