@extends('layouts.app')

@section('content')
<h2>Daftar Barang</h2>
<div class="btn">
    <a href="{{ route('barang.create') }}" class="btn btn-add">+ Tambah Barang</a>
</div>

@if(session('success'))
<p>{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barangs as $barang)
        <tr>
            <td>{{ $barang->nama_barang }}</td>
            <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
            <td>{{ $barang->stok }}</td>
            <td>
                <div class="btn">
                    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-edit">Edit</a>
                </div>
                <div class="btn">
                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-edit">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection