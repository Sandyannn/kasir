@extends('layouts.app')

@section('content')
<h2>Tambah Transaksi</h2>

<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div>
        <label for="pelanggan_id">Pelanggan (opsional)</label>
        <select name="pelanggan_id" id="pelanggan_id" onchange="toggleInputBaru(this)">
            <option value="">-- Pilih Pelanggan --</option>
            @foreach ($pelanggans as $pelanggan)
                <option value="{{ $pelanggan->id }}">
                    {{ $pelanggan->nama }}
                    @if($pelanggan->membership) ({{ $pelanggan->membership }}) @endif
                </option>
            @endforeach
            <option value="baru">+ Tambah Pelanggan Baru</option>
        </select>
    </div>

    <div id="membership-info" style="margin-top: 10px; font-weight: bold;"></div>

    <div id="input-pelanggan-baru" style="display:none; margin-top:10px;">
        <label for="nama_pelanggan_baru">Nama Pelanggan Baru</label>
        <input type="text" name="nama_pelanggan_baru" id="nama_pelanggan_baru" placeholder="Nama pelanggan baru">

        <label for="no_hp">No HP</label>
        <input type="text" name="no_hp" id="no_hp" placeholder="No HP">
    </div>

    <h4>Barang yang Dibeli</h4>
    <div id="barang-list">
        <div class="barang-item">
            <label for="barang_id">Barang</label>
            <select name="barang_id[]" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                    @if($barang->stok > 0)
                        @php
                            $diskon = $barang->event->diskon_persen ?? 0;
                            $label = $barang->nama_barang . ' (Rp' . number_format($barang->harga, 0, ',', '.') . ')';
                            if ($diskon > 0) {
                                $label .= ' - Diskon ' . $diskon . '%';
                            }
                            $label .= ' - Stok: ' . $barang->stok;
                        @endphp
                        <option value="{{ $barang->id }}">{{ $label }}</option>
                    @endif
                @endforeach
            </select>

            <label>Jumlah</label>
            <input type="number" name="jumlah[]" placeholder="Jumlah" min="1" required>

            <button type="button" class="btn btn-delete" onclick="hapusBarang(this)">Hapus</button>
        </div>
    </div>

    <button type="button" class="btn btn-add" onclick="tambahBarang()">+ Tambah Barang</button>

    <br><br>
    <button type="submit" class="btn btn-submit">Simpan Transaksi</button>
</form>

<script>
    const pelanggans = @json($pelanggans);

    function toggleInputBaru(select) {
        const val = select.value;
        const inputBaru = document.getElementById('input-pelanggan-baru');
        const info = document.getElementById('membership-info');

        if (val === 'baru') {
            inputBaru.style.display = 'block';
            info.textContent = '';
        } else {
            inputBaru.style.display = 'none';

            const selected = pelanggans.find(p => p.id == val);
            if (selected && selected.membership) {
                let diskon = 0;
                if (selected.membership === 'Silver') diskon = 5;
                if (selected.membership === 'Gold') diskon = 10;
                info.textContent = `Membership: ${selected.membership} (Diskon tambahan ${diskon}%)`;
            } else {
                info.textContent = '';
            }
        }
    }

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
