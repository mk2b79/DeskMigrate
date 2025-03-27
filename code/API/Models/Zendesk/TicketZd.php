<?php

namespace API\Model\Zendesk\Models;

class TicketZd
{
    public function __construct(
        private int     $id,
        private string  $description,
        private string  $status,
        private string  $priority,
        private UserZd  $agent,
        private UserZd  $contact,
        private ?int    $groupId,
        private ?string $groupName,
        private ?int    $companyId,
        private ?string $companyName,
        private ?string $comments

    ) {}
    public function getId(): int { return $this->id; }
    public function getDescription(): string { return $this->description; }
    public function getStatus(): string { return $this->status; }
    public function getPriority(): string { return $this->priority; }
    public function getAgentId(): int { return $this->agent->getId(); }
    public function getAgentName(): string { return $this->agent->getName(); }
    public function getAgentEmail(): string { return $this->agent->getEmail(); }
    public function getContactId(): int { return $this->contact->getId(); }
    public function getContactName(): string { return $this->contact->getName(); }
    public function getContactEmail(): string { return $this->contact->getEmail(); }
    public function getGroupId(): int { return $this->groupId; }
    public function getGroupName(): string { return $this->groupName; }
    public function getCompanyId(): int { return $this->companyId; }
    public function getCompanyName(): string { return $this->companyName; }
    public function getComments(): string { return $this->comments; }
}





