<?php

namespace API\Services\Freshdesk;

use API\Models\Freshdesk\CompanyFd;
use API\Models\Freshdesk\ContactFd;
use API\Utilities\JsonDecode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class fContactServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }

    /**
     * @throws GuzzleException
     */
    public function getOrCreateCompany(ContactFd $contact):ContactFd {
        $data=JsonDecode::decode($this->client->get("/api/v2/contacts?email={$contact->getEmail()}"));
        if(empty($data)){
            return $this->createCompany($contact);
        }
        return new ContactFd(
            $data[0]["id"],
            $data[0]["name"],
            $data[0]["email"],
            $data[0]["time_zone"],
            $data[0]["company_id"]
        );
    }

    /**
     * @throws GuzzleException
     */
    private function createCompany(ContactFd $contact):ContactFd
    {
        $responseData=JsonDecode::decode($this->client->post("/api/v2/contacts",
            [
                "json"=>[
                    "name"=>$contact->getName(),
                    "email"=>$contact->getEmail(),
                    "company_id"=>$contact->getCompanyId()
                ]
            ]
        ));
        return new ContactFd(
            $responseData["id"],
            $responseData["name"],
            $responseData["email"],
            $responseData["time_zone"],
            $responseData["company_id"]
        );
    }
}