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
                    <td>{{ $globalWeightLingkunganPersen }}%</td>
                    <td>{{ $nilaiEigenKriteriaKondisiPersen }}%</td>
                </tr>
            </thead>
        </table>

        <div class="filter-buttons">
            <button id="filterAll" class="btn-filter">Semua Indekos</button>
            <button id="filterPria" class="btn-filter">Indekos Pria</button>
            <button id="filterWanita" class="btn-filter">Indekos Wanita</button>
            <button id="filterCampur" class="btn-filter">Indekos Campur</button>
        </div>

        <table id="resultTable" class="tabel-result mt-3">
            <thead>
                <tr>
                    <th style="font-size: 19px; padding:15px; font-weight:500; background-color: #e0ebe9" colspan="6">Hasil Rekomendasi Indekos</th>
                </tr>

                <tr>
                    <th class="row-1-result">Peringkat</th>
                    <th class="row-1-result" onclick="sortTable(1)">Nilai Utilitas Akhir</th>
                    <th class="row-1-result">Persentase</th>
                    <th class="row-1-result">Nama Indekos</th>
                    <th class="row-1-result">Kategori Indekos</th>
                    <th class="row-1-result">Detail</th>
                </tr>
            </thead>
            <tbody>
                @php $ranking = 1; @endphp
                @foreach($totalBobotAlternatif as $alternatifNama => $data)
                <tr data-kategori="{{ $data['kategori'] }}">
                    <td>{{ $ranking }}</td>
                    <td>{{ $data['total_bobot'] }}</td>
                    <td>{{ $data['total_bobot_persen'] }}%</td>
                    <td>{{ $alternatifNama }}</td>
                    <td>{{ $data['kategori'] }}</td>
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

            modalBodyContent.innerHTML += '<h3 style="text-align: center; color: #6eb9c7; font-weight: 700; text-shadow:2px 2px 0px rgba(224, 235, 233); margin-bottom: 20px">' + info.nama + '</h3>';

            Object.keys(info).forEach(function(key) {
                if (key !== 'nama' && key !== 'total_bobot' && key !== 'total_bobot_persen') {
                    var label;
                    switch (key) {
                        case 'alamat':
                            label = 'Alamat Indekos:';
                            break;
                        case 'kategori':
                            label = 'Kategori Indekos:';
                            break;
                        case 'kontak':
                            label = 'Kontak Indekos:';
                            break;
                        case 'jarak_kampus':
                            label = 'Jarak menuju Kampus ITK:';
                            break;
                        case 'fasilitas':
                            label = 'Fasilitas Indekos:';
                            modalBodyContent.innerHTML += '<p><strong>' + label + '</strong><ul>' + createListFromCommaSeparatedString(info[key]) + '</ul></p>';
                            return;
                        case 'harga':
                            label = 'Harga Sewa Indekos:';
                            modalBodyContent.innerHTML += '<p><strong>' + label + '</strong> Rp ' + formatRupiah(info[key]) + '</p>';
                            return;
                        case 'sistem_pembayaran':
                            label = 'Sistem Pembayaran Indekos:';
                            break;
                        case 'layanan_publik':
                            label = 'Layanan Publik Terdekat:';
                            modalBodyContent.innerHTML += '<p><strong>' + label + '</strong><ul>' + createListFromCommaSeparatedString(info[key]) + '</ul></p>';
                            return;
                        case 'lingkungan':
                            label = 'Lingkungan & Keamanan:';
                            modalBodyContent.innerHTML += '<p><strong>' + label + '</strong><ul>' + createListFromCommaSeparatedString(info[key]) + '</ul></p>';
                            return;
                        case 'kamar':
                            label = 'Kondisi Kamar Indekos:';
                            modalBodyContent.innerHTML += '<p><strong>' + label + '</strong><ul>' + createListFromCommaSeparatedString(info[key]) + '</ul></p>';
                            return;
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

        document.getElementById('filterPria').addEventListener('click', function() {
            filterTable('Indekos pria');
        });

        document.getElementById('filterWanita').addEventListener('click', function() {
            filterTable('Indekos wanita');
        });

        document.getElementById('filterCampur').addEventListener('click', function() {
            filterTable('Indekos campur');
        });

        document.getElementById('filterAll').addEventListener('click', function() {
            filterTable('');
        });

        function filterTable(kategori) {
            var rows = document.querySelectorAll('#resultTable tbody tr');
            rows.forEach(function(row) {
                var kategoriIndekos = row.getAttribute('data-kategori');
                if (kategori === '' || kategoriIndekos === kategori) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function sortTable(columnIndex) {
            var table = document.getElementById('resultTable');
            var tbody = table.querySelector('tbody');
            var rows = Array.from(tbody.querySelectorAll('tr'));
            var isAscending = table.getAttribute('data-sort-ascending') === 'true';

            rows.sort(function(a, b) {
                var aText = a.children[columnIndex].innerText;
                var bText = b.children[columnIndex].innerText;
                return isAscending ? aText - bText : bText - aText;
            });

            rows.forEach(function(row) {
                tbody.appendChild(row);
            });

            table.setAttribute('data-sort-ascending', !isAscending);
            reassignRanking();
        }

        function reassignRanking() {
            var rows = document.querySelectorAll('#resultTable tbody tr');
            var ranking = 1;
            rows.forEach(function(row) {
                row.children[0].innerText = ranking;
                ranking++;
            });
        }
    </script>
@endsection
