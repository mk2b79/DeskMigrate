<?php

namespace API\Services\Freshdesk;

use API\Models\Freshdesk\ContactFd;
use API\Utilities\Client;

class fContactServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }


    public function getOrCreateContact(ContactFd $contact):ContactFd {

        $data=$this->client->Request("GET","/api/v2/contacts",
            [
                'query' => [
                    'email' => $contact->getEmail(),
                ]
            ]);

        if(empty($data)){
            return $this->createContact($contact);
        }

        return new ContactFd(
            $data[0]["id"],
            $data[0]["name"],
            $data[0]["email"],
            $data[0]["time_zone"],
            $data[0]["company_id"]
        );

    }
    private function createContact(ContactFd $contact):ContactFd
    {

        $responseData=$this->client->Request("POST","/api/v2/contacts",
            [
                "json"=>[
                    "name"=>$contact->getName(),
                    "email"=>$contact->getEmail(),
                    "company_id"=>$contact->getCompanyId()
                ]
            ]
        );

        return new ContactFd(
            $responseData["id"],
            $responseData["name"],
            $responseData["email"],
            $responseData["time_zone"],
            $responseData["company_id"]
        );

    }
}