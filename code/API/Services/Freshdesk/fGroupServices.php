<?php

namespace API\Services\Freshdesk;

use API\Models\Freshdesk\GroupFd;
use API\Utilities\Client;

class fGroupServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }

    public function getOrGroupCompany(?GroupFd $group):?GroupFd {

        if($group === null){
            return null;
        }

        $data =$this->client->Request("GET","/api/v2/groups");

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

    private function createGroup(GroupFd $companyFd):GroupFd
    {
        $responseData=$this->client->Request("POST","/api/v2/groups",
            [
                "json"=>[
                    "name"=>$companyFd->getName(),
                    "description"=>$companyFd->getDescription()
                ]
            ]
        );

        return new GroupFd(
            $responseData["id"],
            $responseData["description"],
            $responseData["name"]
        );

    }
}