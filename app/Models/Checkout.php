<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'seminar_id', 'ticket_id', 'quantity', 'total_price',
        'buyer_name', 'buyer_email', 'buyer_phone', 'payment_status', 'payment_id'
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
