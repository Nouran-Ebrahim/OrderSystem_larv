<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\ClientService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class OrderController extends Controller
{
    private $orderService;
    private $clientService;
    private $model_view_folder;
    public function __construct(OrderService $orderService,ClientService $clientService)
    {
        $this->orderService = $orderService;
        $this->clientService = $clientService;
        $this->model_view_folder = 'orders';
    }
    public function index()
    {
        return view($this->model_view_folder . '.index');
    }
    public function data()
    {
        return $this->orderService->data();
    }
    public function create()
    {
        $clients=$this->clientService->all();
        return view($this->model_view_folder . '.create',compact('clients'));

    }
    public function show(Order $order)
    {
        $order->load(['items','client']);
        return view($this->model_view_folder . '.show',compact('order'));

    }
    public function store(OrderRequest $request)
    {
        $order = $this->orderService->save($request);
        if (!$order) {
            Toastr::error('Order not created');
        }
        Toastr::success('Order Added Successfully');
        return redirect()->route('dashboard.orders.index');
    }
}
