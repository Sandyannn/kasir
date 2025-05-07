

<?php $__env->startSection('content'); ?>
    <h2>Edit Pelanggan</h2>

    <form action="<?php echo e(route('pelanggan.update', $pelanggan->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" value="<?php echo e($pelanggan->nama_pelanggan); ?>" required>

        <label for="jumlah_transaksi">Jumlah Transaksi</label>
        <input type="number" name="jumlah_transaksi" value="<?php echo e($pelanggan->jumlah_transaksi); ?>" min="0">

        <button type="submit">Update</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/pelanggan/edit.blade.php ENDPATH**/ ?>