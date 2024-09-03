@section('title', 'Halaman Pengambilan Tiket')

<x-app>

    <div class="container my-5">
        <h1 class="text-center mb-5">Payment Successful!</h1>
        <div class="struk border rounded shadow p-4" style="max-width: 600px; margin: auto; background-color: #f8f9fa;">
            <p class="fs-4 text-center mb-4 font-weight-bold">{{ $seminar->title }}</p>
            <hr>
            <div class="isi-1 mb-4">
                <p><strong>Tanggal Acara:</strong> {{ $seminar->date }}</p>
                <p><strong>Waktu Acara:</strong> {{ $seminar->detailSeminar->waktu_mulai }} - {{ $seminar->detailSeminar->waktu_berakhir }}</p>
                <p><strong>Lokasi Acara:</strong> {{ $seminar->location }}</p>
            </div>
            <hr>
            <div class="isi-2 mb-4">
                <p><strong>Nama Pembeli:</strong> {{ $checkout->buyer_name }}</p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($checkout->total_price, 0, ',', '.') }}</p>
                <p class="text-success"><strong>Order ID:</strong> {{ $checkout->payment_id }}</p>
                <p>Thank you for your purchase. Your transaction has been completed.</p>
            </div>
            <div class="text-center">
                {!! QrCode::size(200)->generate("Order ID: $checkout->payment_id, Nama Seminar: $seminar->title, Nama Pembeli: $checkout->buyer_name, Total Harga: Rp " . number_format($checkout->total_price, 0, ',', '.')) !!}
            </div>
        </div>

        <div class="row my-5">
            <a class="btn btn-success" href="{{ url('/') }}">Kembali</a>
        </div>
    </div>

</x-app>