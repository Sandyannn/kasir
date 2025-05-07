

<?php $__env->startSection('content'); ?>
<h2>Daftar Pelanggan</h2>

<a href="<?php echo e(route('pelanggan.create')); ?>" class="btn btn-add">+ Tambah Pelanggan</a>

<?php if(session('success')): ?>
<p><?php echo e(session('success')); ?></p>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>Nama Pelanggan</th>
            <th>Jumlah Transaksi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $pelanggans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($pelanggan->nama_pelanggan); ?></td>
            <td><?php echo e($pelanggan->total_transaksi); ?></td>
            <td>
                <a href="<?php echo e(route('pelanggan.edit', $pelanggan->id)); ?>" class="btn btn-edit">Edit</a>
                <form action="<?php echo e(route('pelanggan.destroy', $pelanggan->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/pelanggan/index.blade.php ENDPATH**/ ?>