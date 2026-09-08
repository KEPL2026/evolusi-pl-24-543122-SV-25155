<?php

namespace Tests\Feature;

use Tests\TestCase;

class BmiControllerTest extends TestCase
{
    public function test_halaman_kalkulator_bisa_diakses(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Kalkulator BMI');
    }

    public function test_hitung_bmi_dengan_input_valid(): void
    {
        $response = $this->post('/hitung-bmi', [
            'berat_kg' => 70,
            'tinggi_cm' => 175,
        ]);

        $response->assertStatus(200);
        $response->assertSee('22.86');
        $response->assertSee('Normal');
    }

    public function test_hitung_bmi_menolak_input_tidak_valid(): void
    {
        $response = $this->post('/hitung-bmi', [
            'berat_kg' => -5,
            'tinggi_cm' => 175,
        ]);

        $response->assertSessionHasErrors('berat_kg');
    }
}
