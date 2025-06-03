<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $ordersCount=Order::count();
        $clientsCount=Client::count();
        return view('home',compact('ordersCount','clientsCount'));
    }
}
