<?php

namespace API\Models\Freshdesk;

use API\Models\ContactFd;

class AgentFd
{
    private int $id;
    private ContactFd $contact;

    function __construct($id,$contact)
    {
        $this->id = $id;
        $this->contact = $contact;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContact(): ContactFd
    {
        return $this->contact;
    }

}