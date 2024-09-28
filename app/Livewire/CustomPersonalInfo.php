<?php

namespace App\Livewire;

use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms;
use Filament\Forms\Form;
use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;
use Squire\Models\Country;
use function filament;

class CustomPersonalInfo extends PersonalInfo
{
    public array $only = ['first_name',
        'middle_name',
        'last_name',
        'email'];

    protected string $view = 'filament-breezy::livewire.personal-info';

    protected function getProfileFormSchema(): array
    {
        $groupFields = Group::make([
            TextInput::make('first_name')
                ->label('First Name')
                ->required(),
            TextInput::make('last_name')
                ->label('Last Name')
                ->required(),
            TextInput::make('email')
                ->label('Email')
                ->email()
                ->unique($this->userClass, ignorable: $this->user)
                ->required(),
            TextInput::make('phone_number')
                ->tel()
                ->label('Phone Number'),
        ])->columnSpan(4);

        return [$groupFields];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getProfileFormSchema())->columns(3)
            ->statePath('data')
            ->model($this->user);
    }
}
