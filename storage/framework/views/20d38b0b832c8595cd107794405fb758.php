

<?php $__env->startSection('content'); ?>
<h2>Nota Pembelian</h2>

<div>
    <p><strong>Nomor Transaksi:</strong> <?php echo e($transaksi->id); ?></p>
    <p><strong>Tanggal:</strong> <?php echo e(($transaksi->tanggal_transaksi)->format('d-m-Y')); ?></p>

    <h4>Detail Barang</h4>
    <a href="<?php echo e(route('nota.cetak', $transaksi->id)); ?>" target="_blank">
        <button>Cetak PDF</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Diskon (%)</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transaksi->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($detail->barang->nama_barang); ?></td>
                <td>Rp<?php echo e(number_format($detail->harga, 0, ',', '.')); ?></td>
                <td><?php echo e($detail->jumlah); ?></td>
                <td><?php echo e($detail->diskon_persen); ?>%</td>
                <td>Rp<?php echo e(number_format($detail->total_harga_akhir, 0, ',', '.')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <br>
    <p><strong>Total Diskon:</strong> Rp<?php echo e(number_format($transaksi->total_diskon, 0, ',', '.')); ?></p>
    <p><strong>Total Bayar:</strong> Rp<?php echo e(number_format($transaksi->total_harga, 0, ',', '.')); ?></p>

    <hr>
    <p>Terima kasih telah berbelanja di <strong>Toko Grosir</strong>!</p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/nota/show.blade.php ENDPATH**/ ?>