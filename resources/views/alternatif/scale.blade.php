@extends('partials.sidebar')
@section('container')
@if (auth()->check())
    @include('partials.sidebar') 
    <div class="my-2 p-4 bg-body rounded shadow-sm index-section" style="margin-left: 210px">
        <div class="pb-3 d-flex justify-content-between">
                <p style="font-weight: 500; font-size:19px">Hi, <span>{{ Auth::user()->name }}</span> welcome back!</span></p>
        </div>

        <div class="pb-4 d-flex justify-content-end">
          <a href='{{ url('skala/alternatif/create') }}' class="btn btn-add-data">+ Tambah Data Skala Alternatif</a>
        </div>

        <div class="scrollable-container">
        <table class="scrollable-table">
            <thead>
                <tr>
                    <th class="row-1-table">ID Alternatif</th>
                    <th class="row-1-table">Nama Alternatif</th>
                    <th class="row-1-table">Skala Fasilitas</th>
                    <th class="row-1-table">Skala Harga</th>
                    <th class="row-1-table">Skala Lokasi</th>
                    <th class="row-1-table">Skala Lingkungan</th>
                    <th class="row-1-table">Skala Kondisi</th>
                </tr>
            </thead>
            <tbody>
                <tbody>
                    @foreach ($skala_alternatif as $item)
                    <tr>
                        <td class="data-indekos">{{ $item->alternatif_id }}</td>
                        <td class="data-indekos">{{ $item->alternatif->nama_alternatif }}</td>
                        <td class="data-indekos">{{ $item->skala_fasilitas }}</td>
                        <td class="data-indekos">{{ $item->skala_harga }}</td>
                        <td class="data-indekos">{{ $item->skala_lokasi }}</td>
                        <td class="data-indekos">{{ $item->skala_lingkungan }}</td>
                        <td class="data-indekos">{{ $item->skala_kondisi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $skala_alternatif->links() }}
        </div>
    </div>
    @else
        <div class="error-message">
            <p>Anda harus login sebagai admin untuk mengakses halaman ini!</p>
            <img src="{{ asset('img/error.jpg')}}"/>
        </div>
    @endif
@endsection