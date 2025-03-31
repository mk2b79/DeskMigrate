<?php

namespace API\Services\ZendeskOld;

use API\Models\Zendesk\UserZd;
use GuzzleHttp\Client;

class UsersZdServices
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    public function getUser(int $id):UserZd
    {
        $response = $this->client->request('GET',"/api/v2/users/$id");

        $userData = json_decode($response->getBody()->getContents(), true)["user"];

        $user = new UserZd(
            $id,
            $userData["email"],
            $userData["name"],
            $userData["time_zone"],
            $userData["organization_id"]
        );
        return $user;
    }
}