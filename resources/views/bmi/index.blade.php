<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator BMI</title>
    <style>
        body { font-family: sans-serif; max-width: 500px; margin: 2rem auto; }
        label { display: block; margin-top: 1rem; }
        input { padding: 0.5rem; width: 100%; box-sizing: border-box; }
        button { margin-top: 1rem; padding: 0.5rem 1rem; cursor: pointer; }
        .hasil { margin-top: 1.5rem; padding: 1rem; background: #f0f0f0; border-radius: 6px; }
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Kalkulator BMI</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('bmi.hitung') }}">
        @csrf
        <label>Berat (kg)</label>
        <input type="number" step="0.1" name="berat_kg" value="{{ old('berat_kg', $beratKg ?? '') }}" required>

        <label>Tinggi (cm)</label>
        <input type="number" step="0.1" name="tinggi_cm" value="{{ old('tinggi_cm', $tinggiCm ?? '') }}" required>

        <button type="submit">Hitung BMI</button>
    </form>

    @if (isset($bmi))
        <div class="hasil">
            <strong>BMI kamu: {{ $bmi }}</strong><br>
            Kategori: {{ $kategori }}
        </div>
    @endif
</body>
</html>