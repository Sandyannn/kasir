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
            <th>Nama</th>
            <th>No HP</th>
            <th>Total Transaksi</th>
            <th>Membership</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pelanggans as $pelanggan)
        <tr>
            <td>{{ $pelanggan->nama }}</td>
            <td>{{ $pelanggan->no_hp }}</td>
            <td>Rp{{ number_format ($pelanggan->total_transaksi, 0, ',', '.' )}}</td>
            <td>{{ $pelanggan->membership }}</td>
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
