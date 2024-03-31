<?php

namespace App\Http\Controllers;

use App\Models\SkalaAlternatif;
use App\Services\AnalyticalHierarchyProcess;
use App\Services\MultiAttributeUlitityTheory;
use Illuminate\Http\Request;

class AhpController2 extends Controller
{
    public function hitungAhpGeomean(Request $request)
    {
        $input = $request->all();

        // Menghitung Geomean Kriteria
        $geomean_c1_c2 = sqrt(floatval($input['C1-C2-U1']) * floatval($input['C1-C2-U2']));
        $geomean_c1_c3 = sqrt(floatval($input['C1-C3-U1']) * floatval($input['C1-C3-U2']));
        $geomean_c1_c4 = sqrt(floatval($input['C1-C4-U1']) * floatval($input['C1-C4-U2']));
        $geomean_c1_c5 = sqrt(floatval($input['C1-C5-U1']) * floatval($input['C1-C5-U2']));
        $geomean_c2_c3 = sqrt(floatval($input['C2-C3-U1']) * floatval($input['C2-C3-U2']));
        $geomean_c2_c4 = sqrt(floatval($input['C2-C4-U1']) * floatval($input['C2-C4-U2']));
        $geomean_c2_c5 = sqrt(floatval($input['C2-C5-U1']) * floatval($input['C2-C5-U2']));
        $geomean_c3_c4 = sqrt(floatval($input['C3-C4-U1']) * floatval($input['C3-C4-U2']));
        $geomean_c3_c5 = sqrt(floatval($input['C3-C5-U1']) * floatval($input['C3-C5-U2']));
        $geomean_c4_c5 = sqrt(floatval($input['C4-C5-U1']) * floatval($input['C4-C5-U2']));
        
        // Menghitung Geomean Subkriteria Fasilitas
        $geomean_c1A_c1B = sqrt(floatval($input['C1A-C1B-U1']) * floatval($input['C1A-C1B-U2']));
        $geomean_c1A_c1C = sqrt(floatval($input['C1A-C1C-U1']) * floatval($input['C1A-C1C-U2']));
        $geomean_c1A_c1D = sqrt(floatval($input['C1A-C1D-U1']) * floatval($input['C1A-C1D-U2']));
        $geomean_c1B_c1C = sqrt(floatval($input['C1B-C1C-U1']) * floatval($input['C1B-C1C-U2']));
        $geomean_c1B_c1D = sqrt(floatval($input['C1B-C1D-U1']) * floatval($input['C1B-C1D-U2']));
        $geomean_c1C_c1D = sqrt(floatval($input['C1C-C1D-U1']) * floatval($input['C1C-C1D-U2']));

        // Menghitung Geomean Subkriteria Harga
        $geomean_c2A_c2B = sqrt(floatval($input['C2A-C2B-U1']) * floatval($input['C2A-C2B-U2']));

        // Menghitung Geomean Subkriteria Lokasi
        $geomean_c3A_c3B = sqrt(floatval($input['C3A-C3B-U1']) * floatval($input['C3A-C3B-U2']));

        // Menghitung Geomean Subkriteria Lingkungan
        $geomean_c4A_c4B = sqrt(floatval($input['C4A-C4B-U1']) * floatval($input['C4A-C4B-U2']));

        // AHP Kriteria Dua Pengguna
        $matriksPerbandinganKriteria = [
            [
                1,
                $geomean_c1_c2,
                $geomean_c1_c3,
                $geomean_c1_c4,
                $geomean_c1_c5
            ],
            [
                1 / $geomean_c1_c2,
                1,
                $geomean_c2_c3,
                $geomean_c2_c4,
                $geomean_c2_c5,
            ],
            [
                1 / $geomean_c1_c3,
                1 / $geomean_c2_c3,
                1,
                $geomean_c3_c4,
                $geomean_c3_c5
            ],
            [
                1 / $geomean_c1_c4,
                1 / $geomean_c2_c4,
                1 / $geomean_c3_c4,
                1,
                $geomean_c4_c5
            ],
            [
                1 /  $geomean_c1_c5,
                1 / $geomean_c2_c5,
                1 / $geomean_c3_c5,
                1 / $geomean_c4_c5,
                1,
            ]
        ];

        $ahpService = new AnalyticalHierarchyProcess();
        $nilaiPerkolom = $ahpService->matriksPerbandinganBerpasangan($matriksPerbandinganKriteria);
        $normalisasiMatrix = $ahpService->normalisasiMatriks($matriksPerbandinganKriteria, $nilaiPerkolom);
        $nilaiEigen = $ahpService->hitungNilaiEigen($normalisasiMatrix);
        $lambdaMax = $ahpService->hitungLambdaMax($matriksPerbandinganKriteria, $nilaiEigen); 
        $consistencyIndex = $ahpService->hitungConsistencyIndex($lambdaMax, count($matriksPerbandinganKriteria));
        $matrixOrder = count($matriksPerbandinganKriteria);
        $consistencyRatio = $ahpService->hitungConsistencyRatio($consistencyIndex, $matrixOrder);

        $AHPKriteriaDuaPengguna = [
            'pairwiseComparisonMatrix' => $matriksPerbandinganKriteria,
            'columnTotals' => $nilaiPerkolom,
            'normalizedMatrix' => $normalisasiMatrix,
            'eigenVector' => $nilaiEigen,
            'lambdaMax' => $lambdaMax,
            'consistencyIndex' => $consistencyIndex,
            'consistencyRatio' => $consistencyRatio,
        ];

        if ($consistencyRatio > 0.1) {
            return redirect()->back()->with('error', 'Consistency Ratio melebihi 0.1. Mohon lakukan pemilihan skala kepentingan lagi.');
        }

        $matriksPerbandinganFasilitas = [
            [
                1,
                $geomean_c1A_c1B,
                $geomean_c1A_c1C,
                $geomean_c1A_c1D
            ],
            [
                1 / $geomean_c1A_c1B,
                1,
                $geomean_c1B_c1C,
                $geomean_c1B_c1D
            ],
            [
                1 / $geomean_c1A_c1C,
                1 / $geomean_c1B_c1C,
                1,
                $geomean_c1C_c1D
            ],
            [
                1 / $geomean_c1A_c1D,
                1 / $geomean_c1B_c1D,
                1 / $geomean_c1C_c1D,
                1
            ]
        ];

        $nilaiPerkolomFasilitas = $ahpService->matriksPerbandinganBerpasangan($matriksPerbandinganFasilitas); 
        $normalisasiMatrixFasilitas = $ahpService->normalisasiMatriks($matriksPerbandinganFasilitas, $nilaiPerkolomFasilitas); 
        $nilaiEigenFasilitas = $ahpService->hitungNilaiEigen($normalisasiMatrixFasilitas);
        $lambdaMaxFasilitas = $ahpService->hitungLambdaMax($matriksPerbandinganFasilitas, $nilaiEigenFasilitas); 
        $consistencyIndexFasilitas = $ahpService->hitungConsistencyIndex($lambdaMaxFasilitas, count($matriksPerbandinganFasilitas));
        $matrixOrderFasilitas = count($matriksPerbandinganFasilitas);
        $consistencyRatioFasilitas = $ahpService->hitungConsistencyRatio($consistencyIndexFasilitas, $matrixOrderFasilitas);

        $AHPFasilitasDuaPengguna = [
            'pairwiseComparisonMatrix' => $matriksPerbandinganFasilitas,
            'columnTotals' => $nilaiPerkolomFasilitas,
            'normalizedMatrix' => $normalisasiMatrixFasilitas,
            'eigenVector' => $nilaiEigenFasilitas, 
            'lambdaMax' => $lambdaMaxFasilitas,
            'consistencyIndex' => $consistencyIndexFasilitas,
            'consistencyRatio' => $consistencyRatioFasilitas,
        ];

        if ($consistencyRatioFasilitas > 0.1) {
            return redirect()->back()->with('error', 'Consistency Ratio melebihi 0.1. Mohon lakukan pemilihan skala kepentingan lagi.');
        }

        $matriksPerbandinganHarga = [
            [
                1,
                $geomean_c2A_c2B
            ],
            [
                1 / $geomean_c2A_c2B,
                1
            ]
        ];

        $nilaiPerkolomHarga = $ahpService->matriksPerbandinganBerpasangan($matriksPerbandinganHarga); 
        $normalisasiMatrixHarga = $ahpService->normalisasiMatriks($matriksPerbandinganHarga, $nilaiPerkolomHarga);
        $nilaiEigenHarga = $ahpService->hitungNilaiEigen($normalisasiMatrixHarga);

        $AHPHargaDuaPengguna = [
            'pairwiseComparisonMatrix' => $matriksPerbandinganHarga,
            'columnTotals' => $nilaiPerkolomHarga,
            'normalizedMatrix' => $normalisasiMatrixHarga,
            'eigenVector' => $nilaiEigenHarga, 
        ];

        $matriksPerbandinganLokasi = [
            [
                1,
                $geomean_c3A_c3B
            ],
            [
                1 / $geomean_c3A_c3B,
                1
            ]
        ];

        $nilaiPerkolomLokasi = $ahpService->matriksPerbandinganBerpasangan($matriksPerbandinganLokasi); 
        $normalisasiMatrixLokasi = $ahpService->normalisasiMatriks($matriksPerbandinganLokasi, $nilaiPerkolomLokasi);
        $nilaiEigenLokasi = $ahpService->hitungNilaiEigen($normalisasiMatrixLokasi);

        $AHPLokasiDuaPengguna = [
            'pairwiseComparisonMatrix' => $matriksPerbandinganLokasi,
            'columnTotals' => $nilaiPerkolomLokasi,
            'normalizedMatrix' => $normalisasiMatrixLokasi,
            'eigenVector' => $nilaiEigenLokasi, 
        ];

        $matriksPerbandinganLingkungan = [
            [
                1,
                1 / $geomean_c4A_c4B
            ],
            [
                1 / $geomean_c4A_c4B,
                1
            ]
        ];

        $nilaiPerkolomLingkungan = $ahpService->matriksPerbandinganBerpasangan($matriksPerbandinganLingkungan); 
        $normalisasiMatrixLingkungan = $ahpService->normalisasiMatriks($matriksPerbandinganLingkungan, $nilaiPerkolomLingkungan);
        $nilaiEigenLingkungan = $ahpService->hitungNilaiEigen($normalisasiMatrixLingkungan);

        $AHPLingkunganDuaPengguna = [
            'pairwiseComparisonMatrix' => $matriksPerbandinganLingkungan,
            'columnTotals' => $nilaiPerkolomLingkungan,
            'normalizedMatrix' => $normalisasiMatrixLingkungan,
            'eigenVector' => $nilaiEigenLingkungan, 
        ];

        // NILAI EIGEN KRITERIA
        $nilaiEigenKriteriaFasilitas = $AHPKriteriaDuaPengguna['eigenVector'][0];
        $nilaiEigenKriteriaHarga = $AHPKriteriaDuaPengguna['eigenVector'][1];
        $nilaiEigenKriteriaLokasi = $AHPKriteriaDuaPengguna['eigenVector'][2];
        $nilaiEigenKriteriaLingkungan = $AHPKriteriaDuaPengguna['eigenVector'][3];
        $nilaiEigenKriteriaKondisi = $AHPKriteriaDuaPengguna['eigenVector'][4];
        $nilaiEigenKriteriaKondisiPersen = number_format($nilaiEigenKriteriaKondisi * 100, 1);

        // NILAI EIGEN SUBKRITERIA
        $nilaiEigenFasilitas = array_slice($AHPFasilitasDuaPengguna['eigenVector'], 0, 4);
        $nilaiEigenHarga = array_slice($AHPHargaDuaPengguna['eigenVector'], 0,2);
        $nilaiEigenLokasi = array_slice($AHPLokasiDuaPengguna['eigenVector'], 0,2);
        $nilaiEigenLingkungan = array_slice($AHPLingkunganDuaPengguna['eigenVector'], 0,2);

        // GLOBAL WEIGHT FASILITAS
        $totalEigenFasilitas = [];
        foreach ($nilaiEigenFasilitas as $nilai) {
        $totalEigenFasilitas[] = $nilaiEigenKriteriaFasilitas * $nilai;
        $globalWeightFasilitas = array_sum($totalEigenFasilitas);
        $globalWeightFasilitasPersen = number_format($globalWeightFasilitas * 100, 1);
        }

        // GLOBAL WEIGHT HARGA
        $totalEigenHarga = [];
            foreach ($nilaiEigenHarga as $nilai) {
        $totalEigenHarga[] = $nilaiEigenKriteriaHarga * $nilai;
        $globalWeightHarga = array_sum($totalEigenHarga);
        $globalWeightHargaPersen = number_format($globalWeightHarga * 100, 1);
        }

        // GLOBAL WEIGHT LOKASI
        $totalEigenLokasi = [];
            foreach ($nilaiEigenLokasi as $nilai) {
        $totalEigenLokasi[] = $nilaiEigenKriteriaLokasi * $nilai;
        $globalWeightLokasi = array_sum($totalEigenLokasi);
        $globalWeightLokasiPersen = number_format($globalWeightLokasi * 100, 1);
        }

        // GLOBAL WEIGHT LINGKUNGAN
        $totalEigenLingkungan = [];
        foreach ($nilaiEigenLingkungan as $nilai) {
        $totalEigenLingkungan[] = $nilaiEigenKriteriaLingkungan * $nilai;
        $globalWeightLingkungan = array_sum($totalEigenLingkungan);
        $globalWeightLingkunganPersen = number_format($globalWeightLingkungan * 100, 1);
        }

        // AHP MAUT
        $maut = new MultiAttributeUlitityTheory();
        $bobotAlternatif = $maut->PerhitunganBobotAlternatif();

        $globalWeightFasilitas = $globalWeightFasilitas; 
        $globalWeightHarga = $globalWeightHarga;
        $globalWeightLokasi = $globalWeightLokasi; 
        $globalWeightLingkungan = $globalWeightLingkungan;

        $totalBobotAlternatif = [];   

        foreach ($bobotAlternatif as $index => $bobot) {
            $bobotAlternatifFasilitas = $bobot['skala_fasilitas'];
            $bobotAlternatifHarga = $bobot['skala_harga'];
            $bobotAlternatifLokasi = $bobot['skala_lokasi'];
            $bobotAlternatifLingkungan = $bobot['skala_lingkungan'];
            $bobotAlternatifKondisi = $bobot['skala_kondisi'];

            $skalaAlternatif = SkalaAlternatif::find($index + 1);

            if ($skalaAlternatif) {
                $alternatif = $skalaAlternatif->alternatif;
                $alternatifNama = $alternatif->nama_alternatif;
                $alternatifGambar = $alternatif->gambar_alternatif;
                $alternatifAlamat = $alternatif->alamat_alternatif;
                $alternatifKategori = $alternatif->kategori_alternatif;
                $alternatifKontak = $alternatif->kontak_alternatif;
                $alternatifJarak = $alternatif->jarak_kampus;
                $alternatifFasilitas = $alternatif->fasilitas_alternatif;
                $alternatifHarga = $alternatif->harga_alternatif;
                $alternatifPembayaran = $alternatif->sistem_pembayaran;
                $alternatifLayanan = $alternatif->layanan_publik;
                $alternatifLingkungan = $alternatif->lingkungan_alternatif;
                $alternatifKamar = $alternatif->kondisi_alternatif;

                $totalBobotAlternatif[$alternatifNama] = [
                    'total_bobot' => number_format(($globalWeightFasilitas * $bobotAlternatifFasilitas +
                                    $globalWeightHarga * $bobotAlternatifHarga +
                                    $globalWeightLokasi * $bobotAlternatifLokasi +
                                    $globalWeightLingkungan * $bobotAlternatifLingkungan +
                                    $nilaiEigenKriteriaKondisi * $bobotAlternatifKondisi), 5),
                    'total_bobot_persen' => number_format(($globalWeightFasilitas * $bobotAlternatifFasilitas +
                                    $globalWeightHarga * $bobotAlternatifHarga +
                                    $globalWeightLokasi * $bobotAlternatifLokasi +
                                    $globalWeightLingkungan * $bobotAlternatifLingkungan +
                                    $nilaiEigenKriteriaKondisi * $bobotAlternatifKondisi) * 100),
                    'nama' => $alternatifNama,
                    'gambar'=> $alternatifGambar,
                    'alamat' => $alternatifAlamat,
                    'kategori'=>$alternatifKategori,
                    'kontak'=>$alternatifKontak,
                    'jarak_kampus'=>$alternatifJarak,
                    'fasilitas'=>$alternatifFasilitas,
                    'harga'=>$alternatifHarga,
                    'sistem_pembayaran'=>$alternatifPembayaran,
                    'layanan_publik'=>$alternatifLayanan,
                    'lingkungan'=>$alternatifLingkungan,
                    'kamar'=>$alternatifKamar
                ];
            } else {
                continue;
            }
        }

        arsort($totalBobotAlternatif);
        
        return view('ahp.dua_user.result',
            compact(
                'AHPKriteriaDuaPengguna', 
                'AHPFasilitasDuaPengguna', 
                'AHPHargaDuaPengguna', 
                'AHPLokasiDuaPengguna', 
                'AHPLingkunganDuaPengguna', 
                'globalWeightFasilitasPersen',
                'globalWeightHargaPersen',
                'globalWeightLokasiPersen',
                'globalWeightLingkunganPersen',
                'nilaiEigenKriteriaKondisiPersen',
                'totalBobotAlternatif',
            )
        );
    }
}
