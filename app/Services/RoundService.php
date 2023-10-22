<?php

namespace App\Services;

use App\Models\Event;
use App\Models\Round;
use App\Models\Team;
use App\Models\TotalRound;

class RoundService
{

    public function create($id): array
    {
        $event = Event::get()->where('id', $id)->toArray();
        $team = Team::get()->where('event_id', $id)->toArray();
        $teams = array_values($team);
        //dd($teams);
        return [$teams, $event];
    }

    public function calculatePoints($position): int
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
    public function maxKill($kill, $maxKill): int
    {
        if ($maxKill == 0) {
            return $kill;
        } elseif ($kill > $maxKill) {
            return $maxKill;
        } else {
            return $kill;
        }
    }

    public function round($id): int
    {

        $round_count = Round::get()->where('event_id', $id)->pluck('round')->last();
        //dd($round_count);
        if ($round_count == null) {
            $round = 1;
            return $round;
        } else {
            $round = $round_count + 1;
            return $round;
        }
    }

    public function sumRounds($total_round, $new_array): array
    {
        $result = array();

        // Iterate through the first array and add values to the result array
        foreach ($total_round as $item) {
            $teamId = $item['team_id'];
            if (!isset($result[$teamId])) {
                $result[$teamId] = $item;
            } else {
                $result[$teamId]['point'] += $item['point'];
                $result[$teamId]['kill'] += $item['kill'];
            }
        }

        // Iterate through the second array and add values to the result array
        foreach ($new_array as $item) {
            $teamId = $item['team_id'];
            if (!isset($result[$teamId])) {
                $result[$teamId] = $item;
            } else {
                $result[$teamId]['point'] += $item['point'];
                $result[$teamId]['kill'] += $item['kill'];
            }
        }

        // Convert the result associative array back to a numeric array
        $result = array_values($result);
        //dd($result);
        return $result;
    }

    public function totalRound($new_array): void
    {
        $total_round = TotalRound::where('event_id', $new_array[0]['event_id'])->get()->toArray();

        if (empty($total_round)) {
            foreach ($new_array as $data) {
                TotalRound::create([
                    'event_id' => $data['event_id'],
                    'team_id' => $data['team_id'],
                    'team_name' => $data['team_name'],
                    'kill' => $data['kill'],
                    'point' => $data['point'],
                ]);
            }
        } else {
            $total = $this->sumRounds($total_round, $new_array);
            foreach ($total as $data) {
                $total_round = TotalRound::where('event_id', $data['event_id'])->where('team_id', $data['team_id']);
                $total_round->update([
                    'kill' => $data['kill'],
                    'point' => $data['point'],
                ]);
            }
        }
    }
    public function store($id, $request): void
    {

        $round = $this->round($id);

        $team_count = count(Team::where('event_id', $id)->get()->toArray());

        $max_kill_request = Event::where('id', $id)->get(['max_kill']);

        $max_kill = $max_kill_request[0]->max_kill;

        $new_array = array();

        for ($i = 1; $i <= $team_count; $i++) {
            //get team id
            $team_id = $request->input('team_id_' . $i);
            //get team name
            $team_name = $request->input('team_name_' . $i);
            //get round kill
            $kill = $request->input('team_kill_' . $i);
            //check kill variable is null, if true kill receive 0
            if ($kill == null) {
                $kill = 0;
            }
            //get round position
            $position = $request->input('team_position_' . $i);
            //calculate max kill to sum at the posistion point
            $total_kill = $this->maxKill($kill, $max_kill);
            //calculate the points of team based on your position
            $position_points = $this->calculatePoints($position);
            //sum points + kills after all caculate max kill and position points
            $points = $position_points + $total_kill;
            //create a first round passing all information needed
            Round::create([
                'event_id' => $id,
                'team_id' => $team_id,
                'team_name' => $team_name,
                'kill' => $kill,
                'point' => $points,
                'round' => $round,
                'position' => $position
            ]);

            $new_array[] = array(
                'event_id' => $id,
                'team_id' => $team_id,
                'team_name' => $team_name,
                'kill' => $kill,
                'point' => $points,
            );
        }
        $this->totalRound($new_array);
    }
}
