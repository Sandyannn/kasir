

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6 bg-[#E3DCC5] rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4 text-[#6E6658]">Tambah Produk Baru</h1>

    <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('produk.store')); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>

        <div>
            <label class="block text-[#6E6658] mb-1">Nama Produk</label>
            <input type="text" name="nama" class="w-full p-2 border rounded bg-white" required>
        </div>

        <div>
            <label class="block text-[#6E6658] mb-1">Harga (Rp)</label>
            <input type="number" name="harga" class="w-full p-2 border rounded bg-white" min="0" required>
        </div>

        <div>
            <label class="block text-[#6E6658] mb-1">Stok</label>
            <input type="number" name="stok" class="w-full p-2 border rounded bg-white" min="0" required>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-[#A67B5B] hover:bg-[#6E6658] text-white px-4 py-2 rounded">Simpan</button>
            <a href="<?php echo e(route('produk.index')); ?>" class="bg-gray-400 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir-laravel\resources\views/products/create.blade.php ENDPATH**/ ?>