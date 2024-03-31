@extends('layout.template')
@section('container')
@if($errors->any())
<div class="alert alert-danger">
    <ul class="error-alert">
        @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
@endif
<h1 class="text-login">Login Akun</h1>
<div class="container-login">
<img class="logo-login" src="img/logo.png" alt="Logo" />
    <form class="form-container" action="/login" method="POST" autocomplete="on">
        @csrf
        <label class="label-field-login">Email</label>
        <input class="input-login" type="text" name="email" value="{{ old('email') }}" />
        <label class="label-field-login">Password</label>
        <input class="input-login" type="password" name="password" />
        <button class="button-login-account" name="submit" type="submit" class="btn btn-primary">Masuk</button>
    </form>
</div>
@endsection
