@extends('layouts.app')

@section('content')
<h2>Tambah Transaksi</h2>

<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf

    <div>
        <label for="pelanggan_id">Pelanggan</label>
        <select name="pelanggan_id" required>
            <option value="">-- Pilih Pelanggan --</option>
            @foreach ($pelanggans as $pelanggan)
            <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
            @endforeach
        </select>
    </div>

    <h4>Barang yang Dibeli</h4>
    <div id="barang-list">
        <div class="barang-item">
            <label for="barang_id">Barang</label>
            <select name="barang_id[]" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                <option value="{{ $barang->id }}">{{ $barang->nama_barang }} (Rp{{ number_format($barang->harga, 0, ',', '.') }})</option>
                @endforeach
            </select>

            <label>Jumlah</label>
            <input type="number" name="jumlah[]" placeholder="Jumlah" min="1" required>

            <label>Diskon</label>
            <input type="number" name="diskon_persen[]" placeholder="Diskon" min="0" max="100" value="0" required>

            <button type="button" class="btn btn-delete" onclick="hapusBarang(this)">Hapus</button>
        </div>
    </div>

    <button type="button" class="btn btn-add" onclick="tambahBarang()">+ Tambah Barang</button>

    <br><br>
    <button type="submit" class="btn btn-submit">Simpan Transaksi</button>
</form>

<script>
    function tambahBarang() {
        const barangList = document.getElementById('barang-list');
        const barangItem = document.querySelector('.barang-item');
        const clone = barangItem.cloneNode(true);

        clone.querySelectorAll('input').forEach(input => input.value = '');
        clone.querySelector('select').selectedIndex = 0;

        barangList.appendChild(clone);
    }

    function hapusBarang(btn) {
        const barangItem = btn.parentNode;
        const barangList = document.getElementById('barang-list');
        if (barangList.children.length > 1) {
            barangItem.remove();
        } else {
            alert('Minimal satu barang harus ada.');
        }
    }
</script>
@endsection