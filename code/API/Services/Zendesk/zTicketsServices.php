<?php

namespace API\Services\Zendesk;

use API\Models\Zendesk\TicketZd;
use API\Models\Zendesk\UserZd;
use API\Utilities\JsonDecode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class zTicketsServices
{
    private Client $client;
    public function __construct(Client $client){ $this->client = $client; }

    /**
     * @throws GuzzleException
     */
    public function fetchTicketsInclude():array{
        $tickets = [];

        $userServices=new zUserServices($this->client);
        $groupServices=new zGroupsServices($this->client);
        $organizationServices=new zOrganizationServices($this->client);

        $page=1;

        do{
            $data=JsonDecode::decode($this->client->get("/api/v2/tickets?page=$page"));
            foreach($data['tickets'] as $rawTicket){
                $tickets[] = new TicketZd(
                    $rawTicket["id"],
                    $rawTicket["subject"],
                    $rawTicket["description"],
                    $rawTicket["status"],
                    $rawTicket["priority"],
                    $userServices->fetchUserById($rawTicket["assignee_id"]),
                    $userServices->fetchUserById($rawTicket["requester_id"]),
                    $groupServices->fetchGroupById($rawTicket["group_id"]),
                    $organizationServices->fetchOrganizationById($rawTicket["organization_id"]),
                );
            }
            $page++;
        }
        while($data['next_page']!=null);
        return $tickets;
    }
}