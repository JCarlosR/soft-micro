<?php

namespace App\Http\Controllers\API;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only([
            'IMEI',
            'phoneNumber',
            'type',
            'username',
            'password'
        ]);
        if (isset($data['username']) && isset($data['password']))
            $data['password'] = bcrypt($data['password']);

        $client = Client::create($data);

        $data = [];
        if ($client) {
            if ($client->username)
                $data['message'] = 'Client registrado correctamente.';
            else
                $data['message'] = 'Module registrado correctamente.';

            $data['success'] = true;
        } else {
            $data['success'] = false;
        }

        return $data;
    }

    public function update(Request $request)
    {
        $data = $request->only([
            'IMEI',
            'phoneNumber',
            'type',
            'username',
            'password'
        ]);
        if (isset($data['username']) && isset($data['password']))
            $data['password'] = bcrypt($data['password']);

        $client = Client::where('IMEI', $request->input('IMEI'))->first();
        if ($client) {
            $updated = $client->update($data);
        } else {
            $updated = false;
        }

        $data = [];
        $data['success'] = $updated;
        return $data;
    }
}
