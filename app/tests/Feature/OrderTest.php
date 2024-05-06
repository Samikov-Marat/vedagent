<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Order;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_example(): void
    {
        Company::factory()->create();
        $response = $this->withoutMiddleware(ValidateCsrfToken::class)
            ->post('/save', ['company_id' => 1, 'weight' => 33, 'distance' => 1111]);
        $this->assertEquals(
            ['id' => 1, 'company_id' => 1, 'distance' => 1111, 'weight' => 33, 'total' => '366630'],
            Order::query()->select(['id', 'company_id', 'distance', 'weight', 'total'])->first()->toArray()
        );

        $response->assertStatus(302);
    }
}
