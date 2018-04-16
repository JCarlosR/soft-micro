<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'to' => 'required',
            'data' => 'required'
        ]);

        $event = Event::create($request->only([
            'from', 'to', 'data'
        ]));

        $data['success'] = ($event != null);
        return $data;
    }
}
