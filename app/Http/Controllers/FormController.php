<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\File;

class FormController extends Controller
{
    public function index(Request $request)
    {
        $position = $request->query('position', 'default_position');

        // Tetapkan pilihan nominal berdasarkan peran
        if ($position === 'direct sales') {
            $nominalOptions = [
                500000 => 'Rp.500,000',
                800000 => 'Rp.800,000',
                1000000 => 'Rp.1,000,000',
                1500000 => 'Rp.1,500,000'
            ];
        } elseif ($position === 'area supervisor') {
            $nominalOptions = [
                500000 => 'Rp.500,000',
                800000 => 'Rp.800,000',
                1000000 => 'Rp.1,000,000',
                1500000 => 'Rp.1,500,000',
                2000000 => 'Rp.2,000,000'
            ];
        } else {
            // Handle case when position is 'default_position' or any other unknown position
            // You can set a default position or perform any other action here
            // For example, you can redirect the user to the position selection page
            return view('role');
        }

        // Inisialisasi nilai default
        $selectedNominal = 0; // Inisialisasi nilai pilihan nominal

        // Fungsi untuk format angka dengan pemisah ribuan (contoh: 1,000,000)
        function formatNumber($number)
        {
            return number_format($number, 0, ',', '.');
        }

        // Cek apakah formulir telah dikirim
        if ($request->isMethod('post')) {
            // Ambil nilai pilihan nominal dari formulir
            $selectedNominal = (int)$request->input('nominalPermohonan');
            $biayaAdministrasi = 25000;

            // Hitung nilai-nilai berdasarkan pilihan nominal
            if ($selectedNominal === 500000) {
                $pencairanTahap1 = $selectedNominal - $biayaAdministrasi;
                $totalDiterima = $pencairanTahap1;
            } elseif ($selectedNominal === 800000) {
                $pencairanTahap1 = $selectedNominal - $biayaAdministrasi;
                $totalDiterima = $pencairanTahap1;
            } elseif ($selectedNominal === 1000000) {
                $pencairanTahap1 = ($selectedNominal - $biayaAdministrasi) / 2;
                $pencairanTahap2 = $pencairanTahap1;
                $totalDiterima = $pencairanTahap1 + $pencairanTahap2;
            } elseif ($selectedNominal === 1500000) {
                $pencairanTahap1 = ($selectedNominal - $biayaAdministrasi) / 2;
                $pencairanTahap2 = $pencairanTahap1;
                $totalDiterima = $pencairanTahap1 + $pencairanTahap2;
            } elseif ($selectedNominal === 2000000) {
                $pencairanTahap1 = ($selectedNominal - $biayaAdministrasi) / 2;
                $pencairanTahap2 = $pencairanTahap1;
                $totalDiterima = $pencairanTahap1 + $pencairanTahap2;
            }

        }

        return view('form', compact('nominalOptions', 'selectedNominal', 'position'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'tempat_lahir' => 'required|string',
            'dob' => 'required|string',
            'area' => 'required|string',
            'noSC' => 'required|string',
            'noKTP' => 'required|string',
            'agency' => 'required|string',
            'namaAtasan' => 'required|string',
            'tanggalPengajuan' => 'required|string',
            'noTelpAtasan' => 'required|string',
            'position' => 'required|string',
            'sales_active' => 'required|string',
            'sales_order' => 'required|string',
            'nominalPermohonan' => 'required|string',
            'pencairanTahap1' => 'required|string',
            'pencairanTahap2' => 'required|string',
            'totalDiterima' => 'required|string',
            'signature' => 'required'
        ]);

        // Mengambil substring dari 'signature' input
        $signature = $request->input('signature');
        $signatureSubstring = substr($signature, strpos($signature, ',') + 1);

        // Create a new Admin model instance and fill it with validated data
            $admin = new Admin();
            $admin->fill($validatedData);

            // Handle file upload if needed
            // if ($request->hasFile('file')) {
            //     $file = $request->file('file');
            //     // Handle file storage and save the file path to the model.
            //     // For example:
            //     $fileName = time() . '.' . $file->getClientOriginalExtension();
            //     $file->move(public_path('gambar'), $fileName);
            //     $img_encoded= base64_encode(file_get_contents(public_path('gambar/' . $fileName)));
            //     $admin->filegambar = $img_encoded;
            //     File::delete(public_path('gambar/' . $fileName));
            // }

            // // Handle file upload if needed
            // if ($request->hasFile('file')) {
            //     $file = $request->file('file');
            //     // Handle file storage and save the file path to the model.
            // }
            // Simpan substring 'signature' ke dalam model Admin
            $admin->signature = $signatureSubstring;

            // Save the data to the database
            $admin->save();
        // Redirect or return a response as needed
        return redirect()->route('form')->with('success', 'Data has been saved.');
    }
}
