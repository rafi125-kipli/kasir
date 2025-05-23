<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string',
            'harga'  => 'required|numeric',
            'stok'   => 'required|integer|min:0',
            'diskon' => 'nullable|integer|min:0|max:100',
        ]);

        Barang::create($request->only('nama','harga','stok','diskon'));

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'   => 'required|string',
            'harga'  => 'required|numeric',
            'stok'   => 'required|integer|min:0',
            'diskon' => 'nullable|integer|min:0|max:100',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->only('nama','harga','stok','diskon'));

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
