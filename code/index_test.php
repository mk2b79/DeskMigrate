<?php

include __DIR__ . '/vendor/autoload.php';

use API\CsvConvertor\CsvConvertor;
use API\Services\Zendesk\TicketFetch;


$url="https://relokia2482.zendesk.com/api/v2";

$email='m.samchuk@relokia.com';
$token = "rPx8R6cfN9g2uEkwFGKOSmLvjNNhZc0BWvIT4cj1";

$fetch=new TicketFetch($url,$email,$token);

$ticket= $fetch->Fetch();

$exportCsv=new CsvConvertor();
$exportCsv->export('./ticket.csv',$ticket);