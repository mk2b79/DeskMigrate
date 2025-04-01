<?php

use API\Services\Zendesk\zTicketsServices;
use API\Utilities\Client;
use AutoMapper\AutoMapper;

include __DIR__ . '/vendor/autoload.php';

$mapper=AutoMapper::create();

$zendeskUrl="https://relokia2482.zendesk.com";
$email='m.samchuk@relokia.com/token';
$token = "rPx8R6cfN9g2uEkwFGKOSmLvjNNhZc0BWvIT4cj1";

$zClient = new Client($zendeskUrl, $email, $token);

$ticketServices= new zTicketsServices($zClient);
$tickets= $ticketServices->fetchTicketsInclude();



//$freshdeskUrl="https://relokia-helpdesk.freshdesk.com";
//$freshdeskToken="Xbzgkvwt4xLhRAoRcwFd";
//$freshdeskClient = new Client([
//    'base_uri' => $freshdeskUrl,
//    'auth' => ["$freshdeskToken",""],
//    'headers' => ['Content-Type' => 'application/json']
//]);
//
//$fTicketServices= new \API\Services\Freshdesk\fTicketsServices($freshdeskClient);
//
//foreach ($tickets as $ticketZd) {
//    $fTicket=$mapper->map($ticketZd,\API\Models\Freshdesk\TicketFd::class);
//    $fTicketServices->createTicketInclude($fTicket);
//}


$test = '';



