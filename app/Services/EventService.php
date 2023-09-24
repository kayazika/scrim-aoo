<?php

namespace App\Services;
use App\Models\Event;
use App\Models\Round;
use App\Models\Team;

class EventService
{

    public function listEvent()
    {
        $id = auth()->user()->id;
        $events = Event::get()->where('user_id', $id);
        return $events;
    }

    public function newEvent($data)
    {
        //dd($data);
        $random_id = random_int(0000, 9999);
        Event::create([
            'name' => $data->name,
            'max_kill' => $data->kill,
            'description' => $data->description,
            'user_id' => auth()->user()->id,
            'random_id' => $random_id
        ]);
    }

    public function editEvent($id)
    {
        $events = Event::findOrFail($id);
        $teams = Team::where('event_id', $events->id)->get();
        $data = [$events, $teams];
        return $data;
    }

    public function updateEvent($request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update([
            'name' => $request->name,
            'max_kill' => $request->kill,
            'description' => $request->description
        ]);
    }

    public function deleteEvent($id): void
    {
        $event = Event::findOrFail($id);
        $team = Team::where('event_id', $id);
        $round = Round::where('event_id', $id);
        $event->delete();
        $team->delete();
        $round->delete();
    }
}
