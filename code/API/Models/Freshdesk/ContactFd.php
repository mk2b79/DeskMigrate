<?php

namespace API\Models\Freshdesk;

class ContactFd
{
    protected ?int $id;
    protected ?string $name;
    protected string $email;
    protected ?string $timeZone;
    private ?int $companyId;

    public function __construct($id, $name, $email, $timeZone, $companyId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->timeZone = $timeZone;
        $this->companyId = $companyId;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTimeZone(): ?string
    {
        return $this->timeZone;
    }

    public function getCompanyId(): ?int
    {
        return $this->companyId;
    }


}