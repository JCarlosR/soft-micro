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
        $requests = Event::where('is_response', false)->get();
        $responses = Event::where('is_response', true)->get();

        return view('events.index', compact('requests', 'responses'));
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
            'from', 'to', 'data', 'isResponse'
        ]);

        if ($request->has('isResponse')) {
            $info['is_response'] = true;
            unset($info['isResponse']);
        }

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

        $event = Event::where('to', $request->input('from'))->first();
        if ($event)
            $deleted = $event->delete();
        else
            $deleted = false;

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
