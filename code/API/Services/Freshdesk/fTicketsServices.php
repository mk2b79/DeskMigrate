<?php

namespace API\Services\Freshdesk;

use API\Models\Freshdesk\TicketFd;
use API\Utilities\Client;


class fTicketsServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }

    public function createTicketsInclude(array &$tickets): void
    {
        foreach ($tickets as $ticket) {
            self::createTicketInclude($ticket);
        }
    }

    private function createTicketInclude(TicketFd $ticket):void {
       $agentService=new fAgentServices($this->client);
       $contactService=new fContactServices($this->client);
       $companyService=new fCompanyServices($this->client);
       $groupService=new fGroupServices($this->client);

       $group = $groupService->getOrGroupCompany($ticket->getGroup());
       $company = $companyService->getOrCreateCompany($ticket->getCompany());
       $agent= $agentService->getOrCreateAgent($ticket->getAgent());
       $contact = $contactService->getOrCreateContact($ticket->getContact());


       $this->client->Request("POST","/api/v2/tickets",
           [
               'json' => [
                   "description" => $ticket->getDescription(),
	                "subject"=>$ticket->getSubject(),
                    "group_id"=>$group->getId(),
                    "company_id"=> $company == null ? null : $company->getId(),
	                "email"=>$contact->getEmail(),
	                "priority"=> $ticket->getPriority(),
	                "status"=>$ticket->getStatus()
               ]
           ]
       );

    }
}