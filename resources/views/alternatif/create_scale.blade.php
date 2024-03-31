@extends('partials.sidebar')
@section('container')
<form action='{{ url('skala/alternatif') }}' method='post' enctype="multipart/form-data">
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
            <h4 style="font-weight: 700">Tambah Data Skala Alternatif</h4>
            <p style="font-weight: 500; font-size:19px">Hi, Welcome back!</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="alternatif_id" class="label-data-indekos">ID Alternatif<span class="required-icon"> *</span></label>
                    <input type="number" class="form-control input-data-indekos" name='alternatif_id' id="alternatif_id" value="{{ Session::get('alternatif_id') }}">
                </div>

                <div class="mb-3">
                    <label for="skala_fasilitas" class="label-data-indekos">Skala Fasilitas<span class="required-icon"> *</span></label>
                    <input type="number" class="form-control input-data-indekos" name='skala_fasilitas' id="skala_fasilitas" value="{{ Session::get('skala_fasilitas') }}">
                </div>

                <div class="mb-3">
                    <label for="skala_harga" class="label-data-indekos">Skala Harga<span class="required-icon"> *</span></label>
                    <input type="number" class="form-control input-data-indekos" name='skala_harga' id="skala_harga" value="{{ Session::get('skala_harga') }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="skala_lokasi" class="label-data-indekos">Skala Lokasi<span class="required-icon"> *</span></label>
                    <input type="number" class="form-control input-data-indekos" name='skala_lokasi' id="skala_lokasi" value="{{ Session::get('skala_lokasi') }}">
                </div>

                <div class="mb-3">
                    <label for="skala_lingkungan" class="label-data-indekos">Skala Lingkungan<span class="required-icon"> *</span></label>
                    <input type="number" class="form-control input-data-indekos" name='skala_lingkungan' id="skala_lingkungan" value="{{ Session::get('skala_lingkungan') }}">
                </div>

                <div class="mb-3">
                    <label for="skala_kondisi" class="label-data-indekos">Skala Kondisi<span class="required-icon"> *</span></label>
                    <input type="number" class="form-control input-data-indekos" name='skala_kondisi' id="skala_kondisi" value="{{ Session::get('skala_kondisi') }}">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-add-new-indekos" name="submit">Tambah Data Skala Indekos</button>
                </div>
            </div>
        </div>
    </div>
@endsection