<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\ClientService;
use App\Services\OrderService;
use App\Services\ReportsService;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ReportsController extends Controller
{
    private $reportsService;
    private $model_view_folder;
    public function __construct(ReportsService $reportsService)
    {
        $this->reportsService = $reportsService;
        $this->model_view_folder = 'reports';
    }
    public function ordersReport()
    {
        return view($this->model_view_folder . '.orders');
    }
    public function clientsReport()
    {
        return view($this->model_view_folder . '.clients');
    }
    public function ordersReportData()
    {
        return $this->reportsService->ordersReportData();
    }
    public function clientsReportData()
    {
        return $this->reportsService->clientsReportData();
    }
}
