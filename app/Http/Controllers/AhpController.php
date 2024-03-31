<?php

namespace App\Http\Controllers;

use App\Models\SkalaAlternatif;
use Illuminate\Http\Request;
use App\Services\AnalyticalHierarchyProcess;
use App\Services\MultiAttributeUlitityTheory;

class AhpController extends Controller
{
    protected $ahp;
    public  function __construct(AnalyticalHierarchyProcess $ahp)
    {
        $this->ahp = $ahp;
    }

    public function hitungAhp(Request $request)
    {
        $input = $request->all();

        // AHP KRITERIA
        $matriksPerbandinganKriteria = [
            [
                1,
                $input['C1-C2'],
                $input['C1-C3'],
                $input['C1-C4'],
                $input['C1-C5'],
            ],
            [
                1 / $input['C1-C2'],
                1,
                $input['C2-C3'],
                $input['C2-C4'],
                $input['C2-C5'],
            ],
            [
                1 / $input['C1-C3'],
                1 / $input['C2-C3'],
                1,
                $input['C3-C4'],
                $input['C3-C5'],
            ],
            [
                1 / $input['C1-C4'],
                1 / $input['C2-C4'],
                1 / $input['C3-C4'],
                1,
                $input['C4-C5'],
            ],
            [
                1 / $input['C1-C5'],
                1 / $input['C2-C5'],
                1 / $input['C3-C5'],
                1 / $input['C4-C5'],
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

        $AHPKriteria = [
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

        // AHP SUBKRITERIA FASILITAS
        $matriksPerbandinganFasilitas = [
            [
                1,
                $input['C1A-C1B'],
                $input['C1A-C1C'],
                $input['C1A-C1D'],
            ],
            [
                1 / $input['C1A-C1B'],
                1,
                $input['C1B-C1C'],
                $input['C1B-C1D'],
            ],
            [
                1 / $input['C1A-C1C'],
                1 / $input['C1B-C1C'],
                1,
                $input['C1C-C1D'],
            ],
            [
                1 / $input['C1A-C1D'],
                1 / $input['C1B-C1D'],
                1 / $input['C1C-C1D'],
                1,
            ]
        ];

        $nilaiPerkolomFasilitas = $ahpService->matriksPerbandinganBerpasangan($matriksPerbandinganFasilitas); 
        $normalisasiMatrixFasilitas = $ahpService->normalisasiMatriks($matriksPerbandinganFasilitas, $nilaiPerkolomFasilitas); 
        $nilaiEigenFasilitas = $ahpService->hitungNilaiEigen($normalisasiMatrixFasilitas);
        $lambdaMaxFasilitas = $ahpService->hitungLambdaMax($matriksPerbandinganFasilitas, $nilaiEigenFasilitas); 
        $consistencyIndexFasilitas = $ahpService->hitungConsistencyIndex($lambdaMaxFasilitas, count($matriksPerbandinganFasilitas));
        $matrixOrderFasilitas = count($matriksPerbandinganFasilitas);
        $consistencyRatioFasilitas = $ahpService->hitungConsistencyRatio($consistencyIndexFasilitas, $matrixOrderFasilitas);

        if ($consistencyRatioFasilitas > 0.1) {
            return redirect()->back()->with('error', 'Consistency Ratio melebihi 0.1. Mohon lakukan pemilihan skala kepentingan lagi.');
        }

        $AHPFasilitas = [
            'pairwiseComparisonMatrix' => $matriksPerbandinganFasilitas,
            'columnTotals' => $nilaiPerkolomFasilitas,
            'normalizedMatrix' => $normalisasiMatrixFasilitas,
            'eigenVector' => $nilaiEigenFasilitas, 
            'lambdaMax' => $lambdaMaxFasilitas,
            'consistencyIndex' => $consistencyIndexFasilitas,
            'consistencyRatio' => $consistencyRatioFasilitas,
    ];

    // AHP SUBKRITERIA HARGA
    $matriksPerbandinganHarga = 
    [
        [
            1,
            $input['C2A-C2B'],
        ],
        [
            1/ $input['C2A-C2B'],
            1
        ]
    ];

        $nilaiPerkolomHarga = $ahpService->matriksPerbandinganBerpasangan($matriksPerbandinganHarga); 
        $normalisasiMatrixHarga = $ahpService->normalisasiMatriks($matriksPerbandinganHarga, $nilaiPerkolomHarga);
        $nilaiEigenHarga = $ahpService->hitungNilaiEigen($normalisasiMatrixHarga);

        $AHPHarga = [
            'pairwiseComparisonMatrix' => $matriksPerbandinganHarga,
            'columnTotals' => $nilaiPerkolomHarga,
            'normalizedMatrix' => $normalisasiMatrixHarga,
            'eigenVector' => $nilaiEigenHarga, 
        ];


    // AHP LOKASI
    $matriksPerbandinganLokasi = [
        [
            1,
            $input['C3A-C3B'],
        ],
        [
            1 / $input['C3A-C3B'],
            1,
        ]
    ];

        $nilaiPerkolomLokasi = $ahpService->matriksPerbandinganBerpasangan($matriksPerbandinganLokasi); 
        $normalisasiMatrixLokasi = $ahpService->normalisasiMatriks($matriksPerbandinganLokasi, $nilaiPerkolomLokasi);
        $nilaiEigenLokasi = $ahpService->hitungNilaiEigen($normalisasiMatrixLokasi);

        $AHPLokasi = [
            'pairwiseComparisonMatrix' => $matriksPerbandinganLokasi,
            'columnTotals' => $nilaiPerkolomLokasi,
            'normalizedMatrix' => $normalisasiMatrixLokasi,
            'eigenVector' => $nilaiEigenLokasi, 
        ];

    // AHP Lingkungan
    $matriksPerbandinganLingkungan = [
        [
            1,
            $input['C4A-C4B'],
        ],
        [
            1 / $input['C4A-C4B'],
            1,
        ]
    ];

        $nilaiPerkolomLingkungan = $ahpService->matriksPerbandinganBerpasangan($matriksPerbandinganLingkungan); 
        $normalisasiMatrixLingkungan = $ahpService->normalisasiMatriks($matriksPerbandinganLingkungan, $nilaiPerkolomLingkungan);
        $nilaiEigenLingkungan = $ahpService->hitungNilaiEigen($normalisasiMatrixLingkungan);

        $AHPLingkungan = [
            'pairwiseComparisonMatrix' => $matriksPerbandinganLingkungan,
            'columnTotals' => $nilaiPerkolomLingkungan,
            'normalizedMatrix' => $normalisasiMatrixLingkungan,
            'eigenVector' => $nilaiEigenLingkungan, 
        ];

    // NILAI EIGEN KRITERIA
    $nilaiEigenKriteriaFasilitas = $AHPKriteria['eigenVector'][0];
    $nilaiEigenKriteriaHarga = $AHPKriteria['eigenVector'][1];
    $nilaiEigenKriteriaLokasi = $AHPKriteria['eigenVector'][2];
    $nilaiEigenKriteriaLingkungan = $AHPKriteria['eigenVector'][3];
    $nilaiEigenKriteriaKondisi = $AHPKriteria['eigenVector'][4];
    $nilaiEigenKriteriaKondisiPersen = number_format($nilaiEigenKriteriaKondisi * 100, 1);

    // NILAI EIGEN SUBKRITERIA
    $nilaiEigenFasilitas = array_slice($AHPFasilitas['eigenVector'], 0, 4);
    $nilaiEigenHarga = array_slice($AHPHarga['eigenVector'], 0,2);
    $nilaiEigenLokasi = array_slice($AHPLokasi['eigenVector'], 0,2);
    $nilaiEigenLingkungan = array_slice($AHPLingkungan['eigenVector'], 0,2);

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

        $skalaAlternatif = SkalaAlternatif::find($index + 1); // Assuming ID starts from 1

        if ($skalaAlternatif) {
            // Retrieve alternatif attributes
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

            // Calculate total bobot for the current alternatif
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
            // Jika SkalaAlternatif tidak ditemukan, lanjut ke iterasi berikutnya
            continue;
        }
    }

    arsort($totalBobotAlternatif);

    return view('ahp.satu_user.result', 
        compact(
            'AHPKriteria', 
            'AHPFasilitas', 
            'AHPHarga', 
            'AHPLokasi', 
            'AHPLingkungan', 
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
