<?php

use App\Http\Controllers\SensorLaravel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrashController;

Route::get('/', [TrashController::class, 'index'])->name('index');
Route::get('/index', [TrashController::class, 'index'])->name('index');
Route::resource('trash', TrashController::class);
Route::delete('/trash/{id}', [TrashController::class, 'destroy'])->name('trash.destroy');
Route::get('/bacaberat', [SensorLaravel::class, 'bacaberat']);
Route::get('/simpan/{nilaiberat}', [SensorLaravel::class, 'simpansensor']);