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
    public function index()
    {
        $data = Admin::all(); // Mengambil semua data dari tabel pemohon
        return view('admin.index', ['data' => $data]);

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
        //
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
    public function update(Request $request, admin $admin)
    {
        //
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

