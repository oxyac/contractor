<?php

namespace App\Filament\Resources\LegalEntityResource\Pages;

use App\Filament\Resources\LegalEntityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLegalEntity extends CreateRecord
{
    protected static string $resource = LegalEntityResource::class;

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        $data['belongs_to_legal_entity_id'] = auth()->user()->legal_entity_id;

        return static::getModel()::create($data);
    }
}
