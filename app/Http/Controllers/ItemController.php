<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function dashboard()
    {
        $time = explode(' ', now());
        $title = 'Dashboard';
        $item = count(Item::all());
        $stok_masuk = Riwayat::where('tanggal', $time[0])->where('stok_masuk', '!=', NULL)->get('stok_masuk');
        $stok_keluar = Riwayat::where('tanggal', $time[0])->where('stok_keluar', '!=', NULL)->get('stok_keluar');
        return view('content.dashboard', compact('title', 'item', 'stok_masuk', 'stok_keluar'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if ($search == null) {
            $data = Item::paginate(10);
        } else {
            $data = Item::where('kode_item', 'LIKE', $search)
                ->orWhere('nama_item', 'LIKE', '%' . $search . '%')
                ->orWhere('status', 'LIKE', $search)->paginate(10);
        }

        $title = 'Data barang';

        if ($data->total() == 0) {
            $info = 'Data tidak ada';
        } else {
            $info = '';
        }

        // generate kode barang
        $last = Item::orderBy('created_at', 'DESC')->get('kode_item')->first();

        if ($last == null) {
            $kode_item = 'BRG-0001';
        } else {
            $ex = explode('-', $last->kode_item);
            $no = $ex[1] + 1;
            if (strlen($no) == 1) {
                $kode_item = 'BRG-000' . $no;
            } else if (strlen($no) == 2) {
                $kode_item = 'BRG-00' . $no;
            } else if (strlen($no) == 3) {
                $kode_item = 'BRG-0' . $no;
            } else {
                $kode_item = 'BRG-' . $no;
            }
        }


        return view('content.data-barang', compact('search', 'title', 'data', 'kode_item', 'info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'nama_item' => 'required',
            'stok_item' => 'required|numeric',
        ]);

        $item = new Item();
        $item->kode_item = $request->input('kode_item');
        $item->nama_item = $request->nama_item;
        $item->stok = $request->stok_item;
        $item->status = 'ready';
        $item->save();

        $time = explode(' ', now());
        $riwayat = new Riwayat();
        $riwayat->item_id = $item->id;
        $riwayat->stok_masuk = $request->stok_item;
        $riwayat->tanggal = $time[0];
        $riwayat->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_item' => 'required'
        ]);

        Item::findOrFail($id)->update([
            'nama_item' => $request->nama_item
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function stok(Request $request, $id, $kategori)
    {
        $request->validate([
            'stok_masuk' => 'nullable|numeric',
            'stok_keluar' => 'nullable|numeric',
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'stok' => $kategori == 'masuk' ? $item->stok + $request->stok_masuk : $item->stok - $request->stok_keluar
        ]);

        $time = explode(' ', now());

        if ($kategori == 'masuk') {
            $riwayat = new Riwayat();
            $riwayat->item_id = $item->id;
            $riwayat->stok_masuk = $request->stok_masuk;
            $riwayat->tanggal = $time[0];
            $riwayat->save();
        } else {
            $time = explode(' ', now());
            $riwayat = new Riwayat();
            $riwayat->item_id = $item->id;
            $riwayat->stok_keluar = $request->stok_keluar;
            $riwayat->tanggal = $time[0];
            $riwayat->save();
        }

        return redirect()->back()->with('success', 'Data stok berhasil diubah');
    }

    public function use(Request $request, $id)
    {
        $request->validate([
            'jumlah_pakai' => 'required|numeric'
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'stok' => $item->stok - $request->jumlah_pakai
        ]);

        $time = explode(' ', now());
        $riwayat = new Riwayat();
        $riwayat->item_id = $item->id;
        $riwayat->stok_keluar = $request->jumlah_pakai;
        $riwayat->tanggal = $time[0];
        $riwayat->save();

        return redirect()->back()->with('success', 'Item berhasil digunakan');
    }

    public function status($id, $status)
    {
        Item::findOrFail($id)->update([
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Status data berhasil diubah');
    }
}
