<?php

namespace App\Services;


use App\Repositories\ItemRepository;
use App\Repositories\OrderRepository;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Log;
class OrderService
{
    private $orderRepository;
    private $itemRepository;

    public function __construct(OrderRepository $orderRepository, ItemRepository $itemRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->itemRepository = $itemRepository;

    }
    public function data()
    {
        $orders = $this->all();
        return DataTables::of($orders)
            ->editColumn('actions', function ($order) {
                return view('orders.datatables.actions', compact('order'));
            })
             ->rawColumns(['actions'])
            ->toJson();
    }
    public function all()
    {
        return $this->orderRepository->all();
    }
    public function save($request)
    {
        try {
            DB::beginTransaction();
            $order = $this->orderRepository->save($request->client_id);
            foreach ($request->items as $item) {
                $this->itemRepository->save($order, $item);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating attribute: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return false;

        }

    }
}
