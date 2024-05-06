<?php

namespace App\Services;

use App\Dto\OrderDto;
use App\Models\Order;

class OrderService
{
    public function save(OrderDto $inputs)
    {
        $order = new Order();
        $order->company_id = $inputs->company_id;
        $order->weight = $inputs->weight;
        $order->distance = $inputs->distance;
        $order->total = $inputs->total;
        $order->save();
        return $order;
    }

    public function getById($id)
    {
        return Order::query()
            ->select(['id', 'total'])
            ->findOrFail($id);
    }
}
