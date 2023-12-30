<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\ApiResponseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Http\Resources\TeamResource;

class TeamController extends ApiResponseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::paginate(5);

        return $this->successResponse(TeamResource::collection($teams), 'OK', 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {


        $team = Team::create($request->all());

        return new TeamResource($team);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $team = Team::with('players')->find($id);

        if (!$team) {
            return $this->errorResponse(null, 404, 'Team not found.');
        }

        return $this->successResponse($team, 200, 'Team retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {


        $team->update($request->all());

        return new TeamResource($team);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return response()->json(['message' => 'Team deleted successfully']);
    }
}
