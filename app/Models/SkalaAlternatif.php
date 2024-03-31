<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaAlternatif extends Model
{
    use HasFactory;
    protected $table = 'skala_alternatif';

    protected $fillable = [
        'alternatif_id',
        'skala_fasilitas',
        'skala_harga',
        'skala_lokasi',
        'skala_lingkungan',
        'skala_kondisi'
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }

    public $timestamps = false; 
}
