@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Judul Halaman --}}
    <div class="text-center mb-4">
        <h2 class="fw-bold">TOKO DURO</h2>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h1>Daftar Barang</h1>

    <div class="mb-3">
        <a href="{{ route('barang.create') }}" class="btn btn-danger">Tambah Barang</a>
        <a href="{{ route('pemesanan.create') }}" class="btn btn-danger ms-2">Beli</a>
        <a href="{{ route('pemesanan.index') }}" class="btn btn-danger ms-2">Riwayat</a>
    </div>

    <table class="table table-striped table-bordered table-success">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Diskon (%)</th>
                <th>Harga Setelah Diskon</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($barangs as $barang)
            <tr>
                <td>{{ $barang->nama }}</td>
                <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                <td>{{ $barang->diskon ?? 0 }}%</td>
                <td>
                    @php
                        $hargaDiskon = $barang->harga - ($barang->harga * ($barang->diskon ?? 0) / 100);
                    @endphp
                    Rp {{ number_format($hargaDiskon, 0, ',', '.') }}
                </td>
                <td>{{ $barang->stok }}</td>
                <td>
                    <a href="{{ route('barang.edit', $barang) }}" class="btn btn-danger btn-sm">Edit</a>
                    <form action="{{ route('barang.destroy', $barang) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus {{ addslashes($barang->nama) }}?')"
                                class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data barang</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
