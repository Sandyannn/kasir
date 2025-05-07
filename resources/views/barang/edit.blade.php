@extends('layouts.app')

@section('content')
<h2>Edit Barang</h2>

<form action="{{ route('barang.update', $barang->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="item">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" required>

        <label for="harga">Harga</label>
        <input type="number" name="harga" value="{{ $barang->harga }}" required>

        <label for="stok">Stok</label>
        <input type="number" name="stok" value="{{ $barang->stok }}" required>

        <button type="submit">Update Barang</button>
    </div>
</form>
@endsection