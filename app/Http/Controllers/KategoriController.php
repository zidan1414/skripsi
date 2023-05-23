<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }
    public function index_view()
    {
        $kategoris = Kategori::all();
        return view('client.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        // Menampilkan form untuk menambahkan data kategori
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        // Simpan data kategori baru ke dalam database
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.kategori.index')->with('success', 'Data kategori berhasil disimpan.');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'nama_kategori' => 'required|string',
        ]);

        // Update data kategori yang ada dalam database
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.kategori.index')->with('success', 'Data kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data kategori dari database
        $kategori = Kategori::find($id);
        $kategori->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.kategori.index')->with('success', 'Data kategori berhasil dihapus.');
    }
}
