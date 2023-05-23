<?php

namespace App\Http\Controllers;

use App\Models\faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
        return view('admin.faq.index', compact('faqs'));
    }
    public function index_view()
    {
        $faqs = FAQ::all();
        return view('client.faq.index', compact('faqs'));
    }

    public function create()
    {
        // Menampilkan form untuk menambahkan data FAQ
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
        ]);

        // Simpan data FAQ baru ke dalam database
        $faq = new FAQ();
        $faq->pertanyaan = $request->pertanyaan;
        $faq->jawaban = $request->jawaban;
        $faq->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.faq.index')->with('success', 'Data FAQ berhasil disimpan.');
    }

    public function edit($id)
    {
        $faq = FAQ::find($id);
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
        ]);

        // Update data FAQ
        $faq = FAQ::find($id);
        $faq->pertanyaan = $request->pertanyaan;
        $faq->jawaban = $request->jawaban;
        $faq->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.faq.index')->with('success', 'Data FAQ berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data FAQ dari database
        $faq = FAQ::find($id);
        $faq->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.faq.index')->with('success', 'Data FAQ berhasil dihapus.');
    }
}
