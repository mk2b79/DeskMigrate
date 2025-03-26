<?php

use API\CsvConvertor;
use API\TicketFetch;

include __DIR__ . '/vendor/autoload.php';

$url="";
$token = "K3kgpdbJU0sF__JOym1wjpspStdcM64NJQcJmFJKYmT_TnLglc0LDQ-XuEzgd4tJvUsgA3c5y_iOeZOkRujNKA";

$fetch=new TicketFetch($url,$token);
$ticket= $fetch->Fetch();

$exportCsv=new CsvConvertor();
$exportCsv->export('ticket.csv',$ticket);