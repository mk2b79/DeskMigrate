<?php

namespace API;

class CsvConvertor
{
    private function toArray(Ticket $ticket): array
    {
        return [
            'Ticket ID' => $ticket->getId(),
            'Description' => $ticket->getDescription(),
            'Status' => $ticket->getStatus(),
            'Priority' => $ticket->getPriority(),
            'Assignee ID' => $ticket->getAssigneeId(),
            'Requester ID' => $ticket->getRequesterId(),
            'Submitter ID' => $ticket->getSubmitterId(),
            'Organization ID' => $ticket->getOrganizationId() ?? 'N/A',
            'Group ID' => $ticket->getGroupId() ?? 'N/A',
            'Created At' => $ticket->getCreatedAt(),
            'Updated At' => $ticket->getUpdatedAt(),
            'Tags' => $ticket->getTags(),
        ];
    }
    public function export(string $filename, array $tickets): void
    {
        $file = fopen($filename, 'w');
        fputcsv($file, ['Ticket ID', 'Description', 'Status', 'Priority', 'Assignee ID', 'Requester ID', 'Submitter ID', 'Organization ID', 'Group ID', 'Created At', 'Updated At', 'Tags']);

        foreach ($tickets as $ticket) {
            fputcsv($file, $this->toArray($ticket));
        }
        fclose($file);
    }

}