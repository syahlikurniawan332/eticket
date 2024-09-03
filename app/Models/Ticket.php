<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'seminar_id',
        'jenis_tiket',
        'harga',
        'quantity',
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }
}
