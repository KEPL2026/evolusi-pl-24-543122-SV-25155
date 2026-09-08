<?php

use App\Http\Controllers\BmiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BmiController::class, 'index'])->name('bmi.index');
Route::post('/hitung-bmi', [BmiController::class, 'hitung'])->name('bmi.hitung');
