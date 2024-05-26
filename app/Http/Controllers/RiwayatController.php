<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Riwayat';
        $time = explode(' ', now());
        $dari = $request->query('dari', $time[0]);
        $sampai = $request->query('sampai', $time[0]);
        $kategori = $request->query('kategori', 'stok_masuk');

        $data = Riwayat::where('tanggal', '>=', $dari)
            ->where('tanggal', '<=', $sampai)
            ->where($kategori, '!=', NULL)
            ->paginate(10);

        if ($data->total() == 0) {
            $info = 'Data tidak ada';
        } else {
            $info = '';
        }

        return view('content.riwayat', compact('title', 'dari', 'sampai', 'kategori', 'data', 'info'));
    }
}
