@section('title', 'Halaman isi tiket')

<x-app>

    <!-- judul dan deskripsi seminar  -->
    <div class="container mt-5">
        <div class="row">
            <!-- Seminar Information -->
            <div class="col-md-8">
                <div class="page-tiket">
                    <h1>{{ $seminar->title }}</h1>
                    <h5 class="text-secondary">
                        @foreach($seminar->tickets as $ticket)
                        {{ $ticket->jenis_tiket }}
                        @endforeach
                    </h5>
                    <p class="my-3">{{ $seminar->description }}</p>
                </div>
            </div>
            <!-- Seminar Image -->
            <div class="col-md-4">
                <div class="image-page">
                    <img src="{{ asset('images/' . $seminar->img) }}" alt="{{ $seminar->title }}" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <!-- MC Information -->
            <div class="col-md-4 d-none d-md-block">
                <div class="image-page">
                    <img src="{{ asset('images/' . $seminar->detailSeminar->foto_ruangan[2]) }}" alt="Foto Ruangan" class="img-fluid">
                </div>
            </div>
            <div class="col-md-8 d-none d-md-block">
                <div class="page-tiket">
                    <h4>{{ $seminar->detailSeminar->nama_mc }}</h4>
                    <p>{{ $seminar->detailSeminar->bio_mc }}</p>
                </div>
            </div>
        </div>

        <div class="row d-block d-md-none">
            <!-- MC Information -->
            <div class="col-12">
                <div class="page-tiket ms-0">
                    <h4>{{ $seminar->detailSeminar->nama_mc }}</h4>
                </div>
                <div class="image-page mt-2">
                    <img src="{{ asset('images/' . $seminar->detailSeminar->foto_ruangan[2]) }}" alt="Foto Ruangan" class="img-fluid">
                </div>
                <div class="page-tiket mt-3 ms-0">
                    <p>{{ $seminar->detailSeminar->bio_mc }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    <!-- Benefits -->
    <div class="container my-5">
        <div class="page-tiket">
            <h1>Benefits</h1>
        </div>
        <div class="row d-flex justify-content-center">
            @if(is_array($seminar->detailSeminar->keuntungan) && count($seminar->detailSeminar->keuntungan) > 0)
            @foreach($seminar->detailSeminar->keuntungan as $item)
            <div class="col banefit">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                </svg>
                <p>{{ $item }}</p>
            </div>
            @endforeach
            @else
            <p>No keuntungan available.</p>
            @endif
        </div>
    </div>
    <!-- end -->

    <!-- Additional Information -->
    <div class="custom-bg-dark py-5">
        <div class="container">
            <div class="page-tiket mb-4">
                <h1 class="custom-heading">Additional Information</h1>
            </div>

            <div class="row text-white">
                <div class="col-md-6">
                    <div class="custom-info-content">
                        <h5 class="custom-subheading">Details</h5>
                        <p>{{ $seminar->detailSeminar->info_tambahan }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="custom-info-details">
                        <h5 class="custom-subheading">Event Timing</h5>
                        <p><strong>Start:</strong> {{ $seminar->detailSeminar->waktu_mulai }}</p>
                        <p><strong>End:</strong> {{ $seminar->detailSeminar->waktu_berakhir }}</p>

                        <h5 class="custom-subheading">Ticket Prices</h5>
                        @foreach ($seminar->tickets as $ticket)
                        <p>Rp. {{ number_format($ticket->harga, 0, ',', '.') }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Room Gallery -->
    <div class="container my-5">
        <div class="text-center mb-4">
            <h1 class="fw-bold">Room Gallery</h1>
        </div>

        <div class="carousel-container">
            <div id="carouselExampleDark" class="carousel carousel-dark slide roomPage">
                <div class="carousel-inner">
                    @if(is_array($seminar->detailSeminar->foto_ruangan))
                    @foreach($seminar->detailSeminar->foto_ruangan as $index => $foto)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('images/' . $foto) }}" class="d-block w-100" alt="Room Image {{ $index + 1 }}">
                    </div>
                    @endforeach
                    @else
                    <p>No room images available.</p>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>
    <!-- End -->

    <!-- Jadwal Acara dan Checkout -->
    <div class="container my-5 calendar-section">
        <div class="page-tiket">
            <h1>Event Registration</h1>
            <p>Bergabunglah dengan kami dalam berbagai seminar teknologi terdepan yang akan memperluas wawasan Anda tentang inovasi terbaru di dunia teknologi.</p>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="calendar p-4">
                    <h6 class="fw-bold">Tanggal Sekarang :
                        <span class="fw-bold text-secondary">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
                    </h6>
                </div>
                <div class="upcoming-events-section mt-4">
                    <h5 class="fw-bold">Upcoming Events</h5>
                    @if($upcomingEvents->isEmpty())
                    <p>Belum ada event lainnya dari MC ini sekarang.</p>
                    @else
                    <ul class="list-group">
                        @foreach($upcomingEvents as $seminar)
                        <li class="list-group-item">
                            <h6 class="fw-bold mb-1">{{ $seminar->title }}</h6>
                            <p class="mb-0 text-secondary">Date: {{ $seminar->date }}</p>
                            <p class="mb-0">{{ $seminar->description }}</p>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>

            <div class="col-lg-4 col-md-12 mt-4 mt-lg-0 event-now-section">
                <div class="event-now p-4">
                    <h6 class="fw-bold">Event Berlangsung : <span class="fw-bold text-secondary">{{ $seminar->date }}</span></h6>
                    <h3 class="my-3 fw-bold">{{ $seminar->title }}</h3>
                    <div class="sum-join my-3">
                        <h5 class="fw-bold text-secondary">Total Tiket Tersedia</h5>
                        <h3 class="fw-bold text-primary">{{ $ticket->quantity }}</h3>
                    </div>
                    <div class="price my-3">
                        <h5 class="fw-bold text-secondary">Harga Tiket</h5>
                        <h2 class="fw-bold text-dark">Rp. {{ number_format($ticket->harga, 0, ',', '.') }}</h2>

                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="seminar_id" value="{{ $seminar->id }}">
                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                            <div class="ticket-quantity mt-3">
                                <h5 class="fw-bold text-secondary">Pilih Jumlah Tiket</h5>
                                <select class="form-select" name="quantity" aria-label="Pilih jumlah tiket">
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}">{{ $i }} Tiket</option>
                                        @endfor
                                </select>
                                <button type="submit" class="btn btn-primary checkout-mitrans mt-3">Pesan Sekarang</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="countdown mt-4">
                    <h5 class="fw-bold">Countdown to Event</h5>
                    <div id="countdown-timer" class="p-3 border rounded bg-light text-center">00:00:00:00</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="container my-5 gallery-section">
        <div class="Page-tiket text-center">
            <h1 class="fw-bold my-5">Seminar Gallery</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <!-- Gunakan flexbox dan pastikan konten bisa di-scroll jika melebihi lebar -->
                <div class="d-flex flex-wrap justify-content-center">
                    @if(is_array($seminar->detailSeminar->foto_seminar))
                    @foreach($seminar->detailSeminar->foto_seminar as $foto)
                    <div class="image-page me-2 mb-3">
                        <img src="{{ asset('images/' . $foto) }}" alt="Seminar Image" class="rounded img-fluid" style="max-width: 200px;">
                    </div>
                    @endforeach
                    @else
                    <p class="text-center">No seminar images available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <script>
        // Ambil tanggal seminar dari Laravel dalam format 'YYYY-MM-DD'
        var seminarDateString = "{{ $seminarDate }}";
        var seminarDate = new Date(seminarDateString).getTime();

        if (!isNaN(seminarDate)) {
            // Update the countdown every 1 second
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = seminarDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("countdown-timer").innerHTML = days + "d " + hours + "h " +
                    minutes + "m " + seconds + "s ";

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown-timer").innerHTML = "EVENT ONGOING";
                }
            }, 1000);
        } else {
            document.getElementById("countdown-timer").innerHTML = "Invalid date format";
        }
    </script>

</x-app>