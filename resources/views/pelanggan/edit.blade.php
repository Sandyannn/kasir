@extends('layouts.app')

@section('content')
<h2>Edit Pelanggan</h2>

<form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
    @csrf
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    @method('PUT')

    <div class="item">
        <label for="nama">Nama</label>
        <input type="text" name="nama" required>

        <label for="no_hp">No HP</label>
        <input type="number" name="no_hp" required>

        <label for="total_transaksi">Total Transaksi</label>
        <input type="number" name="total_transaksi" min="0">

        <button type="submit">Update</button>
    </div>
</form>
@endsection
