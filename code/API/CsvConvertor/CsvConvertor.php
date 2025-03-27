<?php

namespace API\CsvConvertor;

use API\Model\Zendesk\Models\TicketZd;

class CsvConvertor
{
    private function toArray(TicketZd $ticket): array
    {
        return [
            'TicketZd ID' => $ticket->getId(),
            'Description' => $ticket->getDescription(),
            'Status' => $ticket->getStatus(),
            'Priority' => $ticket->getPriority(),
            'Agent ID' => $ticket->getAgentId(),
            'Agent Name' => $ticket->getAgentName(),
            'Agent Email' => $ticket->getAgentEmail(),
            'Contact ID' => $ticket->getContactId(),
            'Contact Name' => $ticket->getContactName(),
            'Contact Email' => $ticket->getContactEmail(),
            'Group ID'=> $ticket->getGroupId(),
            'Group Name' => $ticket->getGroupName(),
            'Company ID'=> $ticket->getCompanyId(),
            'Company Name' => $ticket->getCompanyName(),
            'Comments'=>$ticket->getComments()
        ];
    }
    public function export(string $filename, array $tickets): void
    {
        $file = fopen($filename, 'w');

        fputcsv($file, ['TicketZd ID', 'Description', 'Status', 'Priority', 'Agent ID', 'Agent Name', 'Agent Email', 'Contact ID', 'Contact Name', 'Contact Email', 'Group ID', 'Group Name', 'Company ID', 'Company Name', 'Comments']);

        foreach ($tickets as $ticket) {
            fputcsv($file, $this->toArray($ticket));
        }
        fclose($file);
    }

}