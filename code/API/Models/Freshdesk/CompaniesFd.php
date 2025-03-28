<?php

namespace API\Models\Freshdesk;

class CompaniesFd
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
    public function getName(): string{return $this->name;}
    public function getNotes(): string{return $this->notes;}
}