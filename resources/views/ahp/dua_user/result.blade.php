@extends('partials.navbar')
@section('container')
<div class="container-result">
    <div>
        @if(isset($consistencyMessage))
            <p style="text-align: center; font-size:14px; font-weight:700;color: {{ $messageColor }}">{{ $consistencyMessage }}</p>
        @endif

    <table class="tabel-result">
        <thead>
            <tr>
                <th class="row-1-result">Bobot Global Fasilitas</th>
                <th class="row-1-result">Bobot Global Harga</th>
                <th class="row-1-result">Bobot Global Lokasi</th>
                <th class="row-1-result">Bobot Global Lingkungan</th>
                <th class="row-1-result">Bobot Global Kondisi Kamar</th>
            </tr>

            <tr>
                <td>{{ $globalWeightFasilitasPersen }}%</td>
                <td>{{ $globalWeightHargaPersen }}%</td>
                <td>{{ $globalWeightLokasiPersen }}%</td>
                <td>{{ $globalWeightLingkunganPersen}}%</td>
                <td>{{ $nilaiEigenKriteriaKondisiPersen }}%</td>
            </tr>
        </table>

        <table class="tabel-result mt-4">
            <tbody>
            <tr>
                <th style="font-size: 19px; padding:15px; font-weight:500; background-color: #e0ebe9" colspan="5">Hasil Rekomendasi Indekos</th>
            </tr>

            <tr>
                <th class="row-1-result">Peringkat</th>
                <th class="row-1-result">Nilai Utilitas Akhir</th>
                <th class="row-1-result">Persentase</th>
                <th class="row-1-result">Nama Indekos</th>
                <th class="row-1-result">Detail</th>
            </tr>
        </thead>
        <tbody>
            @php $ranking = 1; @endphp
            @foreach($totalBobotAlternatif as $alternatifNama => $data)
            <tr>
                <td>{{ $ranking }}</td>
                <td>{{ $data['total_bobot'] }}</td>
                <td>{{ $data['total_bobot_persen'] }}%</td>
                <td>{{ $alternatifNama }}</td>
                <td><button class="btn-detail" data-info="{{ json_encode($data) }}">Detail</button></td>
            </tr>
            @php $ranking++; @endphp
            @endforeach
        </tbody>
    </table>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="modal-body-content">
        </div>
    </div>
</div>

<script>
    var btnsDetail = document.querySelectorAll('.btn-detail');
    var modal = document.getElementById('myModal');
    var spanClose = document.getElementsByClassName("close")[0];

    function openModal(info) {
    modal.style.display = 'block';
    var modalBodyContent = document.getElementById('modal-body-content');
    modalBodyContent.innerHTML = '';

    modalBodyContent.innerHTML += '<h3 style="text-align: center; color: #6eb9c7; font-weight: 700; text-shadow:2px 2px 0px rgba(224, 235, 233); margin-bottom: 20px">' + info.nama + '</h3>';

    Object.keys(info).forEach(function(key) {
        if (key !== 'nama' && key !== 'total_bobot' && key !== 'total_bobot_persen') {
            var label;
            switch (key) {
                case 'alamat':
                    label = 'Alamat:';
                    break;
                case 'kategori':
                    label = 'Kategori:';
                    break;
                case 'kontak':
                    label = 'Kontak:';
                    break;
                case 'jarak_kampus':
                    label = 'Jarak menuju kampus:';
                    break;
                case 'fasilitas':
                    label = 'Fasilitas:';
                    break;
                case 'harga':
                    label = 'Harga sewa:';
                    break;
                case 'sistem_pembayaran':
                    label = 'Sistem pembayaran:';
                    break;
                case 'layanan_publik':
                    label = 'Layanan publik terdekat:';
                    break;
                case 'lingkungan':
                    label = 'Lingkungan & keamanan:';
                    break;
                case 'kamar':
                    label = 'Kondisi kamar:';
                    break;
                case 'gambar':
                    modalBodyContent.innerHTML += '<img src="{{ url('gambar_alternatif') }}/' + info[key] + '" alt="Gambar Indekos">';
                    return;
                default:
                    label = key + ':';
            }
            modalBodyContent.innerHTML += '<p><strong>' + label + '</strong> ' + info[key] + '</p>';
        }
    });
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

