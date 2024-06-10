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

            <div class="form-ahp-matrices">
                <div class="form-ahp-matrix-2">
                    <p class="matrix-ahp-2">Skala Kepentingan Pengguna 1</p>
                    @include('ahp.dua_user.form_c1c2u1')
                    @include('ahp.dua_user.form_c1c3u1')
                    @include('ahp.dua_user.form_c1c4u1')
                    @include('ahp.dua_user.form_c1c5u1')
                    @include('ahp.dua_user.form_c2c3u1')
                    @include('ahp.dua_user.form_c2c4u1')
                    @include('ahp.dua_user.form_c2c5u1')
                    @include('ahp.dua_user.form_c3c4u1')  
                    @include('ahp.dua_user.form_c3c5u1') 
                    @include('ahp.dua_user.form_c4u1')  
                    @include('ahp.dua_user.form_sc1u1')
                    @include('ahp.dua_user.form_sc2u1')
                    @include('ahp.dua_user.form_sc3u1') 
                    @include('ahp.dua_user.form_sc4u1')
                </div>

                <div class="form-ahp-matrix-2">
                    <p class="matrix-ahp-2">Skala Kepentingan Pengguna 2</p>
                    @include('ahp.dua_user.form_c1c2u2')
                    @include('ahp.dua_user.form_c1c3u2')
                    @include('ahp.dua_user.form_c1c4u2')
                    @include('ahp.dua_user.form_c1c5u2')
                    @include('ahp.dua_user.form_c2c3u2')
                    @include('ahp.dua_user.form_c2c4u2')
                    @include('ahp.dua_user.form_c2c5u2')
                    @include('ahp.dua_user.form_c3c4u2')  
                    @include('ahp.dua_user.form_c3c5u2') 
                    @include('ahp.dua_user.form_c4u2')
                    @include('ahp.dua_user.form_sc1u2')
                    @include('ahp.dua_user.form_sc2u2')
                    @include('ahp.dua_user.form_sc3u2') 
                    @include('ahp.dua_user.form_sc4u2')
                </div>
            </div>

            <div class="container-button-calculate">
                <button class="calculate-button" type="submit">Cari Rekomendasi</button>
            </div>
        </form>
    </div>
@endsection
