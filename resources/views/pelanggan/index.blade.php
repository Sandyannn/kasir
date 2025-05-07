@extends('layouts.app')

@section('content')
<h2>Daftar Pelanggan</h2>

<a href="{{ route('pelanggan.create') }}" class="btn btn-add">+ Tambah Pelanggan</a>

@if(session('success'))
<p>{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>Nama Pelanggan</th>
            <th>Jumlah Transaksi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggans as $pelanggan)
        <tr>
            <td>{{ $pelanggan->nama_pelanggan }}</td>
            <td>{{ $pelanggan->total_transaksi }}</td>
            <td>
                <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-edit">Edit</a>
                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection