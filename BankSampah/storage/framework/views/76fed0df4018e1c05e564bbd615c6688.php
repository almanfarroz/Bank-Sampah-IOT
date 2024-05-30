<!DOCTYPE html>
<html>
<head>
    <title>Data Berat Sampah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Data Berat Sampah</h1>
    <a href="<?php echo e(route('trash.create')); ?>" class="btn btn-primary mb-3">Tambah Data Sampah</a>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Sampah</th>
                <th>Berat (kg)</th>
                <th>Harga (Rp)</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $trash; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->weight); ?></td>
                    <td><?php echo e($item->price); ?></td>
                    <td><?php echo e($item->created_at); ?></td>
                    <td>
                        <form action="<?php echo e(route('trash.destroy', $item->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php /**PATH C:\Users\alman\OneDrive\Desktop\Bank Sampah\BankSampah\resources\views//index.blade.php ENDPATH**/ ?>