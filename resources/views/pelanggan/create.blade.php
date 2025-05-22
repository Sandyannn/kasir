@extends('layouts.app')

@section('content')
<h2>Tambah Pelanggan</h2>

<form action="{{ route('pelanggan.store') }}" method="POST">
    @csrf
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="item">
        <label for="nama">Nama Pelanggan</label>
        <input type="text" name="nama" required>

        <label for="no_hp">No HP</label>
        <input type="number" name="no_hp" required>

        <label for="total_transaksi">Total Transaksi</label>
        <input type="number" name="total_transaksi" min="0">

        <button type="submit">Simpan</button>
    </div>
</form>
@endsection
