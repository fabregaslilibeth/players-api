<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PlayerDataSource
{
    public function fetch()
    {
        return Http::get($this->endpoint())->json();
    }

    protected function endpoint(): string
    {
        return config('services.clients.endpoint');
    }
}
