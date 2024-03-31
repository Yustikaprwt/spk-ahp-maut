<?php
namespace App\Services;

class AnalyticalHierarchyProcess {

    public function matriksPerbandinganBerpasangan (array $multiArray) {

        $tot = [];
        $columnSums = array_fill(0, count($multiArray[0]), 0);

        foreach ($multiArray as $row) {
            foreach ($row as $column => $value) {
                $columnSums[$column] += $value;
            }
        }

        foreach ($columnSums as $sum) {
            $tot[] = $sum;
        }

        return $tot;
    }

    public function normalisasiMatriks (array $matrix,array $tot) {
        $norm=[];
        foreach ($matrix as $key) {
            $inside = [];
            foreach($key as $x => $val) {
                $inside[] = ($val/$tot[$x]);
            }
            $norm[] = $inside;
        }
        return $norm;
    }

    public function hitungNilaiEigen (array $matrix) {
        $eigen = [];
        foreach($matrix as $key) {
            $sum = array_sum($key);
            $average = $sum/count($key);
            $eigen[] = $average;
        }
        return $eigen;
    }

    public static $ir = [
        0.00,
        0.00,
        0.58,
        0.90,
        1.12,
        1.24,
        1.32,
        1.41,
        1.45,
        1.49,
        1.51,
        1.48,
        1.56,
        1.57,
        1.59
    ];

    public static function getIR($matrix_size){
        return isset(self::$ir[$matrix_size-1]) ? self::$ir[$matrix_size-1] : null;
    }

    public function hitungLambdaMax(array $matrix, array $eigen)
{
    $s = count($matrix);
    $lambdaMax = [];

    for ($i = 0; $i < $s; $i++) {
        $sum = 0;
        for ($j = 0; $j < $s; $j++) {
            $sum += $matrix[$j][$i];
        }
        $lambdaMax[] = $sum * $eigen[$i];
    }
    return $lambdaMax;
}

    public function hitungConsistencyIndex(array $lambdaMax, int $matrixOrder)
{
    $totalLambdaMax = array_sum($lambdaMax);
    $consistencyIndex = ($totalLambdaMax - $matrixOrder) / ($matrixOrder - 1);

    return $consistencyIndex;
}

public function hitungConsistencyRatio(float $consistencyIndex, int $matrixOrder)
{
    $ir = $this->getIR($matrixOrder);
    $adjustedConsistencyIndex = $consistencyIndex / $ir;

    return $adjustedConsistencyIndex;
}

};