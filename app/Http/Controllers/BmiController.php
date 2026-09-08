<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BmiController extends Controller
{
    public function index()
    {
        return view('bmi.index');
    }

    public function hitung(Request $request)
    {
        $validated = $request->validate([
            'berat_kg' => 'required|numeric|gt:0',
            'tinggi_cm' => 'required|numeric|gt:0',
        ]);

        $bmi = $this->hitungBmi($validated['berat_kg'], $validated['tinggi_cm']);
        $kategori = $this->kategoriBmi($bmi);

        return view('bmi.index', [
            'bmi' => $bmi,
            'kategori' => $kategori,
            'beratKg' => $validated['berat_kg'],
            'tinggiCm' => $validated['tinggi_cm'],
        ]);
    }

    public function hitungBmi(float $beratKg, float $tinggiCm): float
    {
        $tinggiM = $tinggiCm / 100;

        return round($beratKg / ($tinggiM * $tinggiM), 2);
    }

    public function kategoriBmi(float $bmi): string
    {
        return match (true) {
            $bmi < 18.5 => 'Kurus',
            $bmi < 25 => 'Normal',
            $bmi < 30 => 'Gemuk',
            default => 'Obesitas',
        };
    }
}
