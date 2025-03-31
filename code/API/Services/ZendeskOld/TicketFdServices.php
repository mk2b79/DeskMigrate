<?php

namespace API\Services\ZendeskOld;

use API\Models\Zendesk\TicketZd;
use GuzzleHttp\Client;

class TicketFdServices
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    public function getTickets():array
    {
        $userServices=new UsersZdServices($this->client);
        $organizationServices=new OrganizationsZdServices($this->client);
        $groupServices=new GroupsZdServices($this->client);

        $response = $this->client->request('GET',"/api/v2/tickets.json");
        $data = json_decode($response->getBody()->getContents(), true);
        $tickets = [];

        foreach ($data['tickets'] as $ticketData) {
          $ticket = new TicketZd(
              $ticketData["id"],
              $ticketData["description"],
              $ticketData["status"],
              $ticketData["priority"],
              $userServices->getUser($ticketData["assignee_id"]),
              $userServices->getUser($ticketData["requester_id"]),
              $ticketData["group_id"]!=null ? $groupServices->getGroup($ticketData["group_id"]) : null,
              $ticketData["organization_id"] !=null ? $organizationServices->getOrganization($ticketData["organization_id"]):null,
          );
          $tickets[]=$ticket;
        }
        return $tickets;
    }
}