<?php

namespace App\Http\Controllers;

use App\Models\hargapaket;
use Illuminate\Http\Request;

class HargapaketController extends Controller
{
    public function index()
    {
        $hargapakets = HargaPaket::all();
        return view('admin.hargapaket.index', compact('hargapakets'));
    }
    public function index_view()
    {
        $hargapakets = HargaPaket::all();
        return view('client.hargapaket.index', compact('hargapakets'));
    }

    public function create()
    {
        // Menampilkan form untuk menambahkan data harga paket
        return view('admin.hargapaket.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'id_paket' => 'required|integer',
            'kategori_grup' => 'required|string',
            'harga_tanpa_hotel' => 'required|integer',
            'harga_hotel_1' => 'required|integer',
            'harga_hotel_2' => 'required|integer',
            'harga_hotel_3' => 'required|integer',
            'harga_hotel_4' => 'required|integer',
            'harga_hotel_5' => 'required|integer',
        ]);

        // Simpan data harga paket baru ke dalam database
        $hargapaket = new HargaPaket();
        $hargapaket->id_paket = $request->id_paket;
        $hargapaket->kategori_grup = $request->kategori_grup;
        $hargapaket->harga_tanpa_hotel = $request->harga_tanpa_hotel;
        $hargapaket->harga_hotel_1 = $request->harga_hotel_1;
        $hargapaket->harga_hotel_2 = $request->harga_hotel_2;
        $hargapaket->harga_hotel_3 = $request->harga_hotel_3;
        $hargapaket->harga_hotel_4 = $request->harga_hotel_4;
        $hargapaket->harga_hotel_5 = $request->harga_hotel_5;
        $hargapaket->status = 'belum diproses';
        $hargapaket->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.hargapaket.index')->with('success', 'Data harga paket berhasil disimpan.');
    }

    public function edit($id)
    {
        $hargapaket = HargaPaket::find($id);
        return view('admin.hargapaket.edit', compact('hargapaket'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'status' => 'required|string',
        ]);

        // Update status harga paket
        $hargapaket = HargaPaket::find($id);
        $hargapaket->status = $request->status;
        $hargapaket->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.hargapaket.index')->with('success', 'Status harga paket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data harga paket dari database
        $hargapaket = HargaPaket::find($id);
        $hargapaket->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.hargapaket.index')->with('success', 'Data harga paket berhasil dihapus.');
    }
}
