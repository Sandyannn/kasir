@extends('layouts.app')

@section('content')
<h2>Nota Pembelian</h2>

<div>
    <p><strong>Nomor Transaksi:</strong> {{ $transaksi->id }}</p>
    <p><strong>Tanggal:</strong> {{($transaksi->tanggal_transaksi)->format('d-m-Y') }}</p>

    <h4>Detail Barang</h4>
    <a href="{{ route('nota.cetak', $transaksi->id) }}" target="_blank">
        <button>Cetak PDF</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Diskon (%)</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi->details as $detail)
            <tr>
                <td>{{ $detail->barang->nama_barang }}</td>
                <td>Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>{{ $detail->diskon_persen }}%</td>
                <td>Rp{{ number_format($detail->total_harga_akhir, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <p><strong>Total Diskon:</strong> Rp{{ number_format($transaksi->total_diskon, 0, ',', '.') }}</p>
    <p><strong>Total Bayar:</strong> Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>

    <hr>
    <p>Terima kasih telah berbelanja di <strong>Toko Grosir</strong>!</p>
</div>
@endsection