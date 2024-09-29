<?php

namespace App\Filament\Resources\VisionResource\Pages;

use App\Filament\Resources\VisionResource;
use App\Jobs\ParseContracts;
use App\Models\Vision;
use Filament\Actions;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Queue\Jobs\Job;

class CreateVision extends CreateRecord
{
    protected static string $resource = VisionResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.app.resources.contracts.index');
    }

    protected function afterCreate()
    {
        ParseContracts::dispatch($this->record);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                SpatieMediaLibraryFileUpload::make('images')
                    ->multiple()
                    ->disk('local')
            ]);
    }
}
