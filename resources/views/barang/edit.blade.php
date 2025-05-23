@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <h2>Edit Barang</h2>

    <form action="{{ route('barang.update', $barang) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" id="nama" name="nama"
                   class="form-control @error('nama') is-invalid @enderror"
                   value="{{ old('nama', $barang->nama) }}" required>
            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" id="harga" name="harga"
                   class="form-control @error('harga') is-invalid @enderror"
                   value="{{ old('harga', $barang->harga) }}" required>
            @error('harga')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" id="stok" name="stok"
                   class="form-control @error('stok') is-invalid @enderror"
                   value="{{ old('stok', $barang->stok) }}" required>
            @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="diskon" class="form-label">Diskon (%)</label>
            <input type="number" id="diskon" name="diskon"
                   class="form-control @error('diskon') is-invalid @enderror"
                   value="{{ old('diskon', $barang->diskon) }}" min="0" max="100">
            @error('diskon')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-danger">Update Barang</button>
        <a href="{{ route('barang.index') }}" class="btn btn-danger ms-2">Kembali</a>
    </form>
</div>
@endsection
