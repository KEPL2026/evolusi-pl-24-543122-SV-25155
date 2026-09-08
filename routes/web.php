<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BmiController;

Route::get('/', [BmiController::class, 'index'])->name('bmi.index');
Route::post('/hitung-bmi', [BmiController::class, 'hitung'])->name('bmi.hitung');