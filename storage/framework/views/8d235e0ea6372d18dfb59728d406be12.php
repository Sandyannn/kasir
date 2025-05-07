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

    <p>Nomor: <?php echo e($transaksi->id); ?><br>
    Tanggal: <?php echo e(($transaksi->tanggal_transaksi)->format('d-m-Y')); ?></p>

    <div class="line"></div>

    <table>
        <?php $__currentLoopData = $transaksi->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="3"><?php echo e($detail->barang->nama_barang); ?></td>
            </tr>
            <tr>
                <td><?php echo e($detail->jumlah); ?> x Rp<?php echo e(number_format($detail->harga, 0, ',', '.')); ?></td>
                <td align="right">Diskon: <?php echo e($detail->diskon_persen); ?>%</td>
                <td align="right">Rp<?php echo e(number_format($detail->total_harga_akhir, 0, ',', '.')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <div class="line"></div>

    <table>
        <tr>
            <td><strong>Total Diskon</strong></td>
            <td align="right">Rp<?php echo e(number_format($transaksi->total_diskon, 0, ',', '.')); ?></td>
        </tr>
        <tr>
            <td><strong>Total Bayar</strong></td>
            <td align="right"><strong>Rp<?php echo e(number_format($transaksi->total_harga, 0, ',', '.')); ?></strong></td>
        </tr>
    </table>

    <div class="line"></div>

    <div class="center">
        <p>*** Terima Kasih ***<br>Selamat Berbelanja Kembali</p>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/nota/nota_pdf.blade.php ENDPATH**/ ?>