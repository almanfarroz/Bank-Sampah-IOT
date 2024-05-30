<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Berat Sampah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Sensor Monitoring Section -->
<div class="container mx-auto p-8 text-center mt-22">
    <div class="p-8 max-w-lg mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="bg-red-500 text-white rounded-t-lg py-3">
                <h4 class="text-xl font-bold">BERAT SAMPAH</h4>
            </div>
            <div class="py-8">
                <div class="text-6xl font-bold">
                    <span id="berat">0</span> <span class="text-2xl align-top">KG</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form Section -->
<div class="container mx-auto p-8">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg mx-auto">
        <h1 class="text-4xl font-bold mb-6 text-gray-800 text-center">Tambah Data Berat Sampah</h1>
        <?php if($errors->any()): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                <strong class="font-bold">Ada kesalahan!</strong>
                <span class="block sm:inline">
                    <ul class="list-disc pl-5">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </span>
            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('trash.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-6">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Sampah</label>
                <select name="name" id="name" class="form-select block w-full mt-1 rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Pilih Nama Sampah</option>
                    <?php $__currentLoopData = $price; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nama => $harga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($nama); ?>" data-harga="<?php echo e($harga); ?>"><?php echo e($nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="mb-6">
                <label for="weight" class="block text-gray-700 text-sm font-bold mb-2">Berat (kg)</label>
                <input type="text" name="weight" id="weight" class="form-input block w-full mt-1 rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Berat (kg)">
            </div>
            <div class="mb-6">
                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Harga (Rp)</label>
                <input type="text" name="price" id="price" class="form-input block w-full mt-1 rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Harga (Rp)" readonly>
            </div>
            <div class="flex justify-between">
                <button type="button" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50" onclick="onSubmitWeight()">Kirim Berat</button>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">Simpan</button>
            </div>
        </form>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#weight').on('input', function() {
            var weight = $(this).val();
            var price = $('#name option:selected').data('harga');
            var total = weight * price;
            $('#price').val(total);
        });

        $('#name').change(function() {
            $('#weight').trigger('input');
        });
    });
</script>
</html>
<?php /**PATH C:\Users\alman\OneDrive\Desktop\Bank Sampah\BankSampah\resources\views/create.blade.php ENDPATH**/ ?>