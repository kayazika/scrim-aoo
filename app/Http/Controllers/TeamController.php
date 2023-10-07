<?php

namespace App\Http\Controllers;
use App\Services\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function __construct(
        protected TeamService $teamService
    ){}

    //show event
    public function show($id)
    {
        $data = $this->teamService->show($id);
        return view('event.show', ['event' => $data[0], 'teams' => $data[1], 'rounds' => $data[2]]);
    }

    //call create teams view
    public function create($id)
    {
        $events = $this->teamService->create($id);
        return view('team.create', ['event' => $events]);
    }

    //store teams of respective event
    public function store(Request $request, $id)
    {
        $this->teamService->store($request, $id);
        return redirect('/event/show/' . $id);
    }

    public function delete($id, $team_id)
    {
        $this->teamService->delete($id, $team_id);
        return redirect('event/edit/' . $id);
    }
}
