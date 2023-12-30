<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\ApiResponseController;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Http\Resources\PlayerResource;
use App\Http\Resources\PlayerCollection;
use App\Http\Requests\PlayerFilterRequest;

class PlayerController extends ApiResponseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(PlayerFilterRequest $request)
    {
        $query = Player::query();

        if ($request->has('order_by') && $request->has('order_direction')) {
            $query->orderBy($request->input('order_by'), $request->input('order_direction') ?? '');
            // TODO
        }
        $players = $query->paginate(10);
        return $this->successResponse(PlayerResource::collection($players),'ok',200);
    }

    public function store(StorePlayerRequest $request)
    {
        $player = Player::create($request->validated());

        return $this->successResponse($player,'Player Added',201);
    }


    public function show(Player $player)
    {

        return new PlayerResource($player);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {

        $player->update($request->all());

        return new PlayerResource($player);
    }


    public function destroy(Player $player)
    {
        $player->delete();
        return response()->json(['message' => 'Player deleted successfully']);
    }
}
