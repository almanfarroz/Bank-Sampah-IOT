<!DOCTYPE html>
<html>
<head>
    <title>Data Berat Sampah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Data Berat Sampah</h1>
    <a href="{{ route('trash.create') }}" class="btn btn-primary mb-3">Tambah Data Sampah</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
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
            @foreach ($trash as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->weight }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <form action="{{ route('trash.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
