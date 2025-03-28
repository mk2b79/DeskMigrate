<?php

namespace API\Services\Zendesk;

use API\Models\Zendesk\UserZd;
use GuzzleHttp\Client;

class UsersZdServices
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

//    public function __construct(
//        private string $url,
//        private string $email,
//        private string $token
//    ){
//        $this->client = new Client([
//            'base_uri' => $this->url,
//            'auth' => ["$this->email/token", $this->token],
//            'headers' => ['Content-Type' => 'application/json']
//        ]);
//    }
    public function getUser(int $id):UserZd
    {
        $response = $this->client->request('GET',"/api/v2/users/$id");

        $userData = json_decode($response->getBody()->getContents(), true)["user"];

        $user = new UserZd(
            $id,
            $userData["email"],
            $userData["name"],
            $userData["time_zone"]
        );
        return $user;
    }
}