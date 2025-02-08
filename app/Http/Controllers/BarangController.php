<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('dashboard.barang.viewdatabarang', [
            'barang' => $barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.barang.tambahdatabarang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required'
        ]);

        Barang::create($validateData);

        return redirect('/admin/barang')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('dashboard.barang.ubahdatabarang', [
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $validateData = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required'
        ]);

        $barang->update($validateData);

        return redirect('/admin/barang')->with('success', 'Barang berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect('/admin/barang')->with('success', 'Barang berhasil dihapus!');
    }
}
