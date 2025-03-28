<?php

namespace API\Models\Zendesk;

class OrganizationZd
{
    private int $id;
    private string $name;
    private string $notes;

    function __construct($id, $name, $notes)
    {
        $this->id = $id;
        $this->name = $name;
        $this->notes = $notes;
    }
    public function getId(): int{return $this->id;}
    public function getCreatedAt(): string{return $this->createdAt;}
    public function getUpdatedAt(): string{return $this->updatedAt;}
    public function getName(): string{return $this->name;}
    public function getNotes(): string{return $this->notes;}
}