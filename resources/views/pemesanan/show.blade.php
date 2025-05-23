@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Nota Pemesanan #{{ $pemesanan->id }}</h2>
    <p>Tanggal: {{ $pemesanan->tanggal->format('d-m-Y H:i') }}</p>

    <table class="table table-bordered table-success">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemesanan->details as $detail)
            <tr>
                <td>{{ $detail->barang->nama }}</td>
                <td>{{ $detail->qty }}</td>
                <td>Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total: Rp {{ number_format($pemesanan->total, 0, ',', '.') }}</h4>

    <a href="{{ route('pemesanan.index') }}" class="btn btn-danger">Kembali</a>
    <button onclick="window.print()" class="btn btn-danger">Cetak</button>
</div>
@endsection
