<?php

namespace App\Http\Controllers;

use App\Models\profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
   
    public function index()
    {
        $profils = Profil::all();
        return view('admin.profil.index', compact('profils'));
    }
    public function index_view()
    {
        $profils = Profil::all();
        return view('client.profil.index', compact('profils'));
    }

    public function create()
    {
        // Menampilkan form untuk menambahkan data profil
        return view('admin.profil.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_perusahaan' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'kodepos' => 'required|string',
            'alamat' => 'required|string',
            'akun_ig' => 'required|string',
            'akun_tiktok' => 'required|string',
            'logo' => 'required|string',
        ]);

        // Simpan data profil baru ke dalam database
        $profil = new Profil();
        $profil->nama_perusahaan = $request->nama_perusahaan;
        $profil->visi = $request->visi;
        $profil->misi = $request->misi;
        $profil->kodepos = $request->kodepos;
        $profil->alamat = $request->alamat;
        $profil->akun_ig = $request->akun_ig;
        $profil->akun_tiktok = $request->akun_tiktok;
        $profil->logo = $request->logo;
        $profil->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.profil.index')->with('success', 'Data profil berhasil disimpan.');
    }

    public function edit($id)
    {
        $profil = Profil::find($id);
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'nama_perusahaan' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'kodepos' => 'required|string',
            'alamat' => 'required|string',
            'akun_ig' => 'required|string',
            'akun_tiktok' => 'required|string',
            'logo' => 'required|string',
        ]);

        // Update data profil yang ada dalam database
        $profil = Profil::find($id);
        $profil->nama_perusahaan = $request->nama_perusahaan;
        $profil->visi = $request->visi;
        $profil->misi = $request->misi;
        $profil->kodepos = $request->kodepos;
        $profil->alamat = $request->alamat;
        $profil->akun_ig = $request->akun_ig;
        $profil->akun_tiktok = $request->akun_tiktok;
        $profil->logo = $request->logo;
        $profil->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.profil.index')->with('success', 'Data profil berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data profil dari database
        $profil = Profil::find($id);
        $profil->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.profil.index')->with('success', 'Data profil berhasil dihapus.');
    }
}
