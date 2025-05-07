

<?php $__env->startSection('content'); ?>
    <h2>Data Transaksi</h2>
    <a href="<?php echo e(route('transaksi.create')); ?>" class="btn btn-add">+ Tambah Transaksi</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Transaksi</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transaksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $transaksi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($transaksi->pelanggan->nama_pelanggan); ?></td>
                    <td><?php echo e($transaksi->tanggal_transaksi->format('d-m-Y')); ?></td>
                    <td>Rp<?php echo e(number_format($transaksi->total_harga, 0, ',', '.')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/transaksi/index.blade.php ENDPATH**/ ?>