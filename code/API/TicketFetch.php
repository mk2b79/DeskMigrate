<?php

namespace API;

use GuzzleHttp\Client;

class TicketFetch
{
    private Client $client;
    private string $url;
    private string $token;

    public function __construct( string $url, string $token){
        $this->client = new Client();
        $this->url = $url;
        $this->token = $token;
    }

    public function Fetch():array
    {

        $response = $this->client->get("{$this->url}/tickets.json", [
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
                'Accept' => 'application/json'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        $tickets = [];

        foreach ($data['tickets'] as $ticketData) {
            $tickets[] = new Ticket(
                $ticketData['id'],
                $ticketData['description'] ?? '',
                $ticketData['status'],
                $ticketData['priority'] ?? 'N/A',
                $ticketData['assignee_id'] ?? 0,
                $ticketData['requester_id'] ?? 0,
                $ticketData['submitter_id'] ?? 0,
                $ticketData['organization_id'] ?? null,
                $ticketData['group_id'] ?? null,
                $ticketData['created_at'],
                $ticketData['updated_at'],
                implode(', ', $ticketData['tags'] ?? [])
            );
        }
        return $tickets;
    }
}