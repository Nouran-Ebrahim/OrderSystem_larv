<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
     public function all()
    {
        return Client::latest()->get();
    }
    public function save($request)
    {
        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return $client;
    }
}
