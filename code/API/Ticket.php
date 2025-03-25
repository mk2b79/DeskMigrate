<?php

namespace API;

class Ticket
{
    public function __construct(
        private int $id,
        private string $description,
        private string $status,
        private string $priority,
        private int $assigneeId,
        private int $requesterId,
        private int $submitterId,
        private ?int $organizationId,
        private ?int $groupId,
        private string $createdAt,
        private string $updatedAt,
        private string $tags
    ) {}
    public function toArray(): array
    {
        return [
            'Ticket ID' => $this->id,
            'Description' => $this->description,
            'Status' => $this->status,
            'Priority' => $this->priority,
            'Assignee ID' => $this->assigneeId,
            'Requester ID' => $this->requesterId,
            'Submitter ID' => $this->submitterId,
            'Organization ID' => $this->organizationId ?? 'N/A',
            'Group ID' => $this->groupId ?? 'N/A',
            'Created At' => $this->createdAt,
            'Updated At' => $this->updatedAt,
            'Tags' => $this->tags,
        ];
    }
}





