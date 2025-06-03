<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Order;

class ReportsRepository
{
    public function allOrdersReport()
    {
        $orders=Order::withCount('items')->orderBy('items_count','DESC')->get();
        return $orders;
    }
    public function allClientsReportData()
    {
        $clients=Client::withCount('orders')->orderBy('orders_count','DESC')->get();
        return $clients;
    }

}
