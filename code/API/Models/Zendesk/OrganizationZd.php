<?php

namespace API\Models\Zendesk;

use API\Models\Freshdesk\CompanyFd;
use AutoMapper\Attribute\Mapper;
use AutoMapper\ConstructorStrategy;

#[Mapper(target: CompanyFd::class, constructorStrategy: ConstructorStrategy::NEVER)]
class OrganizationZd
{
    private int $id;
    private string $name;

    public function __construct(int $id, string $name){
        $this->id = $id;
        $this->name = $name;
    }

    public static function fromArray(array $data): OrganizationZd{
        return new OrganizationZd(
            $data["id"],
            $data["name"]
        );
    }
}