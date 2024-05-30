<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Berat Sampah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo e(('jquery/jquery.min.js')); ?>"></script>

<!-- ajax untuk realtime -->
<script type="text/javascript">
  $(document).ready( function() {
    setInterval( function() {
      $("#berat").load("<?php echo e(url('bacaberat')); ?>");
    }, 1000);     //1000ms = 1s
  });  
</script>
</head>
<body class="bg-gray-100">

<!-- Header Section -->
<header class="bg-gradient-to-r from-gray-700 to-gray-900 text-white py-4 px-3 shadow-lg">
    <div class="container mx-auto flex items-center justify-between">
        <div class="flex items-center">
            <img src="/assets/logo.png" alt="Logo" style="height: 50px; width: 50px; object-fit: cover;" class="mr-4 rounded-full border-2 border-white">
            <h1 class="text-3xl font-bold tracking-wide">AHRRI</h1>
        </div>
        <h1 class="text-2xl font-semibold text-right px-3">UTS IOT Data Berat Sampah</h1>
    </div>
</header>

<!-- Container Section -->
<div class="container mx-auto p-8 mt-3 flex justify-center items-start space-x-14">

    <!-- Sensor Monitoring Section -->
    <div class="w-full max-w-md">
        <div class="flex flex-col">
            <div class="bg-gray-700 text-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-center">
                    <h4 class="text-xl font-bold">BERAT SAMPAH</h4>
                    <div class="text-6xl font-bold">
                        <span id="berat">0</span> <span class="text-2xl align-top">KG</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 text-gray-800 rounded-lg shadow-lg p-6 mt-6">
                <blockquote class="italic text-lg text-center mb-4">
                    "Satu langkah kecil untuk membuang sampah, satu lompatan besar untuk menjaga bumi kita."
                </blockquote>
                <blockquote class="italic text-lg text-center mb-4">
                    "Sampah bukan hanya masalah, tapi juga cerminan dari sikap kita terhadap bumi tempat kita tinggal."
                </blockquote>
                <blockquote class="italic text-lg text-center">
                    "Setiap orang punya peran untuk menjaga kebersihan lingkungan. Mari mulai dari diri sendiri."
                </blockquote>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h1 class="text-4xl font-bold mb-6 text-gray-700 text-center">Tambah Data Berat Sampah</h1>
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
                    <input type="text" name="weight" id="weight" class="form-input block px-3 w-full mt-1 rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Berat (kg)">
                </div>
                <div class="mb-6">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Harga (Rp)</label>
                    <input type="text" name="price" id="price" class="form-input block px-3 w-full mt-1 rounded border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Harga (Rp)" readonly>
                </div>
                <div class="flex justify-between">
                    <button type="button" class="text-gray-500 hover:text-white hover:bg-gray-700 px-4 py-2 rounded transition duration-300 focus:text-lg focus:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 font-bold" onclick="onSubmitWeight()">Kirim Berat</button>
                    <button type="submit" class="bg-gray-700 text-white text-semibold px-4 py-2 rounded hover:bg-gray-600 transition duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Simpan</button>
                </div>
            </form>
        </div>
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
<?php /**PATH C:\Users\User\Bank Sampah\BankSampah\resources\views/create.blade.php ENDPATH**/ ?>