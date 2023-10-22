<?php

namespace App\Http\Controllers;
use App\Services\RoundService;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    public function __construct(
        protected RoundService $roundService
    ) {}

    public function create($id)
    {
        $data = $this->roundService->create($id);
        return view('round.create', ['teams' => $data[0], 'event' => $data[1][0]]);
    }

    public function store($id, Request $request)
    {
        $this->roundService->store($id, $request);
        return redirect('/event/show/' . $id);
    }
}
