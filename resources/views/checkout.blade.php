@section('title', 'halaman pembayaran')

<x-app>
    <div class="container my-5">
        <h2 class="fw-bold">Checkout Tiket Seminar</h2>

        <form action="{{ route('checkout.process') }}" method="POST" class="mt-5">
            @csrf
            <input type="hidden" name="seminar_id" value="{{ $seminar->id }}">
            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
            <input type="hidden" name="quantity" value="{{ $quantity }}">

            <div class="form-group">
                <label for="buyer_name">Full Name</label>
                <input type="text" class="form-control" id="buyer_name" name="buyer_name" required>
            </div>
            <div class="form-group">
                <label for="buyer_email">Email</label>
                <input type="email" class="form-control" id="buyer_email" name="buyer_email" required>
            </div>
            <div class="form-group">
                <label for="buyer_phone">Phone Number</label>
                <input type="tel" class="form-control" id="buyer_phone" name="buyer_phone" required>
            </div>
            <button type="submit" class="btn btn-primary checkout-mitrans mt-3">Proceed to Payment</button>
        </form>
    </div>
</x-app>