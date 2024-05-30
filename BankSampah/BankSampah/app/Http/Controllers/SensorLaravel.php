<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MSensor;

class SensorLaravel extends Controller
{
    public function bacaberat()
    {
        $sensor = MSensor::select('*')->get();
        return view('bacaberat', ['nilaisensor' => $sensor]);
    }

    public function simpansensor()
    {
        MSensor::where('id', '1')->update(['berat' => request()->nilaiberat]);
    }
}
