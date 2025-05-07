

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <h3>Selamat Datang di Aplikasi Kasir Toko Grosir Roni Laris</h3>
    <p>Gunakan menu di atas untuk mengelola barang dan melakukan transaksi.</p>

    <div style="margin-top: 20px;">
        <a href="<?php echo e(route('barang.index')); ?>" class="btn">Kelola Barang</a>
        <a href="<?php echo e(route('transaksi.index')); ?>" class="btn">Transaksi Pembelian</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/dashboard.blade.php ENDPATH**/ ?>