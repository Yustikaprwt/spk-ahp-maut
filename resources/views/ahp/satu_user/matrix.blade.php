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
                @include('ahp.satu_user.form_c1')
                @include('ahp.satu_user.form_c2')
                @include('ahp.satu_user.form_c3')
                @include('ahp.satu_user.form_c4')
                @include('ahp.satu_user.form_sc1')
                @include('ahp.satu_user.form_sc2')
                @include('ahp.satu_user.form_sc3')
                @include('ahp.satu_user.form_sc4')
                <div class="container-button-calculate">
                    <button class="calculate-button" type="submit">Cari Rekomendasi</button>
                </div>
        </form>
    </div>
@endsection  