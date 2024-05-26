<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Berat Sampah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Tambah Data Berat Sampah</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('trash.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Sampah</label>
            <select name="name" id="name" class="form-control">
                <option value="">Pilih Nama Sampah</option>
                @foreach($price as $nama => $harga)
                    <option value="{{ $nama }}" data-harga="{{ $harga }}">{{ $nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="weight">Berat (kg)</label>
            <input type="text" name="weight" id="weight" class="form-control" placeholder="Berat (kg)">
        </div>
        <div class="form-group">
            <label for="price">Harga (Rp)</label>
            <input type="text" name="price" id="price" class="form-control" placeholder="Harga (Rp)" readonly>
        </div>
        <button type="button" class="btn btn-primary" onclick="onSubmitWeight()">Kirim Berat</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
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

    function sendWeight(weight) {
        $.ajax({
            url: '{{ route("receive-weight") }}',
            type: 'POST',
            data: { weight: weight },
            success: function(response) {
                console.log(response.message);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Fungsi ini akan dipanggil saat tombol 'Kirim Berat' ditekan
    function onSubmitWeight() {
        var weight = $('#weight').val();
        sendWeight(weight);
    }
</script>
</html>
