<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class indekos extends Model
{
    protected $fillable = [
        'nama_indekos',
        'alamat_indekos',
        'kontak_indekos',
        'status_indekos',
        'gambar_indekos',
        'jenis_indekos',
        'fasilitas_indekos',
        'lokasi_indekos',
        'lingkungan_indekos',
        'kondisi_kamar',
        'harga_indekos',
        'nilai_fasilitas',
        'nilai_lokasi',
        'nilai_lingkungan',
        'nilai_kondisi'
    ];
    protected $table = 'indekos';
    public $timestamps = false;
}
