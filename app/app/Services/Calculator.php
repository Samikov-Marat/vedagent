<?php

namespace App\Services;

use App\Dto\CalculateDto;
use App\Models\Company;

class Calculator
{
    public function getCompanies()
    {
        return Company::select(['id', 'name', 'price'])
            ->orderBy('price')
            ->get();
    }

    public function getTotalPrice(CalculateDto $inputs): float
    {
        $company = Company::query()
            ->select(['id', 'price'])
            ->findOrFail($inputs->company_id);
        return $company->price * $inputs->weight * $inputs->distance;
    }
}
