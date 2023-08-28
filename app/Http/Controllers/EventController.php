<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use Auth;

class EventController extends Controller
{
    public function index()
    {
        return view('event.index');

    }

    public function store(Request $request)
    {
        Event::create([
            'name' => $request->name,
            'max_kill' => $request->kill,
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ]);
        return view('event.index');
    }

    public function show($id)
    {

        #$event = Event::findOrFail($id);
        #return view('event.show', ['event' => $event]);

        $events = Event::get()->where('user_id', $id);
        return view('event.show', ['events' => $events]);
        #dd($events);





    }
}
