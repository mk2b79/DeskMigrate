<?php

use AutoMapper\AutoMapper;
use GuzzleHttp\Client;

include __DIR__ . '/vendor/autoload.php';

$zendeskUrl="https://relokia2482.zendesk.com";
$email='m.samchuk@relokia.com';
$token = "rPx8R6cfN9g2uEkwFGKOSmLvjNNhZc0BWvIT4cj1";
$zendeskClient = new Client([
    'base_uri' => $zendeskUrl,
    'auth' => ["$email/token", $token],
    'headers' => ['Content-Type' => 'application/json']
]);

$freshdeskUrl="https://relokia-helpdesk.freshdesk.com";
$freshdeskToken="Xbzgkvwt4xLhRAoRcwFd";
$freshdeskClient = new Client([
    'base_uri' => $freshdeskUrl,
    'auth' => ["$freshdeskToken",""],
    'headers' => ['Content-Type' => 'application/json']
]);
$mapper=AutoMapper::create();

$ticketServices=new \API\Services\Zendesk\zTicketsServices($zendeskClient);
$tickets= $ticketServices->fetchTicketsInclude();

$fTicketServices= new \API\Services\Freshdesk\fTicketsServices($freshdeskClient);

foreach ($tickets as $ticketZd) {
    $fTicket=$mapper->map($ticketZd,\API\Models\Freshdesk\TicketFd::class);
    $fTicketServices->createTicketInclude($fTicket);
}

$test = '';



