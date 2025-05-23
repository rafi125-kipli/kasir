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

    <h1>Daftar Pemesanan</h1>

    <a href="{{ route('barang.index') }}" class="btn btn-danger mb-3">Kembali ke Barang</a>

    <table class="table table-striped table-bordered table-success">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Detail</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pemesanans as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->tanggal->format('d-m-Y H:i') }}</td>
                    <td>Rp {{ number_format($p->total,0,',','.') }}</td>
                    <td>
                        <ul class="mb-0">
                            @foreach($p->details as $d)
                                <li>{{ $d->barang->nama }} (x{{ $d->qty }}) 
                                    – Rp{{ number_format($d->subtotal,0,',','.') }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('pemesanan.show', $p) }}" class="btn btn-danger btn-sm">
                            Cetak Nota
                        </a>
                        <form action="{{ route('pemesanan.destroy', $p) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus pemesanan #{{ $p->id }}?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada pemesanan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
