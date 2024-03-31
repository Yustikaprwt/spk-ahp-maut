<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('admin.login');
    }

    function login(Request $request) {
        $request->validate(
            [
                'email'=>'required',
                'password'=>'required'
            ],
            [
                'email.required'=> 'Email wajib diisi!',
                'password.required'=> 'Password wajib diisi!'
            ]
        );

        $infologin = [
            'email'=> $request->email,
            'password'=>$request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('alternatif');
    } else {
        return redirect('/login')->withErrors('Email dan password yang dimasukkan tidak sesuai')->withInput();
    }
}

function logout() {
    Auth::logout();
    return redirect('/');
}
}
