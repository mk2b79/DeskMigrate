<?php

namespace API\Model\Zendesk\Models;

class OrganizationZd
{
    private int $id;
    private string $createdAt;
    private string $updatedAt;
    private string $name;
    private string $notes;

    function __construct($createdAt, $updatedAt, $name, $notes)
    {
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->name = $name;
        $this->notes = $notes;
    }
    public function getId(): int{return $this->id;}
    public function getCreatedAt(): string{return $this->createdAt;}
    public function getUpdatedAt(): string{return $this->updatedAt;}
    public function getName(): string{return $this->name;}
    public function getNotes(): string{return $this->notes;}
}