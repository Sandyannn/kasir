

<?php $__env->startSection('content'); ?>
<h2>Edit Barang</h2>

<form action="<?php echo e(route('barang.update', $barang->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="item">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" value="<?php echo e($barang->nama_barang); ?>" required>

        <label for="harga">Harga</label>
        <input type="number" name="harga" value="<?php echo e($barang->harga); ?>" required>

        <label for="stok">Stok</label>
        <input type="number" name="stok" value="<?php echo e($barang->stok); ?>" required>

        <button type="submit">Update Barang</button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/barang/edit.blade.php ENDPATH**/ ?>