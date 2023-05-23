<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all();
        return view('admin.galeri.index', compact('galeris'));
    }
    public function index_view()
    {
        $galeris = Galeri::all();
        return view('client.galeri.index', compact('galeris'));
    }

    public function create()
    {
        // Menampilkan form untuk menambahkan data galeri
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'foto_galeri' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string',
        ]);

        // Menyimpan gambar ke dalam folder public/galeri
        $imagePath = $request->file('foto_galeri')->store('galeri', 'public');

        // Simpan data galeri baru ke dalam database
        $galeri = new Galeri();
        $galeri->foto_galeri = $imagePath;
        $galeri->deskripsi = $request->deskripsi;
        $galeri->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil disimpan.');
    }

    public function destroy($id)
    {
        // Hapus data galeri dari database
        $galeri = Galeri::find($id);

        // Hapus gambar dari folder public/galeri
        if ($galeri->foto_galeri) {
            Storage::disk('public')->delete($galeri->foto_galeri);
        }

        $galeri->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil dihapus.');
    }
}
