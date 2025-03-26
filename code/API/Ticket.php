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
    public function getId(): int { return $this->id; }
    public function getDescription(): string { return $this->description; }
    public function getStatus(): string { return $this->status; }
    public function getPriority(): string { return $this->priority; }
    public function getAssigneeId(): int { return $this->assigneeId; }
    public function getRequesterId(): int { return $this->requesterId; }
    public function getSubmitterId(): int { return $this->submitterId; }
    public function getOrganizationId(): ?int { return $this->organizationId; }
    public function getGroupId(): ?int { return $this->groupId; }
    public function getCreatedAt(): string { return $this->createdAt; }
    public function getUpdatedAt(): string { return $this->updatedAt; }
    public function getTags(): string { return $this->tags; }
}





