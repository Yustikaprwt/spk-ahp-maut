@extends('partials.navbar') 
@section('container')

<h3 class="text-guide-1">Petunjuk Pengisian SPK</h3>
<p class="text-guide-2">
    1. Membandingkan tingkat kepentingan dari kedua kriteria yang tertera pada form skala kepentingan.
</p>

<div class="d-flex mt-4">
    <img class="img-example-guide" src="/img/kriteria.jpeg"/>
    <p class="text-guide-2">
        Gambar di samping kiri merupakan form skala kepentingan. Bagian yang diberikan bulatan merah merupakan kriteria 1 dan bagian yang diberikan bulatan biru merupakan kriteria 2.
    </p>
</div>

<div class="d-flex mt-4">
    <img class="img-example-guide" src="img/example-matrix.png" />
    <p class="text-guide-2">
        Gambar di samping kiri, user memilih tingkat kepentingan antara fasilitas dengan lokasi indekos. User dapat memilih tingkat kepentingan sesuai dengan deskripsi yang tertera pada dropdown. Pada bagian dropdown yang berwarna abu condong pada kriteria di sisi kiri, sedangkan bagian dropdown yang berwarna putih condong pada kriteria di sisi kanan.
    </p>
</div>

<p class="text-guide-2">2. Adapun penjelasan dari tingkat kepentingan yang terdapat pada dropdown adalah yang tertera pada tabel dibawah.</p>


<table class="table-guide-page">
    <tr>
        <td class="row-1-guide">Perbandingan Tingkat Kepentingan</td>
        <td class="row-1-guide">Deskripsi</td>
    </tr>

    <tr>
        <td class="guide-page-row"><span class="criteria-span">Kriteria 1</span> dan <span class="criteria-span">Kriteria 2</span> memiliki tingkat kepentingan yang sama</td>
        <td class="guide-page-row">Kedua kriteria sama pentingnya</td>
    </tr>

    <tr>
        <td class="guide-page-row"><span class="criteria-span">Kriteria 1</span> sedikit lebih penting dari <span class="criteria-span">Kriteria 2</span>, tetapi tidak signifikan</td>
        <td class="guide-page-row">
            Salah satunya sedikit lebih penting
        </td>
    </tr>

    <tr>
        <td class="guide-page-row"><span class="criteria-span">Kriteria 1</span> jauh lebih penting dari <span class="criteria-span">Kriteria 2</span></td>
        <td class="guide-page-row">Salah satu kriteria jauh lebih penting daripada kriteria yang lainnya</td>
    </tr>

    <tr>
        <td class="guide-page-row"><span class="criteria-span">Kriteria 1</span> sangat jauh lebih penting dari <span class="criteria-span">Kriteria 2</span></td>
        <td class="guide-page-row">
            Salah satunya sangat jauh lebih penting
        </td>
    </tr>

    <tr>
        <td class="guide-page-row"><span class="criteria-span">Kriteria 1</span> mutlak lebih penting dari <span class="criteria-span">Kriteria 2</span></td>
        <td class="guide-page-row">Salah satunya sangat penting</td>
    </tr>

    <tr>
        <td class="guide-page-row">
            <ul>
                <li><span class="criteria-span">Kriteria 1</span> berada di posisi antara sedikit lebih penting dari <span class="criteria-span">Kriteria 2</span> atau sama pentingnya</li>
                <li><span class="criteria-span">Kriteria 1</span> berada di posisi antara sedikit lebih penting atau jauh lebih penting dari <span class="criteria-span">Kriteria 2</span></li>
                <li><span class="criteria-span">Kriteria 1</span> berada di posisi antara jauh lebih penting atau sangat jauh lebih penting dari <span class="criteria-span">Kriteria 2</span></li>
                <li><span class="criteria-span">Kriteria 1</span> berada di posisi antara jauh lebih penting atau mutlak lebih penting dari <span class="criteria-span">Kriteria 2</span></li>
            </ul>
        </td>
        <td class="guide-page-row">
            Nilai-nilai antara dua nilai pertimbangan-pertimbangan yang
            berdekatan
        </td>
    </tr>
</table>

<div class="d-flex mt-4">
    <img class="img-example-guide" src="/img/submit.jpeg"/>
    <p class="text-guide-2">
        Setelah memilih tingkat kepentingan antara kriteria 1 dan kriteria 2, klik tombol "Cari rekomendasi" untuk menampilkan hasil rekomendasi indekos.
    </p>
</div>
@endsection
