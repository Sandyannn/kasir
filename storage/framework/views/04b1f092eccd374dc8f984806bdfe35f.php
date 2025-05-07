

<?php $__env->startSection('content'); ?>
<h2>Tambah Pelanggan</h2>

<form action="<?php echo e(route('pelanggan.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="item">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" name="nama_pelanggan" required>

        <label for="jumlah_transaksi">Jumlah Transaksi (Opsional)</label>
        <input type="number" name="jumlah_transaksi" value="0" min="0">

        <button type="submit">Simpan</button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/pelanggan/create.blade.php ENDPATH**/ ?>