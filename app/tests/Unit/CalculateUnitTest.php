<?php

namespace Tests\Unit;

use App\Dto\CalculateDto;
use App\Models\Company;
use App\Services\Calculator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Exception;
use Illuminate\Support\Facades\Exceptions;
use Spatie\DataTransferObject\Exceptions\ValidationException;
use Tests\TestCase;

class CalculateUnitTest extends TestCase
{
    use RefreshDatabase;

    public function test_positive(): void
    {
        Company::factory()->create();
        $calculateDto = new CalculateDto(['company_id' => 1, 'weight' => 33, 'distance' => 1000]);
        $calculatorService = new Calculator();
        $total = $calculatorService->getTotalPrice($calculateDto);
        $this->assertTrue(330000.0 === $total);
    }

    public function test_negative(): void
    {
        Company::factory()->create();
        $calculateDto = new CalculateDto(['company_id' => 1, 'weight' => 33, 'distance' => 1000]);
        $calculatorService = new Calculator();
        $total = $calculatorService->getTotalPrice($calculateDto);
        $this->assertFalse(1000.0 === $total);
    }

    public function test_negative_exception(): void
    {
        Company::factory()->create();
//        Exceptions::fake();
        try {
            new CalculateDto(['company_id' => 1, 'weight' => 29, 'distance' => 1000]);
            $this->fail();
        } catch (ValidationException $e) {
            $this->assertTrue(true);
        }
//        Exceptions::assertReported(ValidationException::class);
    }
}
