<?php

namespace API\Utilities;

class Client
{
    public \GuzzleHttp\Client $client;

    public function __construct(string $baseUrl,string $email,string $password)
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $baseUrl,
            'auth'     => [$email, $password],
            'headers'  => ['Content-Type' => 'application/json']
        ]);
    }
    public function Request(string $method,string $url,array $params=[]): array
    {
        $response = $this->client->request($method, $url, $params);

        return json_decode($response->getBody()->getContents(), true);
    }

}