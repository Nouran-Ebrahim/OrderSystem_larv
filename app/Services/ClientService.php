<?php

namespace App\Services;

use App\Models\Client;
use App\Repositories\ClientRepository;
use Yajra\DataTables\Facades\DataTables;

class ClientService
{
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;

    }
    public function data()
    {
        $clients = $this->all();
       return  DataTables::of($clients)
            ->addIndexColumn()
            ->toJson();
    }
    public function all()
    {
        return $this->clientRepository->all();
    }
    public function save($request)
    {
        return $this->clientRepository->save($request);
    }
}
