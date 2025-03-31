<?php

namespace API\Services\Zendesk;

use API\Models\Zendesk\OrganizationZd;
use API\Utilities\JsonDecode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class zOrganizationServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }

    /**
     * @throws GuzzleException
     */
    public function fetchOrganizationById(?int $id):?OrganizationZd {
        if($id === null){
            return null;
        }
        $data=JsonDecode::decode($this->client->get("/api/v2/organizations/{$id}"))["organization"];
        return new OrganizationZd(
            $data["id"],
            $data["name"]
        );
    }
}