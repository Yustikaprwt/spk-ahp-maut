@extends('partials.navbar')
@section('container')
@include('user.guide_card')
    <div class="container-form-ahp-2">
        <form class="form-ahp" method="POST" action="/rekomendasi/dua" enctype="multipart/form-data">
            @csrf
            <div class="form-ahp-section-1">
                <h3 class="title-form-ahp">Form Skala Kepentingan</h3>
                <img src="/img/icon-woman.png"/>
            </div>

            <div style="display: flex; flex-direction:row; margin-bottom:30px">
                <div class="form-ahp-matrix-2">
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Fasilitas Pengguna 1 --</p>
                    @include('ahp.dua_user.form_c1u1')
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Harga Pengguna 1 --</p>
                    @include('ahp.dua_user.form_c2u1')      
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Lokasi Pengguna 1 --</p>
                    @include('ahp.dua_user.form_c3u1')  
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Lingkungan Pengguna 1 --</p>
                    @include('ahp.dua_user.form_c4u1')  
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Subkriteria Fasilitas Pengguna 1 --</p>
                    @include('ahp.dua_user.form_sc1u1')
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Subkriteria Harga Pengguna 1 --</p>
                    @include('ahp.dua_user.form_sc2u1')
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Subkriteria Lokasi Pengguna 1 --</p>
                    @include('ahp.dua_user.form_sc3u1') 
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Subkriteria Lingkungan Pengguna 1 --</p>
                    @include('ahp.dua_user.form_sc4u1')
                </div>

                <div class="form-ahp-matrix-3">
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Fasilitas Pengguna 2 --</p>
                    @include('ahp.dua_user.form_c1u2')  
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Harga Pengguna 2 --</p>
                    @include('ahp.dua_user.form_c2u2')
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Lokasi Pengguna 2 --</p>
                    @include('ahp.dua_user.form_c3u2')
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Lingkungan Pengguna 2 --</p>
                    @include('ahp.dua_user.form_c4u2')
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Subkriteria Fasilitas Pengguna 2 --</p>
                    @include('ahp.dua_user.form_sc1u2')
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Subkriteria Harga Pengguna 2 --</p>
                    @include('ahp.dua_user.form_sc2u2')
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Subkriteria Lokasi Pengguna 2 --</p>
                    @include('ahp.dua_user.form_sc3u2') 
                    <p class="matrix-ahp-2">-- Skala Kepentingan Kriteria Subkriteria Lingkungan Pengguna 2 --</p>
                    @include('ahp.dua_user.form_sc4u2')
                </div>
            </div>

                <div class="container-button-calculate">
                    <button class="calculate-button" type="submit">Cari Rekomendasi</button>
                </div>
        </form>
    </div>
@endsection  