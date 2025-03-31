<?php

namespace API\Services\Zendesk;

use API\Models\Zendesk\UserZd;
use API\Utilities\JsonDecode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class zUserServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }

    /**
     * @throws GuzzleException
     */
    public function fetchUserById(?int $id):?UserZd {
        if($id === null){
            return null;
        }
        $data=JsonDecode::decode($this->client->get("/api/v2/users/{$id}"))['user'];
        return new UserZd(
            $data["id"],
            $data["name"],
            $data["email"],
            $data["time_zone"],
            $data["organization_id"]
        );
    }
}