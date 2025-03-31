<?php

namespace API\Models\Freshdesk;

class CompanyFd
{
    private ?int $id;
    private string $name;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getId(): int
    {
        return $this->id;
    }
}