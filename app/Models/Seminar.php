<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'location',
        'description',
        'img',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function detailSeminar()
    {
        return $this->hasOne(DetailSeminar::class, 'seminar_id');
    }
}
