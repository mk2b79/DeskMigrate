<?php

include __DIR__ . '/vendor/autoload.php';


use API\Models\Freshdesk\ContactFd;
use API\Services\ZendeskOld\TicketFdServices;
use GuzzleHttp\Client;

$zenDeskUrl="https://relokia2482.zendesk.com";
$email='m.samchuk@relokia.com';
$token = "rPx8R6cfN9g2uEkwFGKOSmLvjNNhZc0BWvIT4cj1";

$zendeskClient = new Client([
    'base_uri' => $zenDeskUrl,
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

//$fetch=new TicketFdServices($zendeskClient);
//$ticket= $fetch->getTickets();

//$migration=new \API\Services\ZendeskToFreshdeskMigrationServices($zendeskClient,$freshdeskClient);
//
//$migration->migrationTickets();
//$migration->migrationGrop();

$zdUser=new \API\Models\Zendesk\UserZd(null,"Maxim","smaks909@gmail.com","Ukraine",null,new \API\Models\Zendesk\OrganizationZd(1,"Test","Note"));

$mapper=\AutoMapper\AutoMapper::create();

$contact=$mapper->map($zdUser,ContactFd::class);

print_r($contact);

$test = '';

