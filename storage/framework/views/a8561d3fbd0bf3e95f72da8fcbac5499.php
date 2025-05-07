

<?php $__env->startSection('content'); ?>
<h2>Tambah Barang</h2>

<form action="<?php echo e(route('barang.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div class="item">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" required>

        <label for="harga">Harga</label>
        <input type="number" name="harga" required>

        <label for="stok">Stok</label>
        <input type="number" name="stok" required>

        <button type="submit">Tambah Barang</button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/barang/create.blade.php ENDPATH**/ ?>