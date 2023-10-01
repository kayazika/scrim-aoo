<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Event;
use App\Models\Team;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    //Call create new round view
    public function create($id)
    {
        $events = Event::get()->where('id', $id)->first();
        $team = Round::get()->where('event_id', $id)->toArray();
        $teams = array_values($team);
        $event_id = $id;

        if (empty($teams)) {
            $team = Team::get()->where('event_id', $id)->toArray();
            $teams = array_values($team);
            return view('round.create', ['teams' => $teams, 'event_id' => $event_id, 'events' => $events]);
        }
        return view('round.create', ['teams' => $teams, 'event_id' => $event_id, 'events' => $events]);
    }

    //Calcule points based on team position
    public function calculatePoints($position)
    {
        if ($position >= 16) {
            return 0;
        } elseif ($position >= 11) {
            return 1;
        } elseif ($position >= 8) {
            return 2;
        } elseif ($position >= 6) {
            return 3;
        } elseif ($position == 5) {
            return 4;
        } elseif ($position == 4) {
            return 5;
        } elseif ($position == 3) {
            return 7;
        } elseif ($position == 2) {
            return 9;
        } else {
            return 12;
        }
    }

    //Calcule max kill
    public function maxKill($kill, $maxKill)
    {
        if ($maxKill == 0) {
            return $kill;
        } elseif ($kill > $maxKill) {
            return $maxKill;
        } else {
            return $kill;
        }
    }

    public function matchPoint($actual_team_point, $position)
    {
        if($actual_team_point >= 50 && $position == 1){
            return 1;
        } else{
            return 0;
        }
    }

    //Store rounds
    public function store($id, Request $request)
    {
        //dd($request->all());
        //if has one or more rounds stored
        if (array_key_exists('actual_team_kill_1', $request->input())) {
            //Count teams to stop iterator
            $team_count = count($request->all());
            //get a exactly team number removing _token
            $team_count_exactly = ($team_count - 1) / 6;
            //Get max kill for event
            $max_kill_request = Event::where('id', $id)->get(['max_kill']);
            //Tranform the requent in a integer number
            $max_kill = $max_kill_request[0]->max_kill;

            //loop to get number of input and store team of team round update
            for ($i = 1; $i <= $team_count_exactly; $i++) {
                //get team id
                $team_id = $request->input('team_id_' . $i);
                //get team kill for new round
                $kill = $request->input('team_kill_' . $i);
                //check kill variable is null, if true kill receive 0
                if ($kill == null){
                    $kill = 0;
                    return $kill;
                }
                //get position for new round
                $position = $request->input('team_position_' . $i);
                //calculate max kill to sum at the posistion point
                $total_kill = $this->maxKill($kill, $max_kill);
                //calculate the points of team based on your position
                $position_points = $this->calculatePoints($position);
                //sum points + kills after all caculate max kill and position points
                $points = $position_points + $total_kill;
                //get actual team points
                $actual_team_point = $request->input('actual_team_point_' . $i);
                //check match point winner
                $match_point_winner = $this->matchPoint($actual_team_point, $position);
                //sum actual team points with new round points
                $point_sum = $points + $actual_team_point;
                //get actual team kills
                $actual_team_kill = $request->input('actual_team_kill_' . $i);
                //sum actual team kills with new round kills
                $kill_sum = $kill + $actual_team_kill;
                //create db update variable
                $round = Round::where('event_id', $id)->where('team_id', $team_id);
                //call and execute the update
                $round->update([
                    'kill' => $kill_sum,
                    'point' => $point_sum,
                    'match_point_winner' => $match_point_winner
                ]);
            }
            //return to event displaing update table
            return redirect('/event/show/' . $id);

        //if dont have a round created
        } else {
            //Count teams to stop iterator
            $team_count = count($request->all());
            //get a exactly team number removing _token
            $team_count_exactly = ($team_count - 1) / 4;
            //Get max kill for event
            $max_kill_request = Event::where('id', $id)->get(['max_kill']);
            //Tranform the requent in a integer number
            $max_kill = $max_kill_request[0]->max_kill;
            //loop to get number of input and store team of team round update
            for ($i = 1; $i <= $team_count_exactly; $i++) {
                //get team id
                $team_id = $request->input('team_id_' . $i);
                //get team name
                $team_name = $request->input('team_name_' . $i);
                //get round kill
                $kill = $request->input('team_kill_' . $i);
                //check kill variable is null, if true kill receive 0
                if ($kill == null){
                    $kill = 0;
                 }
                //get round positio
                $postion = $request->input('team_position_' . $i);
                //calculate max kill to sum at the posistion point
                $total_kill = $this->maxKill($kill, $max_kill);
                //calculate the points of team based on your position
                $position_points = $this->calculatePoints($postion);
                //sum points + kills after all caculate max kill and position points
                $points = $position_points + $total_kill;
                //create a first round passing all information needed
                Round::create([
                    'event_id' => $id,
                    'team_id' => $team_id,
                    'team_name' => $team_name,
                    'kill' => $kill,
                    'point' => $points,
                    'match_point_winner' => 0
                ]);
            }
            //return to event displaing update table
            return redirect('/event/show/' . $id);

        }
    }
}
