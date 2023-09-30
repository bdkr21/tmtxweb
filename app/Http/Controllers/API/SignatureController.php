<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function simpanTandaTangan(Request $request)
    {
        $signatureData = $request->input('signature');

        // Validasi jika diperlukan

        // Simpan tanda tangan ke database atau penyimpanan lainnya
        // Misalnya, jika Anda ingin menyimpan ke dalam database:
        // Signature::create(['data' => $signatureData]);

        return response()->json(['message' => 'Tanda tangan berhasil disimpan']);
    }
}
