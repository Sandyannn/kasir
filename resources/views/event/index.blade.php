@extends('layouts.app')

@section('content')
<h2>Daftar Event Diskon</h2>

<a href="{{ route('event.create') }}" class="btn btn-add">Tambah Event</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Barang</th>
            <th>Harga Awal</th>
            <th>Diskon (%)</th>
            <th>Harga Akhir</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        @php
        $harga_awal = $event->barang->harga;
        $diskon = ($event->diskon_persen / 100) * $harga_awal;
        $harga_akhir = $harga_awal - $diskon;
        @endphp
        <tr>
            <td>{{ $event->barang->nama_barang }}</td>
            <td>Rp{{ number_format($harga_awal, 0, ',', '.') }}</td>
            <td>{{ $event->diskon_persen }}%</td>
            <td>Rp{{ number_format($harga_akhir, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('event.edit', $event->id) }}" class="btn btn-edit">Edit</a>
                <form action="{{ route('event.destroy', $event->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin?')" class="btn btn-delete">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection