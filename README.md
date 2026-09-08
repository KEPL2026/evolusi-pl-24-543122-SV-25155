# evolusi-pl-24-543122-SV-25155

Aplikasi web sederhana **Kalkulator BMI** berbasis Laravel, dibuat untuk tugas Evolusi & Konstruksi Perangkat Lunak — Pertemuan 2 (Manajemen GitHub & Prinsip CI).

## Fitur
- Input berat (kg) dan tinggi (cm)
- Hitung BMI dan tampilkan kategori (Kurus / Normal / Gemuk / Obesitas)

## Menjalankan secara lokal
\`\`\`bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
\`\`\`
Buka `http://localhost:8000`.

## Menjalankan test
\`\`\`bash
php artisan test
\`\`\`

## Alur branch
\`\`\`
feature/kalkulator-bmi  --PR-->  dev  --PR-->  main
\`\`\`
Tidak ada push langsung ke `main` atau `dev`. Semua perubahan lewat Pull Request
dan harus lolos CI (job `test` dan `lint`) sebelum bisa digabung.

## CI
Workflow `.github/workflows/ci.yml` menjalankan dua job pada setiap push dan PR:
- **test** — menjalankan pengujian PHPUnit
- **lint** — memeriksa gaya kode dengan Laravel Pint