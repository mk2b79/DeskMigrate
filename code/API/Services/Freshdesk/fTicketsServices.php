<?php

namespace API\Services\Freshdesk;

use GuzzleHttp\Client;

class fTicketsServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }
}