<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Esp;

class EspController extends Controller
{
    public function receiveWeight(Request $request)
{
    $weight = $request->input('weight');
    // Simpan ke database atau lakukan tindakan lainnya dengan berat yang diterima
    return response()->json(['message' => 'Berat berhasil diterima'], 200);
}

}
