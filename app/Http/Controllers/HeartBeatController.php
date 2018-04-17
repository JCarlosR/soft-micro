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
    {
        $validator = Validator::make($request->only('from'), [
            'from' => 'required'//|exists:clients,IMEI'
        ]);

        if ($validator->fails())
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);

        $client = Client::where('IMEI', $request->input('from'))->firstOrFail();
        $client->lastRequest = Carbon::now();
        $saved = $client->save();

        $data['success'] = $saved;
        if ($saved) {
            $data['events'] = Event::where('to', $client->IMEI)->get([
                'from', 'data'
            ]);
        }
        return $data;
    }
}
