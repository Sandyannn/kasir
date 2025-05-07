<!DOCTYPE html>
<html>
<head>
    <title>Nota Transaksi</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 10px;
            width: 58mm;
            margin: 0 auto;
        }
        .center {
            text-align: center;
        }
        .line {
            border-top: 1px dashed #000;
            margin: 5px 0;
        }
        table {
            width: 100%;
        }
        td {
            vertical-align: top;
        }
    </style>
</head>
<body>

    <div class="center">
        <h3>Toko Grosir</h3>
        <p>Jl Pelabuhan Bajou No.1<br>Telp: 0859-6143-5111</p>
    </div>

    <div class="line"></div>

    <p>Nomor: {{ $transaksi->id }}<br>
    Tanggal: {{($transaksi->tanggal_transaksi)->format('d-m-Y') }}</p>

    <div class="line"></div>

    <table>
        @foreach($transaksi->details as $detail)
            <tr>
                <td colspan="3">{{ $detail->barang->nama_barang }}</td>
            </tr>
            <tr>
                <td>{{ $detail->jumlah }} x Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                <td align="right">Diskon: {{ $detail->diskon_persen }}%</td>
                <td align="right">Rp{{ number_format($detail->total_harga_akhir, 0, ',', '.') }}</td>
            </tr>
        @endforeach
    </table>

    <div class="line"></div>

    <table>
        <tr>
            <td><strong>Total Diskon</strong></td>
            <td align="right">Rp{{ number_format($transaksi->total_diskon, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><strong>Total Bayar</strong></td>
            <td align="right"><strong>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</strong></td>
        </tr>
    </table>

    <div class="line"></div>

    <div class="center">
        <p>*** Terima Kasih ***<br>Selamat Berbelanja Kembali</p>
    </div>

</body>
</html>
