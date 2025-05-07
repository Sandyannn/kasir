@extends('layouts.app')

@section('content')
<h2>Edit Pelanggan</h2>

<form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="item">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" value="{{ $pelanggan->nama_pelanggan }}" required>

        <label for="jumlah_transaksi">Jumlah Transaksi</label>
        <input type="number" name="jumlah_transaksi" value="{{ $pelanggan->jumlah_transaksi }}" min="0">

        <button type="submit">Update</button>
    </div>
</form>
@endsection