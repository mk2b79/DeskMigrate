<?php

namespace API\Models\Zendesk;

use API\Models\Freshdesk\AgentFd;
use API\Models\Freshdesk\ContactFd;
use AutoMapper\Attribute\Mapper;
use AutoMapper\Attribute\MapTo;
use AutoMapper\ConstructorStrategy;


#[Mapper(target: ContactFd::class,constructorStrategy: ConstructorStrategy::NEVER)]
#[Mapper(target: AgentFd::class,constructorStrategy: ConstructorStrategy::NEVER)]

class UserZd
{
    private int $id;
    private ?string $name;
    private string $email;
    private ?string $timeZone;
    #[MapTo(target:ContactFd::class,property: "companyId")]
//    #[MapTo(target:AgentFd::class,property: "companyId")]
    private ?int $organizationId;
    private ?int $role_type;

    public function __construct(int $id, ?string $name, string $email, ?string $timeZone, ?int $organizationId, ?int $role_type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->timeZone = $timeZone;
        $this->organizationId = $organizationId;
        $this->role_type = $role_type;
    }

}