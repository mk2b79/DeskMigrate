<?php

namespace API\Services\Freshdesk;

use API\Models\Freshdesk\GroupFd;
use API\Utilities\JsonDecode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class fGroupServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }


    /**
     * @throws GuzzleException
     */
    public function getOrGroupCompany(?GroupFd $group):?GroupFd {
        if($group === null){
            return null;
        }
        $data = JsonDecode::decode($this->client->get("/api/v2/groups"));

        $data= array_column($data, null, 'name');

        if(isset($data[$group->getName()])){
            $rawGroup = $data[$group->getName()];
            return new GroupFd(
                $rawGroup["id"],
                $rawGroup["description"],
                $rawGroup["name"],
            );
        }
        return $this->createGroup($group);
    }

    /**
     * @throws GuzzleException
     */
    private function createGroup(GroupFd $companyFd):GroupFd
    {
        $responseData=JsonDecode::decode($this->client->post("/api/v2/groups",
            [
                "json"=>[
                    "name"=>$companyFd->getName(),
                    "description"=>$companyFd->getDescription()
                ]
            ]
        ));
        return new GroupFd(
            $responseData["id"],
            $responseData["description"],
            $responseData["name"]
        );
    }
}