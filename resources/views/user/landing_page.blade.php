@extends('partials.navbar') 
@section('container')
<div class="spk-image">
    <img src="img/spk.png" alt="spk-logo" />
</div>
<div class="mt-5 text-center">
    <h4 class="text-1">
        SPK Indekos Karang Joang merupakan solusi modern untuk membantu calon
        penyewa dalam menentukan pilihan kos yang sesuai dengan kebutuhan
        mereka. Dengan memanfaatkan teknologi dan berbagai kriteria yang
        relevan, SPK Indekos Karang Joang membantu calon penyewa untuk
        mengevaluasi dan membandingkan kos berdasarkan fasilitas, harga, lokasi,
        kondisi kamar, dan jenis kos. Dengan bantuan SPK ini, proses pemilihan
        kos menjadi lebih efisien dan sesuai dengan preferensi masing-masing
        calon penyewa.
    </h4>
</div>

<div class="mt-5 text-center">
    <h4 class="text-2">Keuntungan Menggunakan SPK</h4>
</div>

<div class="d-flex justify-content-around">
    <div class="card mt-3 mb-4 card-1">
        <img src="img/image-card-1.png" class="card-img-top" alt="image-card" />
        <div class="card-body">
            <h4 class="card-title-1">Mengoptimalkan Pemilihan</h4>
            <p class="card-text mt-3 card-description">
                SPK memungkinkan calon penyewa untuk mengoptimalkan pilihan
                mereka dengan mempertimbangkan berbagai kriteria
            </p>
        </div>
    </div>

    <div class="card mt-3 mb-4 card-1">
        <img src="img/image-card-2.png" class="card-img-top" alt="image-card" />
        <div class="card-body">
            <h4 class="card-title-1">Menghemat Waktu</h4>
            <p class="card-text mt-3 card-description">
                SPK dapat mempersingkat waktu pemilihan dengan memberikan
                rekomendasi yang lebih tepat, mengurangi kerumitan dan
                kebingungan
            </p>
        </div>
    </div>

    <div class="card mt-3 mb-4 card-1">
        <img src="img/image-card-3.png" class="card-img-top" alt="image-card" />
        <div class="card-body">
            <h4 class="card-title-1">Meningkatkan Kepuasan Penyewa</h4>
            <p class="card-text mt-3 card-description">
                Dengan memilih indekos yang sesuai dengan preferensi dan
                kebutuhan, penghuni akan lebih puas dengan tempat tinggal mereka
            </p>
        </div>
    </div>
</div>

<div class="mt-5 px-8 text-center">
    <h4 class="text-2">Rekomendasi Indekos</h4>
</div>

@php
    $alternatif = DB::table('alternatif')->inRandomOrder()->limit(3)->get();
@endphp

<div class="mb-5 d-flex justify-content-center">
    @foreach($alternatif as $data)
        <div class="card mt-3 mx-3 card-2">
            <img src="{{ url('gambar_alternatif').'/'.$data->gambar_alternatif }}" style="height: 150px" class="card-img-top mx-auto mt-4" alt="kost-image"/>
            <div class="card-body">
                <h5 class="card-title-2">{{ $data->nama_alternatif }}</h5>
                <p class="card-text card-alternatif-desc">
                    {{ $data->kategori_alternatif }}
                </p>
                <p class="card-text card-description">
                    {{ $data->alamat_alternatif }}
                </p>
                <button class="detail-kos-button" data-info="{{ json_encode($data) }}">Detail</button>
            </div>
        </div>
    @endforeach
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="modal-body-content"></div>
    </div>
</div>

<script>
    var btnsDetail = document.querySelectorAll('.detail-kos-button');
    var modal = document.getElementById('myModal');
    var spanClose = document.getElementsByClassName("close")[0];

    function formatRupiah(angka) {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function createListFromCommaSeparatedString(string) {
        return string.split(',').map(function(item) {
            return '<li>' + item.trim() + '</li>';
        }).join('');
    }

    function openModal(info) {
        modal.style.display = 'block';
        var modalBodyContent = document.getElementById('modal-body-content');
        modalBodyContent.innerHTML = '';

        modalBodyContent.innerHTML += '<h3 style="text-align: center; color: #6eb9c7; font-weight: 700; text-shadow:2px 2px 0px rgba(224, 235, 233); margin-bottom: 20px">' + info.nama_alternatif + '</h3>';

        if(info.gambar_alternatif) {
            modalBodyContent.innerHTML += '<img src="{{ url('gambar_alternatif') }}/' + info.gambar_alternatif + '" alt="Gambar Alternatif">';
        }

        modalBodyContent.innerHTML += '<p><strong>Kategori Indekos:</strong> ' + info.kategori_alternatif + '</p>';
        modalBodyContent.innerHTML += '<p><strong>Alamat Indekos:</strong> ' + info.alamat_alternatif + '</p>';
        modalBodyContent.innerHTML += '<p><strong>Kontak Indekos:</strong> ' + info.kontak_alternatif + '</p>';
        modalBodyContent.innerHTML += '<p><strong>Jarak menuju Kampus ITK:</strong> ' + info.jarak_kampus + '</p>';

        var fasilitasList = createListFromCommaSeparatedString(info.fasilitas_alternatif);
        modalBodyContent.innerHTML += '<p><strong>Fasilitas Indekos:</strong><ul>' + fasilitasList + '</ul></p>';

        modalBodyContent.innerHTML += '<p><strong>Harga Sewa Indekos:</strong> Rp ' + formatRupiah(info.harga_alternatif) + '</p>';
        modalBodyContent.innerHTML += '<p><strong>Sistem Pembayaran Indekos:</strong> ' + info.sistem_pembayaran + '</p>';

        var layananPublikList = createListFromCommaSeparatedString(info.layanan_publik);
        modalBodyContent.innerHTML += '<p><strong>Layanan Publik Terdekat:</strong><ul>' + layananPublikList + '</ul></p>';

        var lingkunganList = createListFromCommaSeparatedString(info.lingkungan_alternatif);
        modalBodyContent.innerHTML += '<p><strong>Lingkungan & Keamanan Indekos:</strong><ul>' + lingkunganList + '</ul></p>';

        var kondisiList = createListFromCommaSeparatedString(info.kondisi_alternatif);
        modalBodyContent.innerHTML += '<p><strong>Kondisi Kamar Indekos:</strong><ul>' + kondisiList + '</ul></p>';
    }

    spanClose.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    btnsDetail.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var info = JSON.parse(btn.getAttribute('data-info'));
            openModal(info);
        });
    });
</script>
@endsection
