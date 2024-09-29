<?php

namespace App\Services;

use App\Filament\Resources\ContractResource;
use App\Models\Contract;
use App\Models\LegalEntity;

class GenerateService
{
    public function generateFromResponse(Contract $contractModel, array $response)
    {
        $from = LegalEntity::where('name', $response['companies']['from']['name'])->first();
        if(!$from) {
            $from = LegalEntity::create($response['companies']['from']);
        }

        $to = LegalEntity::where('name', $response['companies']['to']['name'])->first();

        if(!$to) {
            $to = LegalEntity::create($response['companies']['to']);
        }

        $contract = $response['contract'];
        $contract['from_entity_id'] = $from->id;
        $contract['to_entity_id'] = $to->id;

        $services = [];
        foreach ($response['services'] as $item) {
            $services[] = [
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ];
        }

        $contract['services'] = $services;

        $notes = '';
        foreach ($response['notes'] as $item) {
            $notes .= $item['note'] . "\n";
        }

        $contract['notes'] = $notes;

        $contractModel->update($contract);

        foreach ($response['invoices'] as $item) {
            $invoice = [
                'created_at' => $item['CreatedAt'],
                'due_date' => $item['dueDate'],
                'product_description' => $item['productDescription'],
                'product_quantity' => $item['productQuantity'],
                'product_price' => $item['productPrice'],
                'total' => $item['totalPrice'],
                'legal_entity_id' => $contractModel->legal_entity_id,
            ];

            $contractModel->invoices()->create($invoice);
        }
    }

}
