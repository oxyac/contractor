<?php

namespace App\Filament\Pages;

use App\Jobs\ParseContracts;
use App\Models\Contract;
use Filament\Notifications\Notification;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static string $view = 'pages.dashboard';

    use WithFileUploads;

    public $document;
    public $disableSubmit = true;

    public function save()
    {
        $this->validate([
            'document' => 'file|max:2048', // 1MB Max
        ]);

        $contract = new Contract();
        $contract->legal_entity_id = auth()->user()->legal_entity_id;
        $contract->save();

        /* @var Media $media */
        $contract->addMedia($this->document)->toMediaCollection('default', 's3');

        ParseContracts::dispatch($contract);

        Notification::make()
            ->title('Contract has been uploaded. Generation in progress')
            ->color('success')
            ->send();
    }

    public function uploadFinish()
    {
        $this->disableSubmit = false;
    }
}
