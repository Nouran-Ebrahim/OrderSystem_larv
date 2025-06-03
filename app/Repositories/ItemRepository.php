<?php

namespace App\Repositories;

use App\Models\Item;
use App\Models\Order;

class ItemRepository
{

    public function save($order,$item)
    {
        $item = Item::create([
            'order_id' => $order->id,
            'item_name'=>$item['name'],
            'quantity'=>$item['quantity'],
            'price'=>$item['price']
        ]);
    }
}
