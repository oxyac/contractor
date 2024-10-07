<?php

namespace App\Services;

use App\Filament\Resources\ContractResource;
use App\Models\Contract;
use App\Models\LegalEntity;
use Carbon\Carbon;
use PhpOffice\PhpWord\IOFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class GenerateService
{

    public function extractText(Media $media) {
//        if($media->mime_type = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
//
//            $office = IOFactory::load();
//            dd($office);
//        }
    }
    public function generateFromResponse(Contract $contractModel, array $response)
    {
        $from = LegalEntity::where('name', $response['companies']['from']['name'])->first();
        if(!$from) {
            $from = LegalEntity::create($response['companies']['from']);
            $from->belongs_to_legal_entity_id = $contractModel->legal_entity_id;
            $from->save();
        }

        $to = LegalEntity::where('name', $response['companies']['to']['name'])->first();

        if(!$to) {
            $to = LegalEntity::create($response['companies']['to']);
            $to->belongs_to_legal_entity_id = $contractModel->legal_entity_id;
            $to->save();
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
