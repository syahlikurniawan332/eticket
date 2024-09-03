{{-- resources/views/emails/checkout.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Confirmation</title>
</head>

<body>
    <h1>Terima kasih telah membeli tiket seminar!</h1>
    <p>Hi, {{ $checkout->buyer_name }}</p>
    <p>Anda telah membeli tiket untuk seminar "{{ $checkout->seminar->title }}" dengan harga Rp{{ number_format($checkout->total_price, 0, ',', '.') }}.</p>
    <p>Silakan lanjutkan ke pembayaran melalui link berikut:</p>
    <a href="{{ $midtrans_link }}">Lanjutkan Pembayaran</a>
</body>

</html>