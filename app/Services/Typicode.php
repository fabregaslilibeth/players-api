<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Typicode implements PlayerDataSource
{
    public function fetch()
    {
        return Http::get($this->endpoint())->json();
    }

    protected function endpoint(): string
    {
        $apiKey = config('services.clients.bestBuy.key');

        return "https://my-json-server.typicode.com/fabregaslilibeth/demo/players";
    }
}
