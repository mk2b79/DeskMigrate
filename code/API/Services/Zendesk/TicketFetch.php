<?php

namespace API\Services\Zendesk;



use API\Model\Zendesk\Models\TicketZd;
use API\Model\Zendesk\Models\UserZd;
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
          $ticket = new TicketZd(
              $ticketData["id"],
              $ticketData["description"],
              $ticketData["status"],
              $ticketData["priority"],
              $this->fetchUser($ticketData["assignee_id"]),
              $this->fetchUser($ticketData["requester_id"]),
              $ticketData["group_id"] ?? 0,
              $ticketData["group_id"] != 0 ? $this->fetchGroupsName($ticketData["group_id"]) : 'N/A',
              $ticketData["organization_id"] ?? 0,
              $ticketData["organization_id"] != 0 ? $this->fetchCompanyName($ticketData["organization_id"]) : 'N/A',

              $this->fetchComments($ticketData["id"]) ?? 'N/A',
          );
          $tickets[]=$ticket;
        }
        return $tickets;
    }

    private function fetchUser(int $id):UserZd
    {
        $response = $this->client->request('GET',"$this->url/users/$id.json");

        $userData = json_decode($response->getBody()->getContents(), true)["user"];

        $user = new UserZd(
            $id,
            $userData["email"],
            $userData["name"]
        );
        return $user;
    }
    private function fetchGroupsName(int $id):string{
        $response = $this->client->request('GET',"$this->url/groups/$id.json");
        $data = json_decode($response->getBody()->getContents(), true)["group"];
        return $data["name"];
    }

    private function fetchCompanyName(int $id):string{
        $response = $this->client->request('GET',"$this->url/groups/$id.json");
        $data = json_decode($response->getBody()->getContents(), true)["group"];
        return $data["name"];
    }

    private function fetchComments(int $id):string{
        $response = $this->client->request('GET',"$this->url/tickets/{$id}/comments.json");
        $data=json_decode($response->getBody()->getContents(), true)["comments"];
        $commentStr="";
        if($data==null){
            return "N/A";
        }
        foreach ($data as $commentData) {
            $commentData=$commentData["body"];
        }
        return $commentStr;
    }

}