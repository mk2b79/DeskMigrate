<?php

namespace API\Model\Zendesk\Models;

class UserZd
{
    function __construct(
        private int $id,
        private string $name,
        private string $email
    )
    {}
    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getEmail(): string { return $this->email; }
}