<?php

namespace App\Http\Controllers;

use App\Models\paketwisata;
use Illuminate\Http\Request;

class PaketwisataController extends Controller
{
    public function index()
    {
        $paketWisatas = PaketWisata::all();
        return view('admin.paketwisata.index', compact('paketWisatas'));
    }
    public function index_view()
    {
        $paketWisatas = PaketWisata::all();
        return view('client.paketwisata.index', compact('paketWisatas'));
    }

    public function create()
    {
        // Menampilkan form untuk menambahkan data paket wisata
        return view('admin.paketwisata.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_paket' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        // Simpan data paket wisata baru ke dalam database
        $paketWisata = new PaketWisata();
        $paketWisata->nama_paket = $request->nama_paket;
        $paketWisata->deskripsi = $request->deskripsi;
        $paketWisata->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.paketwisata.index')->with('success', 'Data paket wisata berhasil disimpan.');
    }

    public function destroy($id)
    {
        // Hapus data paket wisata dari database
        $paketWisata = PaketWisata::find($id);
        $paketWisata->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.paketwisata.index')->with('success', 'Data paket wisata berhasil dihapus.');
    }
}
