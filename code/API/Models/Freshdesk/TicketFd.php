<?php

namespace API\Models\Freshdesk;

class TicketFd
{
    private int $id;
    private string $subject;
    private string $description;
    private int $status;
    private int $priority;
    private AgentFd $agent;
    private ContactFd $contact;
    private ?GroupFd $group;
    private ?CompanyFd $company;
    private array $fields;

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }


    public function getAgent(): AgentFd
    {
        return $this->agent;
    }


    public function getContact(): ContactFd
    {
        return $this->contact;
    }

    public function getGroup(): ?GroupFd
    {
        return $this->group;
    }

    public function getCompany(): ?CompanyFd
    {
        return $this->company;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getFields(): array
    {
        return $this->fields;
    }
}