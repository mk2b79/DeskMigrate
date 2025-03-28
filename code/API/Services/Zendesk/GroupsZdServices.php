<?php

namespace API\Services\Zendesk;

use API\Models\Zendesk\GroupZd;
use GuzzleHttp\Client;

class GroupsZdServices
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

    public function getGroup($id):GroupZd{
        if($id == null){
            throw new \Exception("Id is null");
        }
        $data=json_decode($this->client->request('GET',"/api/v2/groups/$id.json")->getBody()->getContents(),true)["group"];

        $group =new GroupZd(
            $data["id"],
            $data["created_at"],
            $data["updated_at"],
            $data["description"] ?? "",
            $data["name"],

        );
        return $group;
    }


}