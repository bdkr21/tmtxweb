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

        $formatNompel ='Rp. ' .number_format($data->nominalPermohonan, 0, ',', '.'); // Format angka dengan 2 desimal, tanda koma sebagai pemisah ribuan, dan titik sebagai pemisah desimal
        $pencairanTahap1Formatted ='Rp. ' .number_format($data->pencairanTahap1, 0, ',', '.'); // Format angka dengan 2 desimal, tanda koma sebagai pemisah ribuan, dan titik sebagai pemisah desimal
        $pencairanTahap2Formatted ='Rp. ' .number_format($data->pencairanTahap2, 0, ',', '.'); // Format angka dengan 2 desimal, tanda koma sebagai pemisah ribuan, dan titik sebagai pemisah desimal
        $totalDiterimaFormatted ='Rp. ' .number_format($data->totalDiterima, 0, ',', '.'); // Format angka dengan 2 desimal, tanda koma sebagai pemisah ribuan, dan titik sebagai pemisah desimal

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
          'formatNompel' => $formatNompel,
          'pencairanTahap1Formatted' => $pencairanTahap1Formatted,
          'pencairanTahap2Formatted' => $pencairanTahap2Formatted,
          'totalDiterimaFormatted' => $totalDiterimaFormatted,
        ]);
        $html = $view->render();
        $html = preg_replace('/>\s+</', "><", $html);
        $pdf = PDF::loadHTML($html);

        return $pdf->download('document.pdf');
        // return view('cetak.data', ['data' => $data, 'dataUrl' => $dataUrl]);
    }
}
