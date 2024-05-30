<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Berat Sampah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-4xl font-bold mb-5 text-gray-800">Data Berat Sampah</h1>
        <a href="<?php echo e(route('trash.create')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-700 transition duration-300">Tambah Data Sampah</a>
        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-lg shadow-md">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Nama Sampah</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Berat (kg)</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Harga (Rp)</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Waktu</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $trash; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="bg-white hover:bg-gray-100 transition duration-300">
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900"><?php echo e($item->id); ?></td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900"><?php echo e($item->name); ?></td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900"><?php echo e($item->weight); ?></td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900"><?php echo e($item->price); ?></td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900"><?php echo e($item->created_at); ?></td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                <form action="<?php echo e(route('trash.destroy', $item->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<?php /**PATH C:\Users\alman\OneDrive\Desktop\Bank Sampah\BankSampah\resources\views/index.blade.php ENDPATH**/ ?>