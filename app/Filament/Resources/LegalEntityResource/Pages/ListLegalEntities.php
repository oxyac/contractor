<?php

namespace App\Filament\Resources\LegalEntityResource\Pages;

use App\Filament\Resources\LegalEntityResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLegalEntities extends ListRecords
{
    protected static string $resource = LegalEntityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
