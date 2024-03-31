<?php

namespace App\Http\Controllers;

use App\Models\SkalaAlternatif;
use App\Services\MultiAttributeUlitityTheory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SkalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $katakunci = $request->katakunci;
    $jumlahbaris = 5;

    if (strlen($katakunci)) {
        $skala_alternatif = SkalaAlternatif::where('id_alternatif', 'like', "%$katakunci%")
                    ->paginate($jumlahbaris);
    } else {
        $skala_alternatif = SkalaAlternatif::paginate($jumlahbaris);
    }
    
    return view('alternatif.scale', compact('skala_alternatif'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alternatif.create_scale');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('alternatif_id', $request->alternatif_id);
        Session::flash('skala_fasilitas', $request->skala_fasilitas);
        Session::flash('skala_harga', $request->skala_harga);
        Session::flash('skala_lokasi', $request->skala_lokasi);
        Session::flash('skala_lingkungan', $request->skala_lingkungan);
        Session::flash('skala_kondisi', $request->skala_kondisi);

        $request->validate([
            'alternatif_id' => 'required',
            'skala_fasilitas' => 'required',
            'skala_harga' => 'required',
            'skala_lokasi' => 'required',
            'skala_lingkungan' => 'required',
            'skala_kondisi' => 'required',
        ], [
            'alternatif_id.required' =>'ID alternatif wajib diisi!',
            'skala_fasilitas.required' =>'Skala fasilitas alternatif wajib diisi!',
            'skala_harga.required' =>'Skala harga alternatif wajib diisi!',
            'skala_lokasi.required' => 'Skala lokasi alternatif wajib diisi!',
            'skala_lingkungan.required' => 'Skala lingkungan alternatif wajib diisi!',
            'skala_kondisi.required' => 'Skala kondisi alternatif wajib diisi!',
        ]);

        $skalaAlternatif = [
            'alternatif_id' => $request->alternatif_id,
            'skala_fasilitas' => $request->skala_fasilitas,
            'skala_harga' => $request->skala_harga,
            'skala_lokasi' => $request->skala_lokasi,
            'skala_lingkungan' => $request->skala_lingkungan,
            'skala_kondisi' => $request->skala_kondisi,
        ];

        SkalaAlternatif::create($skalaAlternatif);

        return redirect()->to('/skala/alternatif')->with(['success' => 'Berhasil menambahkan data skala alternatif', 'alternatif' => $skalaAlternatif]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skala_alternatif = SkalaAlternatif::where('alternatif_id',$id)->first();
        return view('alternatif.edit_scale')->with('skala_alternatif', $skala_alternatif);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'skala_fasilitas' => 'required',
            'skala_harga' => 'required',
            'skala_lokasi' => 'required',
            'skala_lingkungan' => 'required',
            'skala_kondisi' => 'required',
        ], [
            'skala_fasilitas.required' =>'Skala fasilitas alternatif wajib diisi!',
            'skala_harga.required' =>'Skala harga alternatif wajib diisi!',
            'skala_lokasi.required' => 'Skala lokasi alternatif wajib diisi!',
            'skala_lingkungan.required' => 'Skala lingkungan alternatif wajib diisi!',
            'skala_kondisi.required' => 'Skala kondisi alternatif wajib diisi!',
        ]);

        $skalaAlternatif = [
            'skala_fasilitas' => $request->skala_fasilitas,
            'skala_harga' => $request->skala_harga,
            'skala_lokasi' => $request->skala_lokasi,
            'skala_lingkungan' => $request->skala_lingkungan,
            'skala_kondisi' => $request->skala_kondisi,
        ];

        SkalaAlternatif::where('alternatif_id', $id)->update($skalaAlternatif);

        return redirect()->to('/skala/alternatif')->with(['success' => 'Berhasil menyunting data skala alternatif', 'alternatif' => $skalaAlternatif]);
    }

    public function hitungBobotAlternatif()
    {
        $maut = new MultiAttributeUlitityTheory();
        $bobotAlternatif = $maut->PerhitunganBobotAlternatif();
        return view('alternatif.bobot', ['bobotAlternatif' => $bobotAlternatif]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
