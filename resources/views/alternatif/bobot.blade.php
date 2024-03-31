@extends('partials.sidebar')
@section('container')
@include('partials.sidebar') 
<div class="my-2 p-4 bg-body rounded shadow-sm index-section" style="margin-left: 210px">
    <div class="d-flex justify-content-between mb-4">
<h4 style="font-weight: 700">Hasil Perhitungan Bobot Alternatif</h4>
</div>

<table>
    <thead>
        <tr>
            <th class="row-1-table">ID Alternatif</th>
            <th class="row-1-table">Skala Fasilitas</th>
            <th class="row-1-table">Skala Harga</th>
            <th class="row-1-table">Skala Lokasi</th>
            <th class="row-1-table">Skala Lingkungan</th>
            <th class="row-1-table">Skala Kondisi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bobotAlternatif as $alternatifId => $bobot)
        <tr>
            <td class="data-indekos">{{ $alternatifId }}</td>
            <td class="data-indekos">{{ $bobot['skala_fasilitas'] }}</td>
            <td class="data-indekos">{{ $bobot['skala_harga'] }}</td>
            <td class="data-indekos">{{ $bobot['skala_lokasi'] }}</td>
            <td class="data-indekos">{{ $bobot['skala_lingkungan'] }}</td>
            <td class="data-indekos">{{ $bobot['skala_kondisi'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection