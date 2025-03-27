<?php

namespace API\Services\Zendesk;

use API\Model\Zendesk\Models\GroupZd;
use GuzzleHttp\Client;

class GroupZdServices
{
    private Client $client;

    function __construct(string $baseUrl,string $email,string $token)
    {
        $this->client = new Client([
            'base_uri' => $baseUrl,
            'auth' => [$email."/",$token],
            'headers' => ['Content-Type' => 'application/json']
        ]);
    }

    public function getGroup($id):GroupZd{
        if($id == null){
            throw new \Exception("Id is null");
        }
        $data=json_decode($this->client->request('GET',"groups/$id.json"))["group"];

        $group=new GroupZd(
            $data["id"],
            $data["name"],
        );

    }


}