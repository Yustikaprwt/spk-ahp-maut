@extends('partials.sidebar')
@section('container')
    <form action='{{ url('alternatif/'.$alternatif->nama_alternatif) }}' method='post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="my-2 p-4 bg-body rounded shadow-sm" style="margin-left: 220px">
            @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <div class="d-flex justify-content-between">
            <h4 class="mb-4" style="font-weight: 700">Edit Data Alternatif</h4>
            <p style="font-weight: 500; font-size:19px">Hi, Welcome back!</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama_alternatif" class="label-data-indekos">Nama Alternatif</label>
                    <div class="col-sm-10">
                        {{ $alternatif->nama_alternatif }}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="kategori_alternatif" class="label-data-indekos">Kategori<span class="required-icon"> *</span></label>
                        <select class="form-select select-data-indekos" id="kategori_alternatif" name="kategori_alternatif">
                            <option value="Indekos Wanita">Indekos Wanita</option>
                            <option value="Indekos Pria">Indekos Pria</option>
                            <option value="Indekos Campur">Indekos Campur</option>
                        </select>
                </div>

                <div class="mb-3">
                    <label for="alamat_alternatif" class="label-data-indekos">Alamat<span class="required-icon"> *</span></label>
                        <input type="text" class="form-control input-data-indekos" name='alamat_alternatif' id="alamat_alternatif" value="{{ $alternatif->alamat_alternatif }}">
                </div>

                <div class="mb-3">
                    <label for="kontak_alternatif" class="label-data-indekos">Kontak<span class="required-icon"> *</span></label>
                        <input type="text" class="form-control input-data-indekos" name='kontak_alternatif' id="kontak_alternatif" value="{{ $alternatif->kontak_alternatif }}">
                </div>

                <div class="mb-3">
                    <label for="gambar_alternatif" class="label-data-indekos">Gambar Alternatif<span class="required-icon"> *</span></label>
                    <input type="file" class="form-control input-data-indekos" name='gambar_alternatif' id="gambar_alternatif">
                    @if ($alternatif->gambar_alternatif)
                        <p>Nama file: {{ $alternatif->gambar_alternatif }}</p>
                    @else
                        <p>Belum ada file yang dipilih.</p>
                    @endif
                </div>                

                <div class="mb-3">
                    <label for="jarak_kampus" class="label-data-indekos">Jarak dengan Kampus<span class="required-icon"> *</span></label>
                        <input type="text" class="form-control input-data-indekos" name='jarak_kampus' id="jarak_kampus" value="{{ $alternatif->jarak_kampus }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="fasilitas_alternatif" class="label-data-indekos">Fasilitas<span class="required-icon"> *</span></label>
                        <input type="text" class="form-control input-data-indekos" name='fasilitas_alternatif' id="fasilitas_alternatif" value="{{ $alternatif->fasilitas_alternatif }}">
                </div>

                <div class="mb-3">
                    <label for="harga_alternatif" class="label-data-indekos">Harga<span class="required-icon"> *</span></label>
                        <input type="number" class="form-control input-data-indekos" name='harga_alternatif' id="harga_alternatif" value="{{ $alternatif->harga_alternatif }}">
                </div>

                <div class="mb-3">
                    <label for="sistem_pembayaran" class="label-data-indekos">Sistem Pembayaran<span class="required-icon"> *</span></label>
                        <select class="form-select select-data-indekos" id="sistem_pembayaran" name="sistem_pembayaran">
                            <option value="Perbulan">Perbulan</option>
                            <option value="Per 3 bulan">Per 3 bulan</option>
                            <option value="Pertahun">Pertahun</option>
                        </select>
                </div>

                <div class="mb-3">
                    <label for="layanan_publik" class="label-data-indekos">Layanan Publik Terdekat<span class="required-icon"> *</span></label>
                        <input type="text" class="form-control input-data-indekos" name='layanan_publik' id="layanan_publik" value="{{ $alternatif->layanan_publik }}">
                </div>

                <div class="mb-3">
                    <label for="lingkungan_alternatif" class="label-data-indekos">Lingkungan & Keamanan<span class="required-icon"> *</span></label>
                        <input type="text" class="form-control input-data-indekos" name='lingkungan_alternatif' id="lingkungan_alternatif" value="{{ $alternatif->lingkungan_alternatif }}">
                </div>

                <div class="mb-3">
                    <label for="kondisi_alternatif" class="label-data-indekos">Kondisi Kamar<span class="required-icon"> *</span></label>
                        <input type="text" class="form-control input-data-indekos" name='kondisi_alternatif' id="kondisi_alternatif" value="{{ $alternatif->kondisi_alternatif }}">
                </div>

        <button type="submit" class="btn btn-add-new-indekos" name="submit">Edit Data Indekos</button>
    </form>      
@endsection