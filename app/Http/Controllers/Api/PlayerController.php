<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePlayerRequest;
use App\Models\Player;
use Illuminate\Support\Facades\Artisan;

class PlayerController extends Controller
{
    public function index()
    {
        return Player::all();

    }

    public function store(StorePlayerRequest $request)
    {
        Player::create($request->all());

        return response()->json(['message' => 'ok']);
    }

    /**
     * Fetch players from the specified API.
     *
     */
    public function fetch()
    {
        $fetchCount = Artisan::call('fetch-players');

        return response()->json(['players_count' => $fetchCount]);
    }
}
