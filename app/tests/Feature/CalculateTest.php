<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalculateTest extends TestCase
{
    use RefreshDatabase;

    public function test_positive(): void
    {
        Company::factory()->create();
        $response = $this->get('/calculate?' . http_build_query(['company_id' => 1, 'weight' => 33, 'distance' => 1000]));
        $response->assertStatus(200);
    }

    public function test_negative_weight(): void
    {
        Company::factory()->create();
        $response = $this->get('/calculate?' . http_build_query(['company_id' => 1, 'weight' => 29, 'distance' => 1000]));
        $response->assertStatus(302);
    }

    public function test_negative_company(): void
    {
        Company::factory()->create();
        $response = $this->get('/calculate?' . http_build_query(['company_id' => -1, 'weight' => 33, 'distance' => 1000]));
        $response->assertStatus(302);
    }

    public function test_negative_distance(): void
    {
        Company::factory()->create();
        $response = $this->get('/calculate?' . http_build_query(['company_id' => 1, 'weight' => 33, 'distance' => 'far far far']));
        $response->assertStatus(302);
    }
}
