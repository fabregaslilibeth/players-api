<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePlayerRequest;
use App\Models\Player;

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
}
