<?php

namespace API;



use GuzzleHttp\Client;

class TicketFetch
{
    private Client $client;
    private string $url;
    private string $email;
    private string $token;

    public function __construct( string $url,string $email, string $token){
        $this->url = $url;
        $this->token = $token;
        $this->email = $email;

        $this->client = new Client([

            'base_uri' => $url,
            'auth' => ["$email/token", $token],
            'headers' => ['Content-Type' => 'application/json']

        ]);

    }

    public function Fetch():array
    {

        $response = $this->client->request('GET',"$this->url/tickets.json");

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