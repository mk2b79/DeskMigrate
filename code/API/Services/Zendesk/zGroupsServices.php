<?php

namespace API\Services\Zendesk;

use API\Models\Zendesk\GroupZd;
use API\Utilities\JsonDecode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class zGroupsServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }

    /**
     * @throws GuzzleException
     */
    public function fetchGroupById(?int $id):?GroupZd {
        if($id === null){
            return null;
        }
        $data=JsonDecode::decode($this->client->get("/api/v2/groups/{$id}"))['group'];
        return new GroupZd(
            $data["id"],
            $data["description"],
            $data["name"]
        );
    }
}