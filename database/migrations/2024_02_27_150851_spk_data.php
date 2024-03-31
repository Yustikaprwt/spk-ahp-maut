<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alternatif');
            $table->string('gambar_alternatif');
            $table->string('kategori_alternatif'); 
            $table->string('alamat_alternatif'); 
            $table->string('kontak_alternatif'); 
            $table->string('jarak_kampus'); 
            $table->string('fasilitas_alternatif'); 
            $table->string('harga_alternatif'); 
            $table->string('sistem_pembayaran'); 
            $table->string('layanan_publik'); 
            $table->string('lingkungan_alternatif');
            $table->string('kondisi_alternatif');
        });

        Schema::create('skala_alternatif', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternatif_id');
            $table->foreign('alternatif_id')->references('id')->on('alternatif')->onDelete('cascade');
            $table->float('skala_fasilitas');
            $table->float('skala_harga');
            $table->float('skala_lokasi');
            $table->float('skala_lingkungan');
            $table->float('skala_kondisi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif');
        Schema::dropIfExists('skala_alternatif');
    }
};
