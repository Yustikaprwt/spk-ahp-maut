@extends('partials.sidebar')
@section('container')
<form action='{{ url('alternatif') }}' method='post' enctype="multipart/form-data">
    @csrf
    <div class="my-2 p-4 bg-body rounded shadow-sm" style="margin-left: 220px;">
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

        <div class="d-flex justify-content-between mb-4">
            <h4 style="font-weight: 700">Tambah Data Alternatif</h4>
            <p style="font-weight: 500; font-size:19px">Hi, Welcome back!</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama_alternatif" class="label-data-indekos">Nama Alternatif<span class="required-icon"> *</span></label>
                    <input type="text" class="form-control input-data-indekos" name='nama_alternatif' id="nama_alternatif" value="{{ Session::get('nama_alternatif') }}">
                </div>

                <div class="mb-3">
                    <label for="gambar_alternatif" class="label-data-indekos">Gambar Indekos<span class="required-icon"> *</span></label>
                    <input type="file" class="form-control input-data-indekos" name='gambar_alternatif' id="gambar_alternatif" value="{{ Session::get('gambar_alternatif') }}">
                </div>

                <div class="mb-3">
                    <label for="kategori_alternatif" class="label-data-indekos">Kategori Alternatif<span class="required-icon"> *</span></label>
                    <select class="form-select select-data-indekos" id="kategori_alternatif" name="kategori_alternatif">
                        <option value="Indekos wanita" {{ Session::get('kategori_alternatif') == 'Indekos wanita' ? 'selected' : '' }}>Indekos Wanita</option>
                        <option value="Indekos pria" {{ Session::get('kategori_alternatif') == 'Indekos pria' ? 'selected' : '' }}>Indekos Pria</option>
                        <option value="Indekos campur" {{ Session::get('kategori_alternatif') == 'Indekos campur' ? 'selected' : '' }}>Indekos Campur</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alamat_alternatif" class="label-data-indekos">Alamat Alternatif<span class="required-icon"> *</span></label>
                    <input type="text" class="form-control input-data-indekos" name='alamat_alternatif' id="alamat_alternatif" value="{{ Session::get('alamat_alternatif') }}">
                </div>

                <div class="mb-3">
                    <label for="kontak_alternatif" class="label-data-indekos">Kontak Alternatif<span class="required-icon"> *</span></label>
                    <input type="text" class="form-control input-data-indekos" name='kontak_alternatif' id="kontak_alternatif" value="{{ Session::get('kontak_alternatif') }}">
                </div>

                <div class="mb-3">
                    <label for="jarak_kampus" class="label-data-indekos">Jarak dengan Kampus<span class="required-icon"> *</span></label>
                    <input type="text" class="form-control input-data-indekos" name='jarak_kampus' id="jarak_kampus" value="{{ Session::get('jarak_kampus') }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="fasilitas_alternatif" class="label-data-indekos">Fasilitas Alternatif<span class="required-icon"> *</span></label>
                    <input type="text" class="form-control input-data-indekos" name='fasilitas_alternatif' id="fasilitas_alternatif" value="{{ Session::get('fasilitas_alternatif') }}">
                </div>

                <div class="mb-3">
                    <label for="harga_alternatif" class="label-data-indekos">Harga Alternatif<span class="required-icon"> *</span></label>
                    <input type="number" class="form-control input-data-indekos" name='harga_alternatif' id="harga_alternatif" value="{{ Session::get('harga_alternatif') }}">
                </div>

                <div class="mb-3">
                    <label for="sistem_pembayaran" class="label-data-indekos">Sistem Pembayaran Alternatif<span class="required-icon"> *</span></label>
                    <select class="form-select select-data-indekos" id="sistem_pembayaran" name="sistem_pembayaran">
                        <option value="Perbulan" {{ Session::get('sistem_pembayaran') == 'Perbulan' ? 'selected' : '' }}>Perbulan</option>
                        <option value="Per 3 bulan" {{ Session::get('sistem_pembayaran') == 'Per 3 bulan' ? 'selected' : '' }}>Per 3 bulan</option>
                        <option value="Pertahun" {{ Session::get('sistem_pembayaran') == 'Pertahun' ? 'selected' : '' }}>Pertahun</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="layanan_publik" class="label-data-indekos">Layanan Publik Terdekat<span class="required-icon"> *</span></label>
                    <input type="text" class="form-control input-data-indekos" name='layanan_publik' id="layanan_publik" value="{{ Session::get('layanan_publik') }}">
                </div>

                <div class="mb-3">
                    <label for="lingkungan_alternatif" class="label-data-indekos">Lingkungan & Keamanan Alternatif<span class="required-icon"> *</span></label>
                    <input type="text" class="form-control input-data-indekos" name='lingkungan_alternatif' id="lingkungan_alternatif" value="{{ Session::get('lingkungan_alternatif') }}">
                </div>

                <div class="mb-3">
                    <label for="kondisi_alternatif" class="label-data-indekos">Kondisi Kamar Alternatif<span class="required-icon"> *</span></label>
                    <input type="text" class="form-control input-data-indekos" name='kondisi_alternatif' id="kondisi_alternatif" value="{{ Session::get('kondisi_alternatif') }}">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-add-new-indekos" name="submit">Tambah Data Indekos</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
