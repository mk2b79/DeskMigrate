<?php

namespace API;

use GuzzleHttp\Client;

class TicketFetch
{
    private Client $client;
    private string $url;
    private string $token;

    public function __construct( string $url, string $token){
        $this->client = new Client();
        $this->url = $url;
        $this->token = $token;
    }

    private function Fetch():array
    {
        $tickets = [];


        return $tickets;
    }
}