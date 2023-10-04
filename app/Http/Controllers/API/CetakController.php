<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use PDF;
class CetakController extends Controller
{
    public function cetakData($id)
    {
        // Ambil data yang sesuai dengan $id dari database
        $data = Admin::findOrFail($id);

        $pdf = PDF::loadView('cetak.data', ['data' => $data]);

        return $pdf->stream('document.pdf');
    }
}
