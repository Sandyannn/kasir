@extends('layouts.app')

@section('content')
<h2>Tambah Barang</h2>

<form action="{{ route('barang.store') }}" method="POST">
    @csrf

    <div class="item">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" required>

        <label for="harga">Harga</label>
        <input type="number" name="harga" required>

        <label for="stok">Stok</label>
        <input type="number" name="stok" required>

        <button type="submit">Tambah Barang</button>
    </div>
</form>
@endsection