<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;

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

    public function destroy(Player $player)
    {
        $player->delete();

        return back();
    }

    public function search()
    {
        //search that student in Database
        $player = Player::find(request('q'));

        if (! $player) {
            return \redirect()->back()->withErrors(['message' => 'Player does not exist.']);
        }

        return Redirect::route('players.show', ['player' => $player]);
    }
}
