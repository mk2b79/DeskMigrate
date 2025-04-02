<?php

namespace API\Services\Freshdesk;

use API\Models\Freshdesk\CompanyFd;
use API\Utilities\Client;

class fCompanyServices
{
    private Client $client;

    public function __construct(Client $client){ $this->client = $client; }

    public function getOrCreateCompany(?CompanyFd $company):?CompanyFd {

        if($company === null){
            return null;
        }

        $data= $this->client->Request("GET","/api/v2/companies/autocomplete?name={}",
            [
                'query' => [
                    'name'=>$company->getName()
                ]
            ])["companies"];

        $data=array_shift($data);

        if(empty($data)){
            return $this->createCompany($company);
        }

        return new CompanyFd(
            $data["id"],
            $data["name"]
        );

    }
    private function createCompany(CompanyFd $companyFd):CompanyFd
    {

        $responseData=$this->client->Request("POST","/api/v2/companies",
            [
                "json"=>[
                    "name"=>$companyFd->getName()
                ]
            ]
        );

        return new CompanyFd(
            $responseData["id"],
            $responseData["name"]
        );
    }
}