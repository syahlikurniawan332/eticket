<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSeminar extends Model
{
    use HasFactory;

    protected $table = 'detailseminars';

    protected $fillable = [
        'seminar_id',
        'ticket_id',
        'nama_mc',
        'bio_mc',
        'keuntungan',
        'info_tambahan',
        'waktu_mulai',
        'waktu_berakhir',
        'foto_seminar',
        'foto_ruangan',
    ];

    protected $casts = [
        'foto_seminar' => 'array',
        'foto_ruangan' => 'array',
        'keuntungan' => 'array',
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class, 'seminar_id');
    }
    
}
