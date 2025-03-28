<?php

namespace API\Models\Zendesk;


class TicketZd
{
    public function __construct(
        private int     $id,
        private string  $description,
        private string  $status,
        private string  $priority,
        private UserZd  $agent,
        private UserZd  $contact,
        private ?GroupZd  $group,
        private ?OrganizationZd $organization,
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





