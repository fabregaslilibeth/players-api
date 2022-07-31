<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Artisan;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $players = Player::paginate(15);

        return view('players.index', ['players' => $players]);
    }

    /**
     * Display the specified resource.
     *
     * @param Player $player
     * @return Application|Factory|View
     */
    public function show(Player $player)
    {
        return view('players.show', ['player' => $player]);
    }
}
