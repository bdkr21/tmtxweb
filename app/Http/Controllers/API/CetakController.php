<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
class CetakController extends Controller
{
    public function cetakData($id)
    {
        // Ambil data yang sesuai dengan $id dari database
        $data = Admin::findOrFail($id);

        $decodedSignature = base64_decode($data->signature);

        // Tampilkan gambar pada view dengan menggunakan data URL
        $dataUrl = 'data:image/png;base64,' . base64_encode($decodedSignature);
        $salesInput = $data['sales_active'] + $data['sales_order'];

        $formatNompel = 'Rp. ' . number_format(floatval($data->nominalPermohonan), 0, ',', '.');
        $pencairanTahap1Formatted = 'Rp. ' . number_format(floatval($data->pencairanTahap1), 0, ',', '.');
        $pencairanTahap2Formatted = 'Rp. ' . number_format(floatval($data->pencairanTahap2), 0, ',', '.');
        $totalDiterimaFormatted = 'Rp. ' . number_format(floatval($data->totalDiterima), 0, ',', '.');


        // dd($pencairanTahap1Formatted);

        // $pdf = PDF::loadView('cetak.data',
        // ['data' => $data,
        //  'dataUrl' => $dataUrl,
        //   'salesInput' => $salesInput,
        //   'formatNompel' => $formatNompel,
        //   'pencairanTahap1Formatted' => $pencairanTahap1Formatted,
        //   'pencairanTahap2Formatted' => $pencairanTahap2Formatted,
        //   'totalDiterimaFormatted' => $totalDiterimaFormatted,
        // ]);

        $view = view('cetak.data',
        ['data' => $data,
         'dataUrl' => $dataUrl,
          'salesInput' => $salesInput,
          'formatNompel' => $formatNompel

        ]);
        $html = $view->render();
        $html = preg_replace('/>\s+</', "><", $html);

        $pdf = PDF::loadHTML($html);

        return $pdf->download('document.pdf');
        // return view('cetak.data', ['data' => $data, 'dataUrl' => $dataUrl]);
    }
}
