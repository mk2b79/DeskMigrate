<?php

namespace API\Models\Freshdesk;


class AgentFd extends ContactFd
{
    private int $ticket_scoped;
    public function __construct($id, $name, $email, $timeZone, $ticket_scoped){
        parent::__construct($id, $name, $email, $timeZone,null);
        $this->ticket_scoped = $ticket_scoped;
    }
    public function getTicketScoped(): int
    {
        return $this->ticket_scoped;
    }
}