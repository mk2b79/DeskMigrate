<?php

namespace API\Models\Zendesk;

use AutoMapper\Attribute\Mapper;
use AutoMapper\ConstructorStrategy;

#[Mapper(target: GroupZd::class, constructorStrategy: ConstructorStrategy::NEVER)]
class GroupZd
{
    private int $id;
    private ?string $description;
    private string $name;

    public function __construct(int $id, ?string $description, string $name)
    {
        $this->id = $id;
        $this->description = $description;
        $this->name = $name;
    }
}