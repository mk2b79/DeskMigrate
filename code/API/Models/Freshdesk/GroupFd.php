<?php

namespace API\Models\Freshdesk;

class GroupFd
{
    private ?int $id;
    private ?string $description;
    private string $name;

    public function __construct($id, $description, string $name)
    {
        $this->id = $id;
        $this->description = $description;
        $this->name = $name;
    }

    public function getId(): ?int{return $this->id;}
    public function getDescription(): ?string{return $this->description;}
    public function getName(): string{return $this->name;}
}