<?php

use API\Models\Freshdesk\AgentFd;
use API\Models\Freshdesk\ContactFd;
use API\Models\Freshdesk\GroupFd;
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


// Test
$mapper=AutoMapper::create();

// User to Agent and Contact mapper example
//$services= new \API\Services\Zendesk\zUserServices($zendeskClient);
//$user= $services->fetchUserById(25588273884178);
//$contact=$mapper->map($user,ContactFd::class);
//$agent=$mapper->map($user,AgentFd::class);


//
//$ticketServices=new \API\Services\Zendesk\zTicketsServices($zendeskClient);
//$tickets= $ticketServices->fetchTicketsInclude();

//
//$companyServices= new \API\Services\Freshdesk\fCompanyServices($freshdeskClient);
//print_r($companyServices->getOrCreateCompany(new \API\Models\Freshdesk\CompanyFd(null,"NNN")));
//print_r($companyServices->getOrCreateCompany(new \API\Models\Freshdesk\CompanyFd(null,"QQ")));
//print_r($companyServices->getOrCreateCompany(null));

//$groupServices=new \API\Services\Freshdesk\fGroupServices($freshdeskClient);
//print_r($groupServices->getOrGroupCompany(new GroupFd(null,"Test","MyPersonalGroup")));

$agentServices=new \API\Services\Freshdesk\fAgentServices($freshdeskClient);
$ff= $agentServices->getOrCreateCompany(new AgentFd(null,"Test","lol@lol.com",null,1));


$test = '';



