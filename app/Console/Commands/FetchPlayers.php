<?php

namespace App\Console\Commands;

use App\Models\Player;
use App\Services\PlayerDataSource;
use Illuminate\Console\Command;

class FetchPlayers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch-players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch players';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $players = (new PlayerDataSource())->fetch();

        //get all players from API that doesnt exist in DB
        $newPlayers = collect($players)->filter(function ($player) {
            $newPlayer = Player::query()
                ->where('first_name', $player['first_name'])
                ->where('second_name', $player['second_name'])
                ->first();

            return ! $newPlayer;
        })->take(3);

        //save new players
        foreach ($newPlayers as $newPlayer) {
            Player::create([
                'first_name' => $newPlayer['first_name'],
                'second_name' => $newPlayer['second_name'],
                'form' => $newPlayer['form'],
                'total_points' => $newPlayer['total_points'],
                'influence' => $newPlayer['influence'],
                'creativity' => $newPlayer['creativity'],
                'threat' => $newPlayer['threat'],
                'ict_index' => $newPlayer['ict_index'],
            ]);
        }

        return count($newPlayers);
    }
}
