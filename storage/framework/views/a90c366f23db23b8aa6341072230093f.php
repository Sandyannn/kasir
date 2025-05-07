

<?php $__env->startSection('content'); ?>
<h2>Daftar Barang</h2>
<div class="btn">
    <a href="<?php echo e(route('barang.create')); ?>" class="btn btn-add">+ Tambah Barang</a>
</div>

<?php if(session('success')): ?>
<p><?php echo e(session('success')); ?></p>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($barang->nama_barang); ?></td>
            <td>Rp <?php echo e(number_format($barang->harga, 0, ',', '.')); ?></td>
            <td><?php echo e($barang->stok); ?></td>
            <td>
                <div class="btn">
                    <a href="<?php echo e(route('barang.edit', $barang->id)); ?>" class="btn btn-edit">Edit</a>
                </div>
                <div class="btn">
                    <form action="<?php echo e(route('barang.destroy', $barang->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-edit">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/barang/index.blade.php ENDPATH**/ ?>