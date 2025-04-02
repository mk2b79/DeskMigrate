<?php

use API\Models\Freshdesk\TicketFd;
use API\Services\Freshdesk\fTicketsServices;
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




$freshdeskTickets=[];
foreach ($tickets as $ticketZd) {
    $freshdeskTickets[] = $mapper->map($ticketZd, TicketFd::class);
}


$freshdeskUrl="https://relokia-helpdesk.freshdesk.com";
$freshdeskToken="Xbzgkvwt4xLhRAoRcwFd";
$fClient= new Client($freshdeskUrl, $freshdeskToken,"");

$fTicketServices= new fTicketsServices($fClient);
$fTicketServices->createTicketsInclude($freshdeskTickets);

$test = '';



