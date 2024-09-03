@section('title', 'Kategori')

<x-app>

    <div class="container">
        <!-- Seminar Umum -->
        <div class="my-5">
            <div class="row heading-kategori mb-3">
                <h5 class="fw-bold">Seminar Umum</h5>
                <p>Berikut adalah seminar untuk umum.</p>
            </div>
            @if (isset($categories['Umum']) && $categories['Umum']->isNotEmpty())
            <div class="card-container">
                <button class="scroll-btn prev" onclick="scrollCards('umum', -1)">&#9664;</button>
                <div class="scrolling-wrapper gap-3" data-category="umum">
                    @foreach($categories['Umum'] as $seminar)
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/' . $seminar->img) }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $seminar->title }}</h5>
                            <p class="card-text">{{ Str::limit($seminar->description, 100, '...') }}</p>
                            @foreach ($seminar->tickets as $ticket)
                            <p class="text-secondary fw-bold">{{ $ticket->jenis_tiket }}</p>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('/pageTiket/' . $seminar->id) }}" class="btn btn-primary">Daftar</a>
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
                <button class="scroll-btn next" onclick="scrollCards('umum', 1)">&#9654;</button>
            </div>
            @else
            <p>Tidak ada seminar untuk kategori Umum.</p>
            @endif
        </div>

        <!-- Seminar Mahasiswa -->
        <div class="mb-5" style="margin-top: 100px;">
            <div class="row heading-kategori mb-3">
                <h5 class="fw-bold">Seminar Mahasiswa</h5>
                <p>Berikut adalah seminar untuk para mahasiswa / mahasiswi.</p>
            </div>
            @if (isset($categories['Mahasiswa']) && $categories['Mahasiswa']->isNotEmpty())
            <div class="card-container">
                <button class="scroll-btn prev" onclick="scrollCards('mahasiswa', -1)">&#9664;</button>
                <div class="scrolling-wrapper" data-category="mahasiswa">
                    @foreach($categories['Mahasiswa'] as $seminar)
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/' . $seminar->img) }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $seminar->title }}</h5>
                            <p class="card-text">{{ Str::limit($seminar->description, 100, '...') }}</p>
                            @foreach ($seminar->tickets as $ticket)
                            <p class="text-secondary fw-bold">{{ $ticket->jenis_tiket }}</p>
                            @endforeach
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('/pageTiket/' . $seminar->id) }}" class="btn btn-primary">Daftar</a>
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
                <button class="scroll-btn next" onclick="scrollCards('mahasiswa', 1)">&#9654;</button>
            </div>
            @else
            <p>Tidak ada seminar untuk kategori Mahasiswa.</p>
            @endif
        </div>
    </div>

    <script>
        function scrollCards(category, direction) {
            const container = document.querySelector(`.scrolling-wrapper[data-category="${category}"]`);
            const scrollAmount = direction * 300;
            container.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        }
    </script>
</x-app>