<?php

namespace App\Http\Controllers;

use App\Services\EventService;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function __construct(
        protected EventService $eventService
    ){}

    //Create Event
    public function create()
    {
        return view('event.create');
    }

    //Store Event
    public function store(Request $request)
    {
        $this->eventService->newEvent($request);
        return redirect('/dashboard');
    }

    //List Event
    public function list()
    {
        $events = $this->eventService->listEvent();
        return view('dashboard', ['event' => $events]);
    }

    //Delete Event Request
    public function destroy($id)
    {
        return redirect('/event/delete/' . $id);
    }

    //Delete Event Function
    public function delete($id)
    {
        $this->eventService->deleteEvent($id);
        return redirect('/dashboard');
    }

    //Edit Event Show
    public function edit($id)
    {
        $data = $this->eventService->editEvent($id);
        $events = $data[0];
        $teams = $data[1];
        return view('event.edit', ['event' => $events, 'teams' => $teams]);
    }

    //Update Event
    public function update(Request $request, $id)
    {
        $this->eventService->updateEvent($request, $id);
        return redirect('event/show/' . $id);
    }

}
