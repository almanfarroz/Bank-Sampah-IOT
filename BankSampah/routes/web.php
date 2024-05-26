<?php

use App\Http\Controllers\EspController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrashController;

Route::get('/', [TrashController::class, 'index'])->name('index');
Route::get('/index', [TrashController::class, 'index'])->name('index');
Route::resource('trash', TrashController::class);
Route::delete('/trash/{id}', [TrashController::class, 'destroy'])->name('trash.destroy');
Route::post('/receive-weight', 'EspController@receiveWeight')->name('receive-weight');
