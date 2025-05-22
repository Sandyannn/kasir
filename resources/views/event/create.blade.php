@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Event Diskon</h3>
    <form action="{{ route('event.store') }}" method="POST">
        @csrf
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="mb-3">
            <label>Barang</label>
            <select name="barang_id" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                <option value="{{ $barang->id }}"
                    {{ isset($event) && $event->barang_id == $barang->id ? 'selected' : '' }}>
                    {{ $barang->nama_barang }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Diskon (%)</label>
            <input type="number" name="diskon_persen" class="form-control" step="0.01" min="0" max="100"
                value="{{ $event->diskon_persen ?? old('diskon_persen', 0) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection