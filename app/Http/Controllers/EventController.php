<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Round;
use App\Models\Team;
use Auth;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class EventController extends Controller
{
    //Create Event
    public function create()
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
    }
    //Delete Event Request
    public function destroy($id)
    {
        return redirect('/event/delete/' . $id);
    }
    //Delete Event Function
    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $team = Team::where('event_id', $id);
        $round = Round::where('event_id', $id);
        $event->delete();
        $team->delete();
        $round->delete();
        return redirect('/dashboard');
    }
    //Edit Event Show
    public function edit($id)
    {
        $events = Event::findOrFail($id);
        $teams = Team::where('event_id', $events->id)->get();
        //dd($events, $teams);
        return view('event.edit', ['events' => $events, 'teams' => $teams]);
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
    }

}
