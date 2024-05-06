<?php

namespace App\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class OrderDto extends DataTransferObject
{
    public int $company_id;
    #[NumberBetween(30, 100000)]
    public float $weight;
    public float $distance;
    public float $total;
}
