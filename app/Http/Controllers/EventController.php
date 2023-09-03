<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Team;
use Auth;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class EventController extends Controller
{
    //Create Event
    public function create(Request $request)
    {
        return view('event.create');
    }
    //Store Event
    public function store(Request $request)
    {
        $random_id = random_int(0000, 9999);
        Event::create([
            'name' => $request->name,
            'max_kill' => $request->kill,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'random_id' => $random_id
        ]);
        return redirect('/dashboard');
        //dd($request);
    }
    //List Event
    public function list()
    {
        $id = auth()->user()->id;
        $events = Event::get()->where('user_id', $id);
        return view('dashboard', ['events' => $events]);
        //dd($events);
    }
    //Delete Event Request
    public function destroy($id)
    {
        return redirect('/event/delete/' . $id);
        //dd($id);
    }
    //Delete Event Function
    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect('/dashboard');
        //dd($id);
    }
    //Edit Event Show
    public function edit($id)
    {
        $events = Event::findOrFail($id);
        return view('event.edit', ['events' => $events]);
        //dd( $id);
    }
    //Update Event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update([
            'name' => $request->name,
            'max_kill' => $request->kill,
            'description' => $request->description
        ]);
        return redirect('event/show/' . $id);
        //dd($event);
    }
    //Search Engine
    public function search($id)
    {
        $events = Event::get()->where('random_id', $id);
        $event_id = $events[0]->id;
        $teams = Team::get()->where('event_id', $event_id);
        if (empty($events)) {
            return view('/dashboard');
        } else {
            return view('event.show', ['events' => $events[0], 'teams' => $teams]);
            //dd($events, $teams);
        }
    }
}
