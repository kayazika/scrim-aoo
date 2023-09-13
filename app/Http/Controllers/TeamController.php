<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Event;
use App\Models\Round;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeamController extends Controller
{

    //show event
    public function show(Request $request, $id)
    {
        //get teams data
        $teams = Team::get()->where('event_id', $request->id)->toArray();
        //get event data
        $events = Event::get()->where('id', $request->id)->first();
        //get round data
        $rounds = Round::where('event_id', $id)->orderBy('point', 'DESC',)->orderBy('kill', 'DESC',)->get()->toArray();
        //return view with data of event and teams
        return view('event.show', ['teams' => $teams, 'events' => $events, 'rounds' => $rounds]);
    }

    //call create teams view
    public function create(Request $request)
    {
        //get event data
        $events = Event::get()->where('id', $request->id)->first();
        $teams = Team::where('event_id', $events->id)->get();
        //return view with event data
        return view('team.create', ['events' => $events, 'teams' => $teams]);
    }

    //store teams of respective event
    public function store(Request $request, $id)
    {
        //iterator to create teams
        $i = 0;
        while ($i++ < 20) {
            if ($request->input('team_name_' . $i) == null) {
                break;
            } else {
                Team::create([
                    'team_name' => $request->input('team_name_' . $i),
                    'event_id' => $id,
                ]);
            }
        }
        //return to event view
        return redirect('/event/show/' . $id);
    }

    public function delete($id, $team_id)
    {
        $team = Team::where('id', $team_id);
        $round = Round::where('team_id', $team_id);
        if(empty($round)){
            $team->delete();
        } else {
            $team->delete();
            $round->delete();
        }

        return redirect('event/edit/' . $id);
    }
}
