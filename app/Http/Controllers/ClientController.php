<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ClientController extends Controller
{
    private $clientService;
    private $model_view_folder;
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
        $this->model_view_folder = 'clients';
    }
    public function index()
    {
        return view($this->model_view_folder . '.index');
    }
    public function data()
    {
        return $this->clientService->data();
    }
    public function create()
    {
        return view($this->model_view_folder . '.create');

    }
    public function store(ClientRequest $request)
    {
        $client = $this->clientService->save($request);
        if (!$client) {
            Toastr::error('Client not created');
        }
        Toastr::success('Client Added Successfully');
        return redirect()->route('dashboard.clients.index');
    }
}
