<?php

namespace API\Services\Zendesk;

use API\Models\Freshdesk\CompanyFd;
use API\Models\Zendesk\FieldZd;
use API\Models\Zendesk\GroupZd;
use API\Models\Zendesk\OrganizationZd;
use API\Models\Zendesk\TicketZd;
use API\Models\Zendesk\UserZd;
use API\Utilities\Client;

class zTicketsServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }

    public function fetchTicketsInclude():array{
        $tickets = [];

        $page=1;

        do{
            $data= $this->client->Request("GET","/api/v2/tickets",[
                "query"=>[
                    "page"=>$page,
                    "include"=>"users,groups,organizations"
                ]
            ]);

            $users=array_column($data['users'],null,"id");
            $groups=array_column($data['groups'],null,"id");
            $organizations=array_column($data['organizations'],null,"id");

            foreach($data['tickets'] as $rawTicket){
                $tickets[] = new TicketZd(
                    $rawTicket["id"],
                    $rawTicket["subject"],
                    $rawTicket["description"],
                    $rawTicket["status"],
                    $rawTicket["priority"],
                    UserZd::fromArray($users[$rawTicket["assignee_id"]]),
                    UserZd::fromArray($users[$rawTicket["requester_id"]]),
                    $rawTicket["group_id"] != null ? GroupZd::fromArray($groups[$rawTicket["group_id"]]) : null,
                    $rawTicket["organization_id"] != null ? OrganizationZd::fromArray($organizations[$rawTicket["organization_id"]]) : null,
                    $rawTicket['custom_fields'] ?? []
                );
            }
            $page++;
        }
        while($data['next_page']!=null);
        return $tickets;
    }
    private function ticketFields (array $ticketFields):array{
        $fields=[];
        foreach($ticketFields as $field){
            $fields[] = FieldZd::fromArray($field);
        }
        return $fields;
    }
}