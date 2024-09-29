<?php

namespace App\Filament\Resources\LegalEntityResource\Pages;

use App\Filament\Resources\LegalEntityResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLegalEntity extends EditRecord
{
    protected static string $resource = LegalEntityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
