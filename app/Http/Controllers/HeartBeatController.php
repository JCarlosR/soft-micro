<?php

namespace App\Http\Controllers;

use App\Client;
use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeartBeatController extends Controller
{
    public function store(Request $request)
    {   // dd($request->all());
        $validator = Validator::make($request->only('from'), [
            'from' => 'required'//|exists:clients,IMEI'
        ]);

        if ($validator->fails())
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);

        if ($request->input('fromPhone') == 1) {
            $client = Client::where('phoneNumber', $request->input('from'))->first(); // OrFail
        } else {
            $client = Client::where('IMEI', $request->input('from'))->first(); // OrFail
        }
        $saved = true;
        if ($client) {
            $client->lastRequest = Carbon::now();
            $saved = $client->save();
        }

        $data['success'] = $saved;
        if ($saved) { // $client->IMEI
            $data['events'] = Event::where('to', $request->input('from'))->get([
                'from', 'data'
            ]);
        }
        return $data;
    }
}
