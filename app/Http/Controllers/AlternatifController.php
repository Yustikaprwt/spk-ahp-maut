<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 2;
    
        if (strlen($katakunci)) {
            $data_alternatif = Alternatif::where('nama_alternatif', 'like', "%$katakunci%")
                        ->orWhere('kategori_alternatif', 'like', "%$katakunci%")
                        ->paginate($jumlahbaris);
        } else {
            $data_alternatif = Alternatif::orderBy('nama_alternatif', 'desc')->paginate($jumlahbaris);
        }
        
        return view('alternatif.data', compact('data_alternatif'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foto_file = $request->file('gambar_alternatif');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('gambar_alternatif'), $foto_nama);

        Session::flash('gambar_indekos', $foto_nama);
        Session::flash('nama_alternatif', $request->nama_alternatif);
        Session::flash('kategori_alternatif', $request->kategori_alternatif);
        Session::flash('alamat_alternatif', $request->alamat_alternatif);
        Session::flash('kontak_alternatif', $request->kontak_alternatif);
        Session::flash('jarak_kampus', $request->jarak_kampus);
        Session::flash('fasilitas_alternatif', $request->fasilitas_alternatif);
        Session::flash('harga_alternatif', $request->harga_alternatif);
        Session::flash('sistem_pembayaran', $request->sistem_pembayaran);
        Session::flash('layanan_publik', $request->layanan_publik);
        Session::flash('lingkungan_alternatif', $request->lingkungan_alternatif);
        Session::flash('kondisi_alternatif', $request->kondisi_alternatif);

        $request->validate([
            'nama_alternatif' => 'required',
            'kategori_alternatif' => 'required',
            'alamat_alternatif' => 'required',
            'kontak_alternatif' => 'required',
            'jarak_kampus' => 'required',
            'fasilitas_alternatif' => 'required',
            'harga_alternatif' => 'required',
            'sistem_pembayaran' => 'required',
            'layanan_publik' => 'required',
            'lingkungan_alternatif'=> 'required',
            'kondisi_alternatif' => 'required'
        ], [
            'nama_alternatif.required'=>'Nama alternatif wajib diisi!',
            'kategori_alternatif.required'=>'Kategori alternatif wajib diisi!',
            'alamat_alternatif.required'=>'Alamat alternatif wajib diisi!',
            'kontak_alternatif.required'=>'Kontak alternatif wajib diisi!',
            'jarak_kampus.required'=>'Jarak alternatif dengan kampus wajib diisi!',
            'fasilitas_alternatif.required'=>'Fasilitas alternatif wajib diisi!',
            'harga_alternatif.required'=>'Harga alternatif wajib diisi!',
            'sistem_pembayaran.required'=>'Sistem pembayaran alternatif wajib diisi!',
            'layanan_publik.required'=>'Layanan publik terdekat dari alternatif wajib diisi!',
            'lingkungan_alternatif.required'=>'Lingkungan & Keamanan alternatif wajib diisi!',
            'kondisi_alternatif.required'=>'Kondisi kamar alternatif wajib diisi!',
        ]);

        $alternatif = [
            'gambar_alternatif'=> $foto_nama,
            'nama_alternatif'=> $request->nama_alternatif,
            'kategori_alternatif'=> $request->kategori_alternatif,
            'alamat_alternatif'=> $request->alamat_alternatif,
            'kontak_alternatif'=> $request->kontak_alternatif,
            'jarak_kampus'=> $request->jarak_kampus,
            'fasilitas_alternatif'=> $request->fasilitas_alternatif,
            'harga_alternatif'=> $request->harga_alternatif,
            'sistem_pembayaran'=> $request->sistem_pembayaran,
            'layanan_publik'=> $request->layanan_publik,
            'lingkungan_alternatif'=> $request->lingkungan_alternatif,
            'kondisi_alternatif'=> $request->kondisi_alternatif,
        ];

        Alternatif::create($alternatif);

        return redirect()->to('alternatif')->with(['success' => 'Berhasil menambahkan data alternatif', 'alternatif' => $alternatif]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_alternatif = Alternatif::where('nama_alternatif',$id)->first();
        return view('alternatif.edit')->with('alternatif', $data_alternatif);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_alternatif' => 'required',
            'alamat_alternatif' => 'required',
            'kontak_alternatif' => 'required',
            'jarak_kampus' => 'required',
            'fasilitas_alternatif' => 'required',
            'harga_alternatif' => 'required',
            'sistem_pembayaran' => 'required',
            'layanan_publik' => 'required',
            'lingkungan_alternatif'=> 'required',
            'kondisi_alternatif' => 'required'
        ], [
            'kategori_alternatif.required'=>'Kategori alternatif wajib diisi!',
            'alamat_alternatif.required'=>'Alamat alternatif wajib diisi!',
            'kontak_alternatif.required'=>'Kontak alternatif wajib diisi!',
            'jarak_kampus.required'=>'Jarak alternatif dengan kampus wajib diisi!',
            'fasilitas_alternatif.required'=>'Fasilitas alternatif wajib diisi!',
            'harga_alternatif.required'=>'Harga alternatif wajib diisi!',
            'sistem_pembayaran.required'=>'Sistem pembayaran alternatif wajib diisi!',
            'layanan_publik.required'=>'Layanan publik terdekat dari alternatif wajib diisi!',
            'lingkungan_alternatif.required'=>'Lingkungan & Keamanan alternatif wajib diisi!',
            'kondisi_alternatif.required'=>'Kondisi kamar alternatif wajib diisi!',
        ]);

        $alternatif = [
            'gambar_alternatif'=> $request->gambar_alternatif,
            'kategori_alternatif'=> $request->kategori_alternatif,
            'alamat_alternatif'=> $request->alamat_alternatif,
            'kontak_alternatif'=> $request->kontak_alternatif,
            'jarak_kampus'=> $request->jarak_kampus,
            'fasilitas_alternatif'=> $request->fasilitas_alternatif,
            'harga_alternatif'=> $request->harga_alternatif,
            'sistem_pembayaran'=> $request->sistem_pembayaran,
            'layanan_publik'=> $request->layanan_publik,
            'lingkungan_alternatif'=> $request->lingkungan_alternatif,
            'kondisi_alternatif'=> $request->kondisi_alternatif,
        ];

        if ($request->hasFile('gambar_alternatif')) {
            $request->file('gambar_alternatif')->move('gambar_alternatif/', $request->file('gambar_alternatif')->getClientOriginalName());
            $alternatif['gambar_alternatif'] = $request->file('gambar_alternatif')->getClientOriginalName();
        }
        Alternatif::where('nama_alternatif', $id)->update($alternatif);
        return redirect()->to('alternatif')->with(['success' => 'Berhasil menyunting data alternatif', 'alternatif' => $alternatif]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Alternatif::where('nama_alternatif', $id)->delete();
        return redirect()->to('alternatif')->with('success', 'Berhasil melakukan delete data alternatif');   
    }
}
