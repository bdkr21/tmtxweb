<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DataTables;

class PemohonController extends Controller
{
    //
    public function index() {

        $data = DB::table('pemohon')->get();
        $data = $this->addSequentialNumber($data); // Mengambil semua data dari tabel pemohon

                return DataTables::of($data)
                    ->addColumn('action', function ($row) {
                        $action = '<a href="#" class="btn btn-info open-detail-modal btn-sm" data-item="'. $row->id .'">Detail</a>';
                        $action .= ' <a href="#" class="btn btn-primary open-edit-modal btn-sm" data-item="'. $row->id .'" >Edit</a>';
                        $action .= ' <form action="'. route("admin.destroy", $row->id) .'" method="POST" style="display: inline-block;">
                                        <input type="hidden" name="_token" value='.csrf_token().'>
                                      <button type="submit" class="btn btn-danger delete-btn btn-sm" data-admin-id="'.$row->id.'">
                                          Delete
                                      </button>
                                    </form>';
                        $action .= ' <a href="'.route("admin.ngeprint", ["id" => $row->id]).'" class="btn btn-secondary btn-sm">Print</a>';
                        return $action;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

    }

    private function addSequentialNumber(Collection $data)
    {
        $number = 1;
        return $data->map(function ($item) use (&$number) {
            $item->no = $number++;
            return $item;
        });
    }

    public function deleteByMonth(Request $request)
    {
        try {
            $month = $request->input('delete_month');

            // Lakukan validasi bulan di sini jika diperlukan

            // Hapus data berdasarkan bulan yang dipilih
            DB::table('pemohon')->whereRaw("MONTH(STR_TO_DATE(tanggalPengajuan, '%d-%M-%Y')) = ?", [$month])->delete();

            return response()->json(['message' => 'Data berhasil dihapus.']);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan.'], 500);
        }
    }

}
