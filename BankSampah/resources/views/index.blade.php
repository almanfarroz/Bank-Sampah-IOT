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
        <a href="{{ route('trash.create') }}" class="absolute bottom-4 right-4 bg-gray-700 text-white px-4 py-1.5 rounded hover:bg-gray-500 hover:text-gray-800 transition duration-300 font-bold text-4xl">+
</a>


        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-lg shadow-md">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-white uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-white uppercase tracking-wider">Nama Sampah</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-white uppercase tracking-wider">Berat (kg)</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-white uppercase tracking-wider">Harga (Rp)</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-white uppercase tracking-wider">Waktu</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-white uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trash as $item)
                        <tr class="bg-white hover:bg-gray-100 transition duration-300">
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">{{ $item->id }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">{{ $item->name }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">{{ $item->weight }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">{{ $item->price }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">{{ $item->created_at }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-center">
                                <form action="{{ route('trash.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded font-bold hover:bg-red-700 transition duration-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
