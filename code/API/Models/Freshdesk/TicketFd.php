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
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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

    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }

    public function getAgent(): AgentFd
    {
        return $this->agent;
    }

    public function setAgent(AgentFd $agent): void
    {
        $this->agent = $agent;
    }

    public function getContact(): ContactFd
    {
        return $this->contact;
    }

    public function setContact(ContactFd $contact): void
    {
        $this->contact = $contact;
    }

    public function getGroup(): ?GroupFd
    {
        return $this->group;
    }

    public function setGroup(?GroupFd $group): void
    {
        $this->group = $group;
    }

    public function getCompany(): ?CompanyFd
    {
        return $this->company;
    }

    public function setCompany(?CompanyFd $company): void
    {
        $this->company = $company;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }


}