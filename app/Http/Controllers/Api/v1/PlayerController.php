<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;
use App\Http\Resources\PlayerResource;
use App\Http\Requests\PlayerFilterRequest;

class PlayerController extends Controller
{
    public function index(PlayerFilterRequest $request)
    {
        try {
            $query = Player::query();

            $sortableColumns = ['name', 'position', 'age', 'nationality', 'goals_season', 'id'];

            // Apply sorting based on query parameters
            $sort = $request->input('sort', 'id');
            $direction = $request->input('direction', 'asc');

            // Ensure the column is sortable
            if (in_array($sort, $sortableColumns)) {
                $query->orderBy($sort, $direction);
            }

            $filters = ['name', 'position', 'age', 'nationality', 'goals_season'];
            foreach ($filters as $filter) {
                $query->when($request->filled($filter), function ($query) use ($filter, $request) {
                    return $query->where($filter, $request->input($filter));
                });
            }

            // Pagination
            $players = $query->paginate(5);

            return PlayerResource::collection($players);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching players'], 500);
        }
    }

    public function store(StorePlayerRequest $request)
    {
        try {
            $player = Player::create($request->validated());

            return response()->json(['message' => 'Player Created']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating player'], 500);
        }
    }

    public function show(Player $player)
    {
        return new PlayerResource($player);
    }

    public function update(UpdatePlayerRequest $request, Player $player)
    {
        try {
            $player->update($request->validated());

            return response()->json(['message' => 'Updated'], 202,);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating player'], 500);
        }
    }

    public function destroy(Player $player)
    {
        try {
            $player->delete();

            return response()->json(['message' => 'Player deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting player'], 500);
        }
    }
}
