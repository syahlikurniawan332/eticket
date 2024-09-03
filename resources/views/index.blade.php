@section('title', 'Home Page')

<x-app>

    <!-- Welcome to page -->
    <div class="container-fluid m-0 p-0 text-center position-relative">
        <img src="{{ asset('assets/img/seminar-hero.jpg') }}" class="img-fluid" alt="Seminar Hero Image">
        <div class="position-absolute top-50 start-50 translate-middle text-center text-light overlay-text-1">
            <h1 class="display-4 text-light fw-bold fs-4 fs-md-2 fs-lg-1">Bergabunglah dalam Revolusi Teknologi!</h1>
            <p class="lead text-shadow">Temukan tren terbaru dan solusi inovatif di bidang teknologi</p>
        </div>
        <div class="position-absolute bottom-0 start-50 translate-middle-x text-center text-light overlay-text d-none d-md-block">
            <p>Dunia teknologi berkembang pesat. Seminar ini membahas inovasi terbaru dan aplikasi teknologi masa depan. Dapatkan wawasan mendalam untuk unggul di era digital ini.</p>
        </div>
    </div>
    <!-- End -->

    <!-- yok segera daftar -->
    <div class="container mt-5">
        <div class="row text-center">
            <h3 class="mb-4 section-title">Yok Segera Daftar</h3>
        </div>
        <div class="card-container">
            <button class="scroll-btn prev" onclick="scrollCards(-1)">&#9664;</button>
            <div class="scrolling-wrapper">
                @foreach($seminars as $seminar)
                <div class="card shadow-sm">
                    <img src="{{ asset('images/' . $seminar->img) }}" class="card-img-top" alt="{{ $seminar->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $seminar->title }}</h5>
                        <p class="card-text">{{ Str::limit($seminar->description, 100, '...') }}</p>
                        @foreach ($seminar->tickets as $ticket)
                        <p class="text-secondary fw-bold">{{ $ticket->jenis_tiket }}</p>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('pageTiket', $seminar->id) }}" class="btn btn-primary">Daftar</a>
                        <div class="price-info">
                            <p class="label">Harga</p>
                            @foreach ($seminar->tickets as $ticket)
                            <p class="price">Rp. {{ number_format($ticket->harga, 0, ',', '.') }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="scroll-btn next" onclick="scrollCards(1)">&#9654;</button>
        </div>
    </div>
    <!-- end -->

    <!-- layanan -->
    <div class="container text-center layanan-1">
        <img src="{{ asset('assets/img/page3.jpg') }}" class="img-fluid img-center rounded" alt="Service Image">
        <h1 class="my-5 section-title">LAYANAN KAMI</h1>
        <div class="row justify-content-center layanan">
            <div class="col-12 col-md-4 mb-4">
                <div class="service-card">
                    <div class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                        </svg>
                    </div>
                    <p><strong>Seminar Teknologi Terdepan</strong>: Ikuti seminar yang membahas tren dan teknologi terbaru. Kami menghadirkan pembicara ahli dan inovasi terkini untuk membantu Anda tetap di depan dalam dunia teknologi.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="service-card">
                    <div class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                        </svg>
                    </div>
                    <p><strong>Pengelolaan Tiket Efisien</strong>: Manfaatkan sistem tiket canggih kami untuk memudahkan pembelian dan manajemen tiket seminar. Fitur kami memastikan pengalaman yang lancar dan aman untuk Anda.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="service-card">
                    <div class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z" />
                        </svg>
                    </div>
                    <p><strong>Integrasi Payment Gateway</strong>: Dengan integrasi Midtrans, kami menyediakan opsi pembayaran yang aman dan nyaman. Pilih metode pembayaran yang paling sesuai dan nikmati transaksi yang cepat dan mudah.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->


    <!-- daftar  -->
    <div class="container text-center my-5 testimoni">
        <h1 class="section-title">Apa Kata Mereka?</h1>
        <h5 class="mb-4">Dengarkan pengalaman dari peserta seminar sebelumnya</h5>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                <div class="card h-100 shadow-sm w-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <blockquote class="blockquote text-center">
                            <p class="mb-4">"Seminar ini benar-benar membuka wawasan saya tentang teknologi terbaru. Sangat bermanfaat!"</p>
                            <footer class="blockquote-footer">Andi, <cite title="Mahasiswa">Mahasiswa</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                <div class="card h-100 shadow-sm w-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <blockquote class="blockquote text-center">
                            <p class="mb-4">"Penyampaian materi sangat menarik dan mudah dipahami. Sangat direkomendasikan!"</p>
                            <footer class="blockquote-footer">Rina, <cite title="Profesional IT">Profesional IT</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end  -->

    <script>
        function scrollCards(direction) {
            const container = document.querySelector('.scrolling-wrapper');
            const scrollAmount = 200; // Sesuaikan dengan lebar card dan jarak margin

            container.scrollBy({
                left: direction * scrollAmount,
                behavior: 'smooth'
            });
        }
    </script>

</x-app>