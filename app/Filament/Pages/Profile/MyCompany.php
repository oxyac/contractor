<?php

namespace App\Filament\Pages\Profile;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Forms;

class MyCompany extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Settings';

    protected static string $view = 'filament.pages.profile.my-company';

    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(auth()->user()->legalEntity->toArray());
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Company Details')
                ->schema(
                    [
                        Forms\Components\TextInput::make('name')
                                ->placeholder('Enter the name of the legal entity'),
                        Forms\Components\TextInput::make('entity_type')
                            ->placeholder('Enter the type of the legal entity'),
                        Forms\Components\TextInput::make('iban')
                            ->placeholder('Enter the IBAN of the legal entity'),
                        Forms\Components\TextInput::make('email')
                            ->placeholder('Enter the email of the legal entity'),
                        Forms\Components\TextInput::make('phone')
                            ->placeholder('Enter the phone of the legal entity'),
                        Forms\Components\TextInput::make('address')
                            ->placeholder('Enter the address of the legal entity'),
                        Forms\Components\TextInput::make('bank_details')
                            ->placeholder('Enter the bank details of the legal entity'),
                    ]
                )
                ->columnSpan(2)
        ])->columns(3)
            ->model(auth()->user()->legalEntity)
            ->statePath('data');
    }

    public function submit()
    {
        $this->form->model->update($this->form->getState());

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }


}
