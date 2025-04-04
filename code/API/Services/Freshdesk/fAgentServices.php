<?php

namespace API\Services\Freshdesk;

use API\Models\Freshdesk\AgentFd;
use API\Utilities\Client;


class fAgentServices
{
    private Client $client;

    public function __construct(Client $client){ $this->client = $client; }

    public function getOrCreateAgent(AgentFd $contact):AgentFd {

        $data=$this->client->Request("GET","/api/agents",[
            'query' => [
                'email' => $contact->getEmail()
            ]
        ]);
        if(empty($data)){
            return $this->createAgent($contact);
        }
        $data=array_shift($data);
        return new AgentFd(
            $data["id"],
            $data["contact"]["name"],
            $data["contact"]["email"],
            $data["contact"]["time_zone"],
            2
        );
    }
    private function createAgent(AgentFd $contact):AgentFd
    {
        $responseData= $this->client->Request("POST","/api/v2/agents",
            [
                "json"=>[
                    "name"=>$contact->getName(),
                    "email"=>$contact->getEmail(),
                    "ticket_scope"=>$contact->getTicketScoped() ?? 1
                ]
            ]
        );
        return new AgentFd(
            $responseData["id"],
            $responseData["contact"]["name"],
            $responseData["contact"]["email"],
            $responseData["contact"]["time_zone"],
            $responseData["ticket_scope"]
        );
    }
}