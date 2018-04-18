<?php

namespace App\Http\Controllers;

use App\Client;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only('from', 'to', 'data'), [
            'from' => 'required',
            'to' => 'required',
            'data' => 'required'
        ]);

        if ($validator->fails())
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);

        $info = $request->only([
            'from', 'to', 'data'
        ]);

        if ($request->has('fromPhone')) {
            $client = Client::where('phoneNumber', $request->input('from'))->first(); // OrFail
            $info['from'] = ($client ? $client->IMEI : '');
        }
        if ($request->has('toPhone')) {
            $client = Client::where('phoneNumber', $request->input('to'))->first(); // OrFail
            $info['to'] = ($client ? $client->IMEI : '');
        }

        $event = Event::create($info);

        $data['success'] = ($event != null);
        return $data;
    }

    public function complete(Request $request)
    {
        $validator = Validator::make($request->only('from'), [
            'from' => 'required'
        ]);

        if ($validator->fails())
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);

        $events = Event::where('to', $request->input('from'))->get();
        $deleted = false;
        foreach ($events as $event) {
            $deleted = $event->delete();
        }

        $data['success'] = $deleted;
        return $data;
    }

    public function destroy(Request $request)
    {
        $event = Event::find($request->input('event_id'));
        $event->delete();

        return back();
    }
}
