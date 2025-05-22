@extends('layouts.app')

@section('content')
<h2>Data Transaksi</h2>
<a href="{{ route('transaksi.create') }}" class="btn btn-add">+ Tambah Transaksi</a>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Transaksi</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksis as $index => $transaksi)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ optional($transaksi->pelanggan)->nama?? '-' }}</td>
            <td>{{ $transaksi->tanggal_transaksi->format('d-m-Y') }}</td>
            <td>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-edit">Lihat Riwayat</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
