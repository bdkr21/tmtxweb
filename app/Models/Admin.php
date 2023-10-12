<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'name',
        'tempat_lahir',
        'dob',
        'area',
        'noSC',
        'noKTP',
        'agency',
        'namaAtasan',
        'tanggalPengajuan',
        'noTelpAtasan',
        'nominalPermohonan',
        'position',
        'sales_active',
        'sales_order',
        'pencairanTahap1',
        'pencairanTahap2',
        'totalDiterima',
        'signature',
        'created_at',
        'updated_at',
        // Add other attributes that need to be fillable here
    ];

    protected $table = 'pemohon';

    public static function editPemohonData($id, $data)
    {
        $pemohon = Admin::find($id);
        if (!$pemohon) {
            return false; // Pemohon dengan ID yang diberikan tidak ditemukan
        }

        // Update data pemohon
        $pemohon->update($data);

        return true; // Data berhasil diupdate
    }
}
