<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with('details.barang')->latest()->get();
        return view('pemesanan.index', compact('pemesanans'));
    }

    public function create()
    {
        $barangs = Barang::where('stok', '>', 0)->get();
        return view('pemesanan.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe.*'    => 'required|in:barang',
            'item_id.*' => 'required|exists:barangs,id',
            'qty.*'     => 'required|integer|min:1',
        ]);

        $itemIds    = $request->input('item_id', []);
        $quantities = $request->input('qty', []);

        $barangs = Barang::whereIn('id', $itemIds)->get()->keyBy('id');

        foreach ($itemIds as $i => $id) {
            $barang = $barangs[$id];
            $qty    = $quantities[$i] ?? 0;

            if ($qty > $barang->stok) {
                return back()->withInput()->with('error', "Stok '{$barang->nama}' hanya tersedia {$barang->stok}.");
            }
        }

        DB::transaction(function () use ($itemIds, $quantities, $barangs) {
            $total = 0;

            $pemesanan = Pemesanan::create([
                'tanggal' => now(),
                'total'   => 0, 
            ]);

            foreach ($itemIds as $i => $id) {
                $barang = $barangs[$id];
                $qty    = $quantities[$i];

                $harga  = $barang->harga - ($barang->harga * $barang->diskon / 100);
                $subtotal = $harga * $qty;

                PemesananDetail::create([
                    'pemesanan_id' => $pemesanan->id,
                    'barang_id'    => $id,
                    'qty'          => $qty,
                    'harga'        => $harga,
                    'subtotal'     => $subtotal,
                ]);

                // Kurangi stok
                $barang->decrement('stok', $qty);

                $total += $subtotal;
            }

            $pemesanan->update(['total' => $total]);
        });

        return redirect()->route('pemesanan.index')
                         ->with('success', 'Pemesanan berhasil disimpan.');
    }

    public function show(Pemesanan $pemesanan)
    {
        $pemesanan->load('details.barang');
        return view('pemesanan.show', compact('pemesanan'));
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::with('details.barang')->findOrFail($id);

        DB::transaction(function () use ($pemesanan) {
            // Kembalikan stok
            foreach ($pemesanan->details as $detail) {
                $detail->barang->increment('stok', $detail->qty);
            }

            $pemesanan->details()->delete();
            $pemesanan->delete();
        });

        return redirect()->route('pemesanan.index')
                         ->with('success', 'Pemesanan berhasil dihapus.');
    }
}
