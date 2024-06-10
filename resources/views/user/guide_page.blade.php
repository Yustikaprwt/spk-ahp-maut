@extends('partials.navbar') 
@section('container')

<h3 class="text-guide-1">Petunjuk Pengisian SPK</h3>
<p class="text-guide-2">
    1. Membandingkan intensitas kepentingan dari kedua kriteria yang tertera pada form skala kepentingan.
</p>

<div class="d-flex mt-4">
    <img class="img-example-guide" src="/img/kriteria.jpeg"/>
    <p class="text-guide-2">
        Gambar di samping kiri merupakan form skala kepentingan. Bagian yang diberikan bulatan merah merupakan kriteria 1 dan bagian yang diberikan bulatan biru merupakan kriteria 2.
    </p>
</div>

<div class="d-flex mt-4">
    <img class="img-example-guide" src="/img/kriteria_u2.jpeg"/>
    <p class="text-guide-2">
        Gambar di samping kiri merupakan form skala kepentingan untuk dua orang user yang ingin mencari kos secara bersamaan. Bagian yang diberikan bulatan jingga merupakan form skala kepentingan dengan inputan user pertama dan bagian yang diberikan bulatan ungu merupakan form skala kepentingan dengan inputan user kedua.
    </p>
</div>

<p class="text-guide-2">2. Adapun penjelasan dari intensitas kepentingan yang terdapat pada gambar diatas adalah yang tertera pada tabel dibawah.</p>

<table class="table-guide-page">
    <tr>
        <td class="row-1-guide">Intensitas Kepentingan</td>
        <td class="row-1-guide">Deskripsi</td>
    </tr>

    <tr>
        <td class="guide-page-row">1</td>
        <td class="guide-page-row">Kedua kriteria sama pentingnya</td>
    </tr>

    <tr>
        <td class="guide-page-row">3</td>
        <td class="guide-page-row">
            Salah satu kriteria sedikit lebih penting
        </td>
    </tr>

    <tr>
        <td class="guide-page-row">5</td>
        <td class="guide-page-row">Salah satu kriteria jauh lebih penting daripada kriteria yang lainnya</td>
    </tr>

    <tr>
        <td class="guide-page-row">7</td>
        <td class="guide-page-row">
            Salah satu kriteria sangat jauh lebih penting
        </td>
    </tr>

    <tr>
        <td class="guide-page-row">9</td>
        <td class="guide-page-row">Salah satu kriteria sangat penting</td>
    </tr>

    <tr>
        <td class="guide-page-row">
            2, 4, 6, 8
        </td>
        <td class="guide-page-row">
            Nilai-nilai antara dua nilai pertimbangan-pertimbangan yang
            berdekatan
        </td>
    </tr>
</table>

<div class="d-flex mt-4">
    <img style="width: 50%" class="img-example-guide" src="/img/submit.jpeg"/>
    <p class="text-guide-2">
        Setelah memilih intensitas kepentingan antara kriteria 1 dan kriteria 2, klik tombol "Cari rekomendasi" untuk menampilkan hasil rekomendasi indekos.
    </p>
</div>
@endsection
