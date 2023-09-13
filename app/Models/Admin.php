<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $fillable = [
        'name',
        'dob',
        'area',
        'noSC',
        'noKTP',
        'agency',
        'namaAtasan',
        'noTelpAtasan',
        'nominalPermohonan',
        'pencairanTahap1',
        'pencairanTahap2',
        'totalDiterima',
        'filegambar',
        'created_at',
        'updated_at',
        // Add other attributes that need to be fillable here
    ];

    public function getPemohonData()
{
    $pemohonData = Admin::all(); // Mengambil semua data pemohon
    return $pemohonData;
}

protected $table = 'pemohon';
}
