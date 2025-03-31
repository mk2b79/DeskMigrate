<?php

namespace API\Models\Zendesk;


use API\Models\Freshdesk\AgentFd;
use API\Models\Freshdesk\TicketFd;
use AutoMapper\Attribute\Mapper;
use AutoMapper\Attribute\MapTo;
use AutoMapper\ConstructorStrategy;


#[Mapper(target: TicketFd::class,constructorStrategy: ConstructorStrategy::NEVER)]
class TicketZd
{
    private int $id;
    private string $subject;
    private string $description;
    #[MapTo(target:  TicketFd::class,
        transformer: [self::class, 'statusMapCallback'])]
    private string $status;
    #[MapTo(target:  TicketFd::class,
        transformer: [self::class, 'priorityMapCallback'])]
    private string $priority;
    #[MapTo(target:  TicketFd::class, property: "agent")]
    private UserZd $agent;
    #[MapTo(target:  TicketFd::class, property: "contact")]
    private  UserZd $contact;
    #[MapTo(target:  TicketFd::class, property: "group")]
    private ?GroupZd $group;
    #[MapTo(target:  TicketFd::class, property: "company")]
    private ?OrganizationZd $organization;

    public function __construct($id,$subject, $description, $status, $priority,UserZd $agent,UserZd $contact, $group, $organization)
    {
        $this->id = $id;
        $this->subject = $subject;
        $this->description = $description;
        $this->status = $status;
        $this->priority = $priority;
        $this->agent = $agent;
        $this->contact = $contact;
        $this->group = $group;
        $this->organization = $organization;
    }

    public static function statusMapCallback(string $value):int
    {
        $status=[
            "new"=>2,
            "open"=>2,
            "pending"=>3,
            "hold"=>3,
            "solved"=>3,
            "closed"=>5
        ];
        return $status[$value] ?? 2;
    }
    public static function priorityMapCallback(string $value):int
    {
        $priority=[
            "Low"=>	1,
            "Normal" =>	2,
            "High" => 3,
            "Urgent" => 4
        ];
        return $priority[$value] ?? 1;
    }
}





