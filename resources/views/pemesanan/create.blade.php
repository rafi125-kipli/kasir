@extends('layouts.app')

@section('content')

{{-- Flash Messages --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<h1>Tambah Pemesanan</h1>

<form action="{{ route('pemesanan.store') }}" method="POST">
    @csrf

    <div id="barang-container">
        @php
            $oldItemIds = old('item_id', [null]);
            $oldQtys = old('qty', [1]);
        @endphp

        @foreach($oldItemIds as $i => $itemId)
        <div class="row mb-3 barang-row">
            <input type="hidden" name="tipe[]" value="barang">

            <div class="col-md-6">
                <select name="item_id[]" class="form-select @error("item_id.$i") is-invalid @enderror" required>
                    <option value="">Pilih Barang</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}" {{ $itemId == $barang->id ? 'selected' : '' }}>
                            {{ $barang->nama }} – Rp{{ number_format($barang->harga) }}
                            @if($barang->diskon) (Diskon {{ $barang->diskon }}%) @endif
                        </option>
                    @endforeach
                </select>
                @error("item_id.$i")<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-3">
                <input type="number" name="qty[]" min="1"
                       value="{{ $oldQtys[$i] ?? 1 }}"
                       class="form-control @error("qty.$i") is-invalid @enderror"
                       placeholder="Qty" required>
                @error("qty.$i")<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-3">
                <button type="button" class="btn btn-danger remove-row">Hapus</button>
            </div>
        </div>
        @endforeach
    </div>

    <button type="button" id="add-barang" class="btn btn-danger mb-3">Tambah Barang</button><br>
    <button type="submit" class="btn btn-danger">Simpan Pemesanan</button>
    <a href="{{ route('barang.index') }}" class="btn btn-danger ms-2">Kembali</a>
</form>

@endsection

@push('scripts')
<script>
    document.getElementById('add-barang').addEventListener('click', function () {
        const container = document.getElementById('barang-container');
        const rows = container.querySelectorAll('.barang-row');
        const lastIndex = rows.length;

        const first = container.querySelector('.barang-row');
        const clone = first.cloneNode(true);

        clone.querySelectorAll('select, input').forEach(el => {
            if (el.name.includes('item_id')) {
                el.name = 'item_id[]';
                el.selectedIndex = 0;
            } else if (el.name.includes('qty')) {
                el.name = 'qty[]';
                el.value = 1;
            }
            el.classList.remove('is-invalid');
        });

        container.appendChild(clone);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) {
            const rows = document.querySelectorAll('.barang-row');
            if (rows.length > 1) {
                e.target.closest('.barang-row').remove();
            }
        }
    });
</script>
@endpush
