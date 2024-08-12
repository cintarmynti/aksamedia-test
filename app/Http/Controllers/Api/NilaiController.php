<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function nilaiRT() {
        $sql = "
            SELECT
                nama,
                nisn,
                SUM(CASE WHEN nama_pelajaran = 'ARTISTIC' THEN skor ELSE 0 END) AS artistic,
                SUM(CASE WHEN nama_pelajaran = 'CONVENTIONAL' THEN skor ELSE 0 END) AS conventional,
                SUM(CASE WHEN nama_pelajaran = 'ENTERPRISING' THEN skor ELSE 0 END) AS enterprising,
                SUM(CASE WHEN nama_pelajaran = 'INVESTIGATIVE' THEN skor ELSE 0 END) AS investigative,
                SUM(CASE WHEN nama_pelajaran = 'SOCIAL' THEN skor ELSE 0 END) AS social
            FROM
                nilai
            GROUP BY
                nama, nisn
            ORDER BY
                nama
        ";

        $data = DB::select(DB::raw($sql));

        $output = array_map(function($item) {
            return [
                'nama' => $item->nama,
                'nilai RT' => [
                    'artistic' => (int) $item->artistic,
                    'conventional' => (int) $item->conventional,
                    'enterprising' => (int) $item->enterprising,
                    'investigative' => (int) $item->investigative,
                    'social' => (int) $item->social,
                ],
                'nisn' => $item->nisn,
            ];
        }, $data);

        return response()->json($output, 200);
    }


    public function nilaiST()
    {
        // Ambil dan kelompokkan data dari tabel `nilai` dengan aturan perkalian
        $sql = "
        SELECT
            nama,
            nisn,
            SUM(CASE WHEN pelajaran_id = 44 THEN FLOOR(skor * 41.67) ELSE 0 END) AS verbal,
            SUM(CASE WHEN pelajaran_id = 45 THEN FLOOR(skor * 29.67) ELSE 0 END) AS kuantitatif,
            SUM(CASE WHEN pelajaran_id = 46 THEN FLOOR(skor * 100) ELSE 0 END) AS penalaran,
            SUM(CASE WHEN pelajaran_id = 47 THEN FLOOR(skor * 23.81) ELSE 0 END) AS figural,
            (
                SUM(CASE WHEN pelajaran_id = 44 THEN FLOOR(skor * 41.67) ELSE 0 END) +
                SUM(CASE WHEN pelajaran_id = 45 THEN FLOOR(skor * 29.67) ELSE 0 END) +
                SUM(CASE WHEN pelajaran_id = 46 THEN FLOOR(skor * 100) ELSE 0 END) +
                SUM(CASE WHEN pelajaran_id = 47 THEN FLOOR(skor * 23.81) ELSE 0 END)
            ) AS total
        FROM
            nilai
        GROUP BY
            nama, nisn
        ORDER BY
            total DESC
    ";

        $data = DB::select(DB::raw($sql));

        $output = array_map(function ($item) {
            return [
                'listNilai' => [
                    'verbal' => (int) $item->verbal,
                    'kuantitatif' => (int) $item->kuantitatif,
                    'penalaran' => (int) $item->penalaran,
                    'figural' => (int) $item->figural,
                ],
                'nama' => $item->nama,
                'nisn' => $item->nisn,
                'total' => (int) $item->total
            ];
        }, $data);

        usort($output, function ($a, $b) {
            return $b['total'] - $a['total'];
        });

        return response()->json($output, 200);
    }
}
