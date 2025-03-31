<?php

namespace API\Models\Zendesk;


use API\Models\Freshdesk\AgentFd;
use AutoMapper\Attribute\MapTo;

class TicketZd
{
        private int $id;
        private string $description;
        private string $status;
        private string $priority;
        private UserZd $agent;
        private  UserZd $contact;
        private ?GroupZd $group;
        private ?OrganizationZd $organization;

        public function __construct($id, $description, $status, $priority,UserZd $agent,UserZd $contact, $group, $organization)
        {
            $this->id = $id;
            $this->description = $description;
            $this->status = $status;
            $this->priority = $priority;
            $this->agent = $agent;
            $this->contact = $contact;
            $this->group = $group;
            $this->organization = $organization;
        }
}





