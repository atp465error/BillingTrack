<?php

namespace FI\Events;

use FI\Modules\Clients\Models\Client;
use Illuminate\Queue\SerializesModels;

class ClientCreated extends Event
{
    use SerializesModels;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}