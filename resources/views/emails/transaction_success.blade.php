<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
</head>
<body>
    <h1>Payment Successful!</h1>

    <p><strong>Seminar:</strong> {{ $seminar->title }}</p>
    <p><strong>Date:</strong> {{ $seminar->date }}</p>
    <p><strong>Time:</strong> {{ $seminar->detailSeminar->waktu_mulai }} - {{ $seminar->detailSeminar->waktu_berakhir }}</p>
    <p><strong>Location:</strong> {{ $seminar->location }}</p>

    <p><strong>Buyer Name:</strong> {{ $checkout->buyer_name }}</p>
    <p><strong>Total Price:</strong> Rp {{ number_format($checkout->total_price, 0, ',', '.') }}</p>
    <p><strong>Order ID:</strong> {{ $checkout->payment_id }}</p>

    <p>Thank you for your purchase. Your transaction has been completed.</p>

    <div>
        <p><strong>QR Code:</strong></p>
        <img src="data:image/png;base64,{{ $qrCodeImage }}" alt="QR Code" />
    </div>
</body>
</html>
