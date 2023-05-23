<?php

namespace App\Http\Controllers;

use App\Models\travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        $travels = Travel::all();
        return view('admin.travel.index', compact('travels'));
    }
    public function index_view()
    {
        $travels = Travel::all();
        return view('client.travel.index', compact('travels'));
    }

    public function create()
    {
        // Menampilkan form untuk menambahkan data travel
        return view('admin.travel.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'bulan' => 'required|date',
            'id_kategori' => 'required|integer',
            'jumlah' => 'required|integer',
        ]);

        // Simpan data travel baru ke dalam database
        $travel = new Travel();
        $travel->bulan = $request->bulan;
        $travel->id_kategori = $request->id_kategori;
        $travel->jumlah = $request->jumlah;
        $travel->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.travel.index')->with('success', 'Data travel berhasil disimpan.');
    }

    public function edit($id)
    {
        $travel = Travel::find($id);
        return view('admin.travel.edit', compact('travel'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'bulan' => 'required|date',
            'id_kategori' => 'required|integer',
            'jumlah' => 'required|integer',
        ]);

        // Update data travel yang ada dalam database
        $travel = Travel::find($id);
        $travel->bulan = $request->bulan;
        $travel->id_kategori = $request->id_kategori;
        $travel->jumlah = $request->jumlah;
        $travel->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.travel.index')->with('success', 'Data travel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data travel dari database
        $travel = Travel::find($id);
        $travel->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.travel.index')->with('success', 'Data travel berhasil dihapus.');
    }
}
