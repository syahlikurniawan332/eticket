<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = ['seminar_id', 'amount'];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }
}