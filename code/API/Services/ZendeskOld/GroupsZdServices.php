<?php

namespace API\Services\ZendeskOld;

use API\Models\Zendesk\GroupZd;
use GuzzleHttp\Client;

class GroupsZdServices
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    public function getGroup($id):GroupZd{
        if($id == null){
            throw new \Exception("Id is null");
        }
        $data=json_decode($this->client->request('GET',"/api/v2/groups/$id.json")->getBody()->getContents(),true)["group"];

        $group =new GroupZd(
            $data["id"],
            $data["description"] ?? "",
            $data["name"],
        );
        return $group;
    }


}