<?php

namespace App\Services;

use App\Filament\Resources\ContractResource;
use App\Models\Contract;
use App\Models\LegalEntity;

class GenerateService
{
    public function generateFromResponse(Contract $contractModel, array $response)
    {
//        {
//   "companies": {
//      "from": {
//         "id": 1,
//         "name": "Service Provider Inc.",
//         "entity_type": "Corporation",
//         "email": "contact@serviceprovider.com",
//         "phone": "+1234567890",
//         "address": "123 Service St, Business City, BC"
//      },
//      "to": {
//         "id": 2,
//         "name": "Client Corp.",
//         "entity_type": "Corporation",
//         "email": "info@clientcorp.com",
//         "phone": "+0987654321",
//         "address": "456 Client Ave, Client Town, CT"
//      }
//   },
//   "contract": {
//      "id": 1,
//      "from_company_id": 1,
//      "to_company_id": 2,
//      "currency": "USD",
//      "language_code": "EN",
//      "contract_date": "2024-09-29",
//      "contract_start_date": "2024-10-01",
//      "contract_due_date": "2025-10-01",
//      "total": 1500.00,
//      "limited": false
//   },
//   "services": [
//      {
//         "id": 1,
//         "contract_id": 1,
//         "description": "Web Development Services",
//         "quantity": 1,
//         "price": 1500.00
//      }
//   ],
//   "bank_details": {
//      "company_id": 1,
//      "bank_details": "Bank of Services, Account No: 123456789, Sort Code: 12-34-56"
//   },
//   "notes": [
//      {
//         "id": 1,
//         "contract_id": 1,
//         "note": "Payment due within 30 days of invoice."
//      }
//   ],
//   "invoices": [
//      {
//         "CreatedAt": "2024-09-29",
//         "dueDate": "2025-10-01",
//         "productDescription": "Web Development Services",
//         "productQuantity": 1,
//         "productPrice": 1500.00,
//         "totalPrice": 1500.00
//      }
//   ]
//}

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
                'company_id' => $contractModel->company_id,
            ];

            $contractModel->invoices()->create($invoice);
        }
    }

}
