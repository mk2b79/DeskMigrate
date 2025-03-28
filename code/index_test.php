<?php

include __DIR__ . '/vendor/autoload.php';

use API\CsvConvertor\CsvConvertor;
use API\Services\Zendesk\TicketFdServices;
use GuzzleHttp\Client;


$url="https://relokia2482.zendesk.com";

$email='m.samchuk@relokia.com';
$token = "rPx8R6cfN9g2uEkwFGKOSmLvjNNhZc0BWvIT4cj1";


$client = new Client([
    'base_uri' => $url,
    'auth' => ["$email/token", $token],
    'headers' => ['Content-Type' => 'application/json']
]);

$fetch=new TicketFdServices($client);

$ticket= $fetch->getTickets();

//$exportCsv=new CsvConvertor();
//$exportCsv->export('./ticket.csv',$ticket);

$test = '';

