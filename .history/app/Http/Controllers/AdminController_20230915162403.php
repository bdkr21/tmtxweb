<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nominalOptions = [
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

        $data = Admin::all(); // Mengambil semua data dari tabel pemohon

        return view('admin.index', [
            'data' => $data,
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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'dob' => 'required|string',
            'area' => 'required|string',
            'noSC' => 'required|string',
            'noKTP' => 'required|string',
            'agency' => 'required|string',
            'namaAtasan' => 'required|string',
            'noTelpAtasan' => 'required|string',
            'nominalPermohonan' => 'required|string',
            'pencairanTahap1' => 'required|string',
            'pencairanTahap2' => 'required|string',
            'totalDiterima' => 'required|string',
            'nominalPermohonan' => 'required', // Add validation rules for other fields
            'file' => 'required|image|mimes:png,jpg,jpeg|max:1044070',
        ]);

        // Create a new Admin model instance and fill it with validated data
            $admin = new Admin();
            $admin->fill($validatedData);

            // Handle file upload if needed
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                // Handle file storage and save the file path to the model.
                // For example:
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $filePath = $fileName;
                $file->move(public_path('gambar'), $fileName);
                $admin->filegambar = $filePath;
            }

                // Save the data to the database
                $admin->save();

        // Handle file upload if needed
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // Handle file storage and save the file path to the model.
        }

        

        // Redirect or return a response as needed
        return redirect()->route('form')->with('success', 'Data has been saved.');
    }

    /**
     * Display the specified resource.
     *
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
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'area' => 'required',
            'noSC' => 'required',
            'noKTP' => 'required',
            'agency' => 'required',
            'namaAtasan' => 'required',
            'noTelpAtasan' => 'required',
            'nominalPermohonan' => 'required|in:800000,1000000,1500000,2000000',
        ]);
    
        // Temukan data Admin berdasarkan ID
        $admin = Admin::findOrFail($id);
    
        // Update data dengan nilai yang baru
        $admin->update([
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'area' => $request->input('area'),
            'noSC' => $request->input('noSC'),
            'noKTP' => $request->input('noKTP'),
            'agency' => $request->input('agency'),
            'namaAtasan' => $request->input('namaAtasan'),
            'noTelpAtasan' => $request->input('noTelpAtasan'),
            'nominalPermohonan' => $request->input('nominalPermohonan'),
        ]);
    
        // Hitung ulang pencairan tahap 1, pencairan tahap 2, dan total diterima berdasarkan nominal yang baru
        $biayaAdministrasi = 25000;
        $selectedNominal = (int)$request->input('nominalPermohonan');
    
        if ($selectedNominal === 800000) {
            $pencairanTahap1 = $selectedNominal - $biayaAdministrasi;
            $pencairanTahap2 = 0;
            $totalDiterima = $pencairanTahap1;
        } else { // Anda bisa menggunakan elseif untuk kasus lain jika diperlukan
            $pencairanTahap1 = ($selectedNominal - $biayaAdministrasi) / 2;
            $pencairanTahap2 = $pencairanTahap1;
            $totalDiterima = $pencairanTahap1 + $pencairanTahap2;
        }
    
        $admin->update([
            'pencairanTahap1' => $pencairanTahap1,
            'pencairanTahap2' => $pencairanTahap2,
            'totalDiterima' => $totalDiterima,
        ]);
    
        // Redirect atau berikan respon sesuai kebutuhan aplikasi Anda
        return redirect()->route('admin.index')->with('success', 'Data updated successfully');
    }    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $admin = Admin::findOrFail($id); // Mencari data admin berdasarkan ID

    $admin->delete(); // Menghapus data dari database

    return redirect()->route('admin.index') // Mengarahkan kembali ke halaman indeks
        ->with('success', 'Admin telah dihapus.'); // Pesan sukses yang akan ditampilkan kepada pengguna
}

    }

