<?php

namespace API\Models\Zendesk;


use API\Models\Freshdesk\AgentFd;
use AutoMapper\Attribute\MapTo;

class TicketZd
{
    public function __construct(
        private int     $id,
        private string  $description,
        private string  $status,
        private string  $priority,
        private  $agent,
        private  $contact,
        private  $group,
        private  $organization,
//        private ?string $comments

    ) {}
    public function getId(): int { return $this->id; }
    public function getDescription(): string { return $this->description; }
    public function getStatus(): string { return $this->status; }
    public function getPriority(): string { return $this->priority; }
    public function getAgent(): UserZd { return $this->agent; }
    public function getContact(): UserZd { return $this->contact; }
    public function getGroup(): GroupZd { return $this->group; }
    public function getOrganization(): OrganizationZd { return $this->organization; }

//    public function getComments(): string { return $this->comments; }
}





