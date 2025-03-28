<?php

namespace API\Models\Zendesk;

use AutoMapper\Attribute\MapTo;

class GroupZd
{
    private int $id;
    private string $description;
    private string $name;

    function __construct(
        int $id,
        string $description,
        string $name)
    {
        $this->id = $id;
        $this->description = $description;
        $this->name = $name;
    }

    public function getId():int{return $this->id;}
    public function getDescription():string{return $this->description;}
    public function getName():string{return $this->name;}
}