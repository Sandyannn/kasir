@extends('layouts.app')

@section('content')
<h2>Tambah Pelanggan</h2>

<form action="{{ route('pelanggan.store') }}" method="POST">
    @csrf
    <div class="item">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" required>

        <label for="jumlah_transaksi">Jumlah Transaksi (Opsional)</label>
        <input type="number" name="jumlah_transaksi" value="0" min="0">

        <button type="submit">Simpan</button>
    </div>
</form>
@endsection