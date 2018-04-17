<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::whereNotNull('phoneNumber')->get();
        return view('clients.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'IMEI',
            'phoneNumber',
            'type',
            'username',
            'password'
        ]);
        $data['password'] = bcrypt($data['password']);

        $client = Client::create($data);

        if ($client->phoneNumber)
            $status = 'Cliente registrado correctamente.';
        else
            $status = 'Módulo registrado correctamente.';

        return back()->with(compact('status'));
    }
}
