<?php

namespace API\Services\ZendeskOld;

use API\Models\Zendesk\OrganizationZd;
use GuzzleHttp\Client;

class OrganizationsZdServices
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getOrganization($id):OrganizationZd{
        if($id == null){
            throw new \Exception("Id is null");
        }
        $data=json_decode($this->client->request('GET',"/api/v2/organizations/$id.json")->getBody()->getContents(),true)["organization"];

        $organization =new OrganizationZd(
            $data["id"],
            $data["created_at"],
            $data["updated_at"],
            $data["notes"] ?? "",
            $data["name"],

        );
        return $organization;
    }
}