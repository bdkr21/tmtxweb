<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->query('role', 'default_role');

        // Tetapkan pilihan nominal berdasarkan peran
        if ($role === 'direct_sales') {
            $nominalOptions = [
                800000 => 'Rp.800.000',
                1000000 => 'Rp.1.000.000',
                1500000 => 'Rp.1.500.000'
            ];
        } elseif ($role === 'area_supervisor') {
            $nominalOptions = [
                800000 => 'Rp.800.000',
                1000000 => 'Rp.1.000.000',
                1500000 => 'Rp.1.500.000',
                2000000 => 'Rp.2.000.000'
            ];
        } else {
            // Handle case when role is 'default_role' or any other unknown role
            // You can set a default role or perform any other action here
            // For example, you can redirect the user to the role selection page
            return view('role');
        }

        // Inisialisasi nilai default
        $pencairanTahap1Formatted = "Rp 0";
        $pencairanTahap2Formatted = "Rp 0";
        $totalDiterimaFormatted = "Rp  0";
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
            if ($selectedNominal === 800000) {
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

            // Format nilai-nilai setelah perhitungan
            $pencairanTahap1Formatted = formatNumber($pencairanTahap1) . 'Rp 0';
            $pencairanTahap2Formatted = formatNumber($pencairanTahap2) . 'Rp 0';
            $totalDiterimaFormatted = formatNumber($totalDiterima) . 'Rp 0';
        }

        return view('form', compact('nominalOptions', 'selectedNominal', 'role', 'pencairanTahap1Formatted', 'pencairanTahap2Formatted', 'totalDiterimaFormatted'));
    }
}
