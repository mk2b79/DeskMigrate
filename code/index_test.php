<?php

include __DIR__ . '/vendor/autoload.php';

use API\CsvConvertor\CsvConvertor;
use API\Services\Zendesk\TicketFdServices;
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

$fetch=new TicketFdServices($zendeskClient);
$ticket= $fetch->getTickets();

//$migration=new \API\Services\ZendeskToFreshdeskMigrationServices($zendeskClient,$freshdeskClient);
//
//$migration->migrationTickets();
//$migration->migrationGrop();

$test = '';

