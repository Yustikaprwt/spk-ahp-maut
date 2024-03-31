@extends('partials.sidebar')
@section('container')
@if (auth()->check())
    @include('partials.sidebar') 
    <div class="my-2 p-4 bg-body rounded shadow-sm index-section" style="margin-left: 210px">
        <div class="pb-3 d-flex justify-content-between">
            <form class="d-flex" action="{{ url('alternatif') }}" method="get">
                <input class="search-indekos-form" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Cari indekos...">
            </form>
                <p style="font-weight: 500; font-size:19px">Hi, <span>{{ Auth::user()->name }}</span> welcome back!</span></p>
        </div>

        <div class="pb-4 d-flex justify-content-end">
          <a href='{{ url('alternatif/create') }}' class="btn btn-add-data">+ Tambah Data</a>
        </div>

        <div class="scrollable-container">
        <table class="scrollable-table">
            <thead>
                <tr>
                    <th class="row-1-table">No</th>
                    <th class="row-1-table">Nama Alternatif</th>
                    <th class="row-1-table">Alamat</th>
                    <th class="row-1-table">Gambar Alternatif</th>
                    <th class="row-1-table">Kontak</th>
                    <th class="row-1-table">Kategori</th>
                    <th class="row-1-table">Harga</th>
                    <th class="row-1-table">Sistem Pembayaran</th>
                    <th class="row-1-table">Jarak dengan Kampus</th>
                    <th class="row-1-table">Fasilitas</th>
                    <th class="row-1-table">Layanan Publik Terdekat</th>
                    <th class="row-1-table">Lingkungan & Keamanan</th>
                    <th class="row-1-table">Kondisi Kamar</th>
                    <th class="row-1-table">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tbody>
                    <?php $i = $data_alternatif->firstItem() ?>
                    @foreach ($data_alternatif as $item)
                    <tr>
                        <td class="data-indekos">{{ $i }}</td>
                        <td class="data-indekos">{{ $item->nama_alternatif }}</td>
                        <td class="data-indekos">{{ $item->alamat_alternatif }}</td>
                        <td class="data-indekos">
                            <img src="{{ url('gambar_alternatif').'/'.$item->gambar_alternatif }}" style="width: 150px" />
                       </td>
                        <td class="data-indekos">{{ $item->kontak_alternatif }}</td>
                        <td class="data-indekos">{{ $item->kategori_alternatif }}</td>
                        <td class="data-indekos">{{ $item->harga_alternatif }}</td>
                        <td class="data-indekos">{{ $item->sistem_pembayaran }}</td>
                        <td class="data-indekos">{{ $item->jarak_kampus }}</td>
                        <td class="data-indekos">{{ $item->fasilitas_alternatif }}</td>
                        <td class="data-indekos">{{ $item->layanan_publik }}</td>
                        <td class="data-indekos">{{ $item->lingkungan_alternatif }}</td>
                        <td class="data-indekos">{{ $item->kondisi_alternatif }}</td>
                        <td class="data-indekos">
                                <a href='{{ url('alternatif/'.$item->nama_alternatif.'/edit') }}' class="btn btn-edit-data"><i class="fa-solid fa-pen-to-square btn-icon"></i>Edit</a>
                                <form onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" class="d-inline" action="{{ url('alternatif/'.$item->nama_alternatif) }}" method="post">
                                @csrf
                                @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-delete-data btn-sm delete-data"><i class="fa-solid fa-trash btn-icon"></i>Delete</button>
                                </form>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            {{ $data_alternatif->links() }}
        </div>
    </div>
    @else
        <div class="error-message">
            <p>Anda harus login sebagai admin untuk mengakses halaman ini!</p>
            <img src="{{ asset('img/error.jpg')}}"/>
        </div>
    @endif
@endsection