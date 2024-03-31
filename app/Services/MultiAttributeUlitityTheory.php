<?php
namespace App\Services;

use App\Models\SkalaAlternatif;

class MultiAttributeUlitityTheory {
    
    protected $skalaAlternatifs;

    public function __construct()
    {
        $this->skalaAlternatifs = SkalaAlternatif::all();
    }

    public function PerhitunganBobotAlternatif()
    {
        $maxKriteria = [];
        $minKriteria = [];
    
        foreach ($this->skalaAlternatifs as $skalaAlternatif) {
            foreach (['skala_fasilitas', 'skala_harga', 'skala_lokasi', 'skala_lingkungan', 'skala_kondisi'] as $kriteria) {
                if (!isset($maxKriteria[$kriteria])) {
                    $maxKriteria[$kriteria] = $skalaAlternatif->$kriteria;
                    $minKriteria[$kriteria] = $skalaAlternatif->$kriteria;
                } else {
                    $maxKriteria[$kriteria] = max($maxKriteria[$kriteria], $skalaAlternatif->$kriteria);
                    $minKriteria[$kriteria] = min($minKriteria[$kriteria], $skalaAlternatif->$kriteria);
                }
            }
        }
    
        $DataPenilaianArr = [];
    
        foreach ($this->skalaAlternatifs as $skalaAlternatif) {
            foreach (['skala_fasilitas', 'skala_harga', 'skala_lokasi', 'skala_lingkungan', 'skala_kondisi'] as $kriteria) {
                $divisor = $maxKriteria[$kriteria] - $minKriteria[$kriteria];
                
                if ($divisor != 0) {
                    $bobot = ($skalaAlternatif->$kriteria - $minKriteria[$kriteria]) / $divisor;
                    $DataPenilaianArr[$skalaAlternatif->alternatif_id][$kriteria] = $bobot;
                } else {
                    $bobot = 0; 
                    $DataPenilaianArr[$skalaAlternatif->alternatif_id][$kriteria] = $bobot;
                }
            }
        }
        
        return $DataPenilaianArr;
    }
    
}
