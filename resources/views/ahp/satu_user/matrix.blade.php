@extends('partials.navbar')
@section('container')
@include('user.guide_card')
    <div class="container-form-ahp">
        <form class="form-ahp" method="POST" action="/rekomendasi" enctype="multipart/form-data">
            @csrf
            <div class="form-ahp-section-1">
                <h3 class="title-form-ahp">Form Skala Kepentingan</h3>
                <img src="/img/icon-woman.png"/>
            </div>
            
                {{-- KRITERIA FASILITAS (C1) --}}
                @include('ahp.satu_user.form_c1c2')
                @include('ahp.satu_user.form_c1c3')
                @include('ahp.satu_user.form_c1c4')
                @include('ahp.satu_user.form_c1c5')

                {{-- KRITERIA HARGA (C2) --}}
                @include('ahp.satu_user.form_c2c3')
                @include('ahp.satu_user.form_c2c4')
                @include('ahp.satu_user.form_c2c5')

                {{-- KRITERIA LOKASI (C3) --}}
                @include('ahp.satu_user.form_c3c4')
                @include('ahp.satu_user.form_c3c5')
                
               {{-- KRITERIA LINGKUNGAN (C4) --}}
                @include('ahp.satu_user.form_c4')

                {{-- SUBKRITERIA FASILITAS (C1A-C1D) --}}
                @include('ahp.satu_user.form_c1ac1b')
                @include('ahp.satu_user.form_c1ac1c')
                @include('ahp.satu_user.form_c1ac1d')
                @include('ahp.satu_user.form_c1bc1c')
                @include('ahp.satu_user.form_c1bc1d')
                @include('ahp.satu_user.form_c1cc1d')

                {{-- SUBKRITERIA HARGA (C2A-C2B) --}}
                @include('ahp.satu_user.form_sc2')

                {{-- SUBKRITERIA LOKASI (C3A-C3B) --}}
                @include('ahp.satu_user.form_sc3')

                {{-- SUBKRITERIA LINGKUNGAN (C4A-C4B) --}}
                @include('ahp.satu_user.form_sc4')

                <div class="container-button-calculate">
                    <button class="calculate-button" type="submit">Cari Rekomendasi</button>
                </div>
        </form>
    </div>
@endsection  