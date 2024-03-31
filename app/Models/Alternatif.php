<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    protected $fillable = [
        'gambar_alternatif',
        'nama_alternatif',
        'kategori_alternatif',
        'alamat_alternatif',
        'kontak_alternatif',
        'jarak_kampus',
        'fasilitas_alternatif',
        'harga_alternatif',
        'sistem_pembayaran',
        'layanan_publik',
        'lingkungan_alternatif',
        'kondisi_alternatif'
    ];
    protected $table = 'alternatif';
    public $timestamps = false;
}
