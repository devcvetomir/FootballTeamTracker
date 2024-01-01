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

        $query = Player::query();

        $sortableColumns = ['name', 'position', 'age', 'nationality', 'goals_season', 'id'];

        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');

        if (in_array($sort, $sortableColumns)) {
            $query->orderBy($sort, $direction);
        }

        $filters = ['name', 'position', 'age', 'nationality', 'goals_season'];
        foreach ($filters as $filter) {
            $query->when($request->filled($filter), function ($query) use ($filter, $request) {
                return $query->where($filter, $request->input($filter));
            });
        }

        $players = $query->paginate(5);

        return PlayerResource::collection($players);

    }

    public function store(StorePlayerRequest $request)
    {
        Player::create($request->validated());

        return response()->json(['message' => 'Created', 201]);

    }

    public function show(Player $player)
    {
        return new PlayerResource($player);
    }

    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $player->update($request->validated());

        return response()->json(['message' => 'Updated'], 202,);

    }

    public function destroy(Player $player)
    {

        $player->delete();

        return response()->json(['message' => 'Deleted',204]);
    }

}
