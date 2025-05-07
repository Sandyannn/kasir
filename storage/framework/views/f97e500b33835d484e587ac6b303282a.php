

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6 bg-[#E3DCC5] rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4 text-[#6E6658]">Daftar Produk</h1>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('produk.create')); ?>" class="bg-[#A67B5B] hover:bg-[#6E6658] text-white px-4 py-2 rounded">+ Tambah Produk</a>

    <table class="w-full mt-6 table-auto bg-white shadow rounded">
        <thead class="bg-[#D9CBB6] text-[#6E6658]">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Nama Produk</th>
                <th class="px-4 py-2">Harga</th>
                <th class="px-4 py-2">Stok</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center text-[#6E6658]">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="border-t">
                <td class="px-4 py-2"><?php echo e($index + 1); ?></td>
                <td class="px-4 py-2"><?php echo e($product->nama); ?></td>
                <td class="px-4 py-2">Rp <?php echo e(number_format($product->harga, 0, ',', '.')); ?></td>
                <td class="px-4 py-2"><?php echo e($product->stok); ?></td>
                <td class="px-4 py-2 flex justify-center space-x-2">
                    <a href="<?php echo e(route('produk.edit', $product->id)); ?>" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                    <form action="<?php echo e(route('produk.destroy', $product->id)); ?>" method="POST" onsubmit="return confirm('Yakin hapus?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" class="py-4 text-gray-500">Belum ada produk.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/products/index.blade.php ENDPATH**/ ?>