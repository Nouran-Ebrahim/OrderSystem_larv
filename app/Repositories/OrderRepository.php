<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
     public function all()
    {
        return Order::with('client')->latest()->get();
    }
    public function save($client_id)
    {
        $order = Order::create([
            'client_id' => $client_id,
        ]);
        return $order;
    }
}
