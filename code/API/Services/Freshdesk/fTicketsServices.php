<?php

namespace API\Services\Freshdesk;

use API\Models\Freshdesk\TicketFd;
use GuzzleHttp\Client;

class fTicketsServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }

    public function createTicketInclude(TicketFd $ticket){
       $agentService=new fAgentServices($this->client);
       $contactService=new fContactServices($this->client);
       $companyService=new fCompanyServices($this->client);
       $groupService=new fGroupServices($this->client);

       $group = $groupService->getOrGroupCompany($ticket->getGroup());
       $company = $companyService->getOrCreateCompany($ticket->getCompany());
       $agent= $agentService->getOrCreateAgent($ticket->getAgent());
       $contact = $contactService->getOrCreateCompany($ticket->getContact());


       $this->client->post("/api/v2/tickets",
           [
               'json' => [
                   "description" => $ticket->getDescription(),
	                "subject"=>$ticket->getSubject(),
                    "group_id"=>$group->getId(),
                    "company_id"=>$company===null ? null : $company->getId(),
	                "email"=>$contact->getEmail(),
	                "priority"=> $ticket->getPriority(),
	                "status"=>$ticket->getStatus(),
	                "cc_emails"=> [$agent->getEmail()],
               ]
           ]
       );
    }
}