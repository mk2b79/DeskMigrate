<?php

namespace API\Models\Freshdesk;

class TicketFd
{
    private int $id;
    private string $description;
    private string $status;
    private string $priority;
    private ?int $responseId;
    private string $responseEmail;
    private ?int $requesterId;
    private string $requesterEmail;


}