<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function create(Request $request)
    {
        $pemesanan = Pemesanan::create($request->all());

        return response()->json($pemesanan, 201);
    }
    

    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        return response()->json($pemesanan);
    }

    public function update(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($request->all());

        return response()->json($pemesanan, 200);
    }

    public function delete($id)
    {
        Pemesanan::findOrFail($id)->delete();

        return response()->json('Pemesanan deleted successfully', 200);
    }
}
