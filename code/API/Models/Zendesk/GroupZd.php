<?php

namespace API\Models\Zendesk;

class GroupZd
{
    private int $id;
    private string $createdAt;
    private string $updatedAt;
    private string $description;
    private string $name;

    function __construct(
        int $id,
        string $createdAt,
        string $updatedAt,
        string $description,
        string $name)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->description = $description;
        $this->name = $name;
    }

    public function getId():int{return $this->id;}
    public function getCreatedAt():string{return $this->createdAt;}
    public function getUpdatedAt():string{return $this->updatedAt;}
    public function getDescription():string{return $this->description;}
    public function getName():string{return $this->name;}
}