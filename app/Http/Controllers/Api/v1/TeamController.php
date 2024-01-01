<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Http\Resources\TeamResource;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

class TeamController extends Controller
{


    public function index()
    {
        $teams = Team::paginate(5);

        return response()->json(TeamResource::collection($teams));
    }

    public function show(Team $team)
    {
        return response()->json(new TeamResource($team));

    }

    public function store(StoreTeamRequest $request)
    {

        Team::create($request->validated());

        return response()->json(['message' => 'Created',201]);

    }

    public function update(UpdateTeamRequest $request, Team $team)
    {

        $team->update($request->validated());
        return response()->json(['message' => 'Updated'], 202,);
    }

    public function destroy(Team $team)
    {
            $team->delete();
            return response()->noContent();
    }
}
