<?php

namespace App\Services;
use App\Models\Event;
use App\Models\Round;
use App\Models\Team;

class TeamService
{
    public function show($id)
    {
        $events = Event::get()->where('id', $id)->first();
        $teams = Team::get()->where('event_id', $id)->toArray();
        $rounds = Round::where('event_id', $id)->orderBy('point', 'DESC',)->orderBy('kill', 'DESC',)->get()->toArray();
        $data = [$events, $teams, $rounds];
        return $data;
    }

    public function create($id)
    {
        $data = Event::get()->where('id', $id)->first();
        return $data;
    }
     public function store($request, $id)
    {
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
    }
}
