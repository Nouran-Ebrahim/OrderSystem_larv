<?php

namespace App\Services;

use App\Repositories\ReportsRepository;
use Yajra\DataTables\Facades\DataTables;

class ReportsService
{
    private $reportsRepository;

    public function __construct(ReportsRepository $reportsRepository)
    {
        $this->reportsRepository = $reportsRepository;

    }
    public function ordersReportData()
    {
        $reports = $this->allOrdersReport();
        return DataTables::of($reports)
            ->toJson();
    }
    public function allOrdersReport()
    {
        return $this->reportsRepository->allOrdersReport();
    }

    public function clientsReportData()
    {
        $reports = $this->allClientsReportData();
        return DataTables::of($reports)
            ->addIndexColumn()
            ->toJson();
    }
    public function allClientsReportData()
    {
        return $this->reportsRepository->allClientsReportData();
    }

}
