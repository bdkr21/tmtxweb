<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr; // Import the Toastr facade
use App\Models\Admin;
use Illuminate\Http\Request;



use \ConvertApi\ConvertApi;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jumlahData = Admin::count(); // Menghitung jumlah data dalam tabel pemohon
        return view('admin.index',compact('jumlahData'));
    }

    public function dataPemohon(Request $request)
        {
            $nominalOptions = [
                500000 => 'Rp.500.000',
                800000 => 'Rp.800.000',
                1000000 => 'Rp.1.000.000',
                1500000 => 'Rp.1.500.000',
                2000000 => 'Rp.2.000.000',
            ];

            $selectedNominal = (int)$request->input('nominalPermohonan');
            $biayaAdministrasi = 25000;
            $pencairanTahap1 = 0;
            $pencairanTahap2 = 0;
            $totalDiterima = 0;

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

            return view('admin.dataPemohon', [
                'nominalOptions' => $nominalOptions,
                'selectedNominal' => $selectedNominal,
                'pencairanTahap1' => $pencairanTahap1,
                'pencairanTahap2' => $pencairanTahap2,
                'totalDiterima' => $totalDiterima,
            ]);
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * use Brian2694\Toastr\Facades\Toastr; // Import the Toastr facade
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        // Temukan data Admin berdasarkan ID

    }

    /**
     * Show the form for editing the specified resource.
     *
     * use Brian2694\Toastr\Facades\Toastr; // Import the Toastr facade
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illu
     * use Brian2694\Toastr\Facades\Toastr; // Import the Toastr facademinate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Temukan data Admin berdasarkan ID
        $admin = Admin::findOrFail($id);

        try {
            //code...
            $admin->update([
                'name' => $request->input('name'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'dob' => $request->input('dob'),
                'area' => $request->input('area'),
                'noSC' => $request->input('noSC'),
                'noKTP' => $request->input('noKTP'),
                'agency' => $request->input('agency'),
                'namaAtasan' => $request->input('namaAtasan'),
                'noTelpAtasan' => $request->input('noTelpAtasan'),
                'sales_active' => $request->input('sales_active'),
                'sales_order' => $request->input('sales_order'),
                'nominalPermohonan' => $request->input('nominalPermohonan'),
            ]);

            // Hitung ulang pencairan tahap 1, pencairan tahap 2, dan total diterima berdasarkan nominal yang baru
            $biayaAdministrasi = 25000;
            $selectedNominal = (int)$request->input('nominalPermohonan');

            if ($selectedNominal === 500000) {
                $pencairanTahap1 = $selectedNominal;
                $pencairanTahap2 = 0;
                $totalDiterima = $selectedNominal - $biayaAdministrasi;
            } elseif ($selectedNominal === 800000) {
                $pencairanTahap1 = $selectedNominal;
                $pencairanTahap2 = 0;
                $totalDiterima = $selectedNominal - $biayaAdministrasi;
            } elseif ($selectedNominal === 1500000) {
                $pencairanTahap1 = 800000;
                $pencairanTahap2 = 700000;
                $totalDiterima = $selectedNominal - $biayaAdministrasi * 2;
            } else { // Anda bisa menggunakan elseif untuk kasus lain jika diperlukan
                $pencairanTahap1 =  $selectedNominal / 2;
                $pencairanTahap2 =  $selectedNominal / 2;
                $totalDiterima = $selectedNominal - $biayaAdministrasi * 2;
            }

            $pencairanTahap1Formatted = 'Rp. ' . number_format($pencairanTahap1);
            $pencairanTahap2Formatted = 'Rp. ' . number_format($pencairanTahap2);
            $totalDiterimaFormatted = 'Rp. ' . number_format($totalDiterima);

            $admin->update([
                'pencairanTahap1' => $pencairanTahap1Formatted,
                'pencairanTahap2' => $pencairanTahap2Formatted,
                'totalDiterima' => $totalDiterimaFormatted,
            ]);
            // Show a success Toastr notification

            return response()->json([
                'status' => true,
                'message' => 'Data has been updated successfully'
            ]);

        } catch (\Throwable $th) {
            // Show an error Toastr notification

            return response()->json([
                'status' => false,
                'message' => 'Data update failed'
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * use Brian2694\Toastr\Facades\Toastr; // Import the Toastr facade
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id); // Find the admin data by ID

        if ($admin->delete()) {
            $message = 'data telah dihapus.';
            $status = true;
        } else {
            $message = 'Gagal menghapus.';
            $status = false;
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }

    public function getAdminData($id)
    {
        $admin = Admin::findOrFail($id);
        return response()->json($admin);
    }
    public function ngeprint(Request $request, $id){

        $data = Admin::find($id);
            $templatePath = public_path('basic_form.rtf'); // Ganti dengan path ke berkas RTF template

            if(file_exists($templatePath)) {
                $templateContent = file_get_contents($templatePath);
                // Daftar field dan tag yang sesuai dalam template RTF
                $fieldTags = [
                    'namaAtasan' => 'INPUT_NAMA_ATASAN',
                    'name' => 'INPUT_NAMA',
                    'dob' => 'INPUT_DOB',
                    'area' => 'INPUT_AREA',
                    'noSC' => 'INPUT_NOSC',
                    'noKTP' => 'INPUT_NOKTP',
                    'agency' => 'INPUT_AGENCY',
                    'noTelpAtasan' => 'INPUT_NO_TELP_ATASAN',
                    'nominalPermohonan' => 'INPUT_NOMINAL_PERMOHONAN',
                    'pencairanTahap1' => 'INPUT_TAHAP_1',
                    'pencairanTahap2' => 'INPUT_TAHAP_2',
                    'totalDiterima' => 'INPUT_TOTAL_DITERIMA',
                    '' => 'INPUT_PEFORMANCE'
                ];

                $formatFields = ['nominalPermohonan', 'pencairanTahap1', 'pencairanTahap2', 'totalDiterima'];
                foreach ($formatFields as $field) {
                    if (isset($data[$field])) {
                        $value = (float) $data[$field]; // Konversi ke float
                        $formattedValue = number_format($value, 0, ",", ".");
                        $data[$field] = $formattedValue;
                        $tag = 'INPUT_' . strtoupper($field);
                        if (strpos($templateContent, $tag) !== false) {
                            $templateContent = str_replace($tag, $formattedValue, $templateContent);
                        }
                    }
                }

                // Menghitung nilai INPUT_PEFORMANCE
                $salesInput = $data['sales_active'] + $data['sales_order'];
                $fieldTags[''] = 'INPUT_PEFORMANCE';
                $data['INPUT_PEFORMANCE'] = $salesInput;

                // Gantikan tag INPUT_PEFORMANCE yang kosong dengan nilai yang sudah dihitung
                $templateContent = str_replace('INPUT_PEFORMANCE', $data['INPUT_PEFORMANCE'], $templateContent);

                foreach ($fieldTags as $field => $tag) {
                    $value = isset($data[$field]) ? $data[$field] : '';
                    if (strpos($templateContent, $tag) !== false) {
                        $templateContent = str_replace($tag, $value, $templateContent);
                    }
                }


                $image = bin2hex(base64_decode($data->signature));
                // $image = file_get_contents();
                $templateContent = str_replace("89504e470d0a1a0a0000000d4948445200000096000000960802000000b363e6b5000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000005949444154785eedc13101000000c2a0f54f6d076f20000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000038d400085100019ab63a600000000049454e44ae426082", $image, $templateContent);

                $tag = 'DATE_FULL';
                $tagDay = 'DATE_DAY';

                $dayNamesIndonesia = array(
                    'Sunday' => 'Minggu',
                    'Monday' => 'Senin',
                    'Tuesday' => 'Selasa',
                    'Wednesday' => 'Rabu',
                    'Thursday' => 'Kamis',
                    'Friday' => 'Jumat',
                    'Saturday' => 'Sabtu'
                );

                $monthNamesIndonesia = array(
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember'
                );

                $date = date("Y-m-d"); // Menggunakan tanggal saat ini
                $formattedDate = date("l, d F Y", strtotime($date)); // Mendapatkan nama hari, tanggal, bulan, dan tahun dalam bahasa Inggris

                // Mengganti nama hari dalam bahasa Inggris dengan versi bahasa Indonesia
                if (array_key_exists(date("l", strtotime($date)), $dayNamesIndonesia)) {
                    $formattedDay = $dayNamesIndonesia[date("l", strtotime($date))];
                    $formattedDate = str_replace(date("l", strtotime($date)), $formattedDay, $formattedDate);
                }

                // Mengganti nama bulan dalam bahasa Inggris dengan versi bahasa Indonesia
                foreach ($monthNamesIndonesia as $englishMonth => $indonesianMonth) {
                    if (strpos($formattedDate, $englishMonth) !== false) {
                        $formattedDate = str_replace($englishMonth, $indonesianMonth, $formattedDate);
                    }
                }

                if (strpos($templateContent, $tag) !== false) {
                    $templateContent = str_replace($tag, $formattedDate, $templateContent);
                }

                $dateday = date("Y-m-13"); // Tanggal 13 pada bulan dan tahun saat ini
                $formattedDay = date("l, d F Y", strtotime($dateday)); // Mendapatkan nama hari dan tanggal

                // Mengganti nama hari dalam bahasa Inggris dengan versi bahasa Indonesia hanya untuk tanggal 13
                if (array_key_exists(date("l", strtotime($dateday)), $dayNamesIndonesia)) {
                    $formattedDayIndonesia = str_replace(
                        date("l", strtotime($dateday)),
                        $dayNamesIndonesia[date("l", strtotime($dateday))],
                        $formattedDay
                    );

                    // Mengganti nama bulan dalam bahasa Inggris dengan versi bahasa Indonesia hanya untuk tanggal 13
                    foreach ($monthNamesIndonesia as $englishMonth => $indonesianMonth) {
                        if (strpos($formattedDayIndonesia, $englishMonth) !== false) {
                            $formattedDayIndonesia = str_replace($englishMonth, $indonesianMonth, $formattedDayIndonesia);
                        }
                    }
                }

                if (strpos($templateContent, $tagDay) !== false) {
                    $templateContent = str_replace($tagDay, $formattedDayIndonesia, $templateContent);
                }
                // Simpan hasil ke file sementara
                $tempFilePath = public_path('outputbaru2.rtf');
                file_put_contents($tempFilePath, $templateContent);

                // ConvertApi::setApiSecret('bzF3tCL9x6IR0FFl');
                // $result = ConvertApi::convert('pdf', [
                //         'File' => $tempFilePath,
                //     ], 'rtf'
                // );
                // // Save the PDF file
                // $pdfFilePath = public_path(date('Ymd_his') . '.pdf');
                // $result->saveFiles($pdfFilePath);

                // // Download the PDF file as a response
                // return response()->download($pdfFilePath)->deleteFileAfterSend();
    }
 }
}

