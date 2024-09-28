<?php

namespace App\Filament\Pages\Profile;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Squire\Models\Country;

class MyCompany extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.profile.my-company';

    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Company Details')
                ->schema(
                    [Forms\Components\TextInput::make('name')
                        ->label('Company Name')
                        ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('Company Email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('domain')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('telephone_number')
                            ->label('Telephone Number')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address_line_1')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address_line_2')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('city')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('county')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('postcode')
                            ->maxLength(255),
                        Forms\Components\Select::make('country_id')
                            ->relationship(name: 'country', titleAttribute: 'name')
                            ->default(Country::where('name', 'Moldova')->first()->id)]
                )
                ->columnSpan(2)
        ])->columns(3)
            ->model(auth()->user()->company)
            ->statePath('data');
    }

    public function submit()
    {
        dd( $this->form->getState());

        $this->form->model->update(
            $this->form->collect(),
        );

        $this->form->model->save();
    }


}
