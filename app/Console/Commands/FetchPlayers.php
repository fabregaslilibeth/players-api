<?php

namespace App\Console\Commands;

use App\Models\Player;
use App\Services\PlayerDataSource;
use App\Services\Typicode;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

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

        //check if existing

        //store if not
        foreach (collect($players) as $player) {
                $newPlayer = Player::query()->firstOrNew([
                    'first_name' => $player['first_name'],
                    'second_name' => $player['second_name'],
                ]);

                //for new players, found in api but not in database
                if (! $newPlayer->exists) {
                    $newPlayer->first_name = $player['first_name'];
                    $newPlayer->second_name = $player['second_name'];
                }

                $newPlayer->save();
        }
    }
}
