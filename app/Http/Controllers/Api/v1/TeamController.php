<?php
namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Http\Resources\TeamResource;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

class TeamController extends Controller
{



    public function index()
    {
        try {
            $teams = Team::paginate(5);

            return response()->json(TeamResource::collection($teams));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching teams'], 500);
        }
    }

    public function show(Team $team)
    {
        try {
            return response()->json(new TeamResource($team));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Team not found'], 404);
        }
    }

    public function store(StoreTeamRequest $request)
    {
        try {
            Team::create($request->validated());

            return response()->json(['message' => 'Team created successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating team'], 500);
        }
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        try {

            $team->update($request->validated());
            return response()->json(new TeamResource($team));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Team not found'], 404);
        }
    }

    public function destroy(Team $team)
    {
        try {

            $team->delete();
            return response()->json(['message' => 'Team deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Team not found'], 404);
        }
    }
}
