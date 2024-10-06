<?php

namespace App\Filament\Pages\Auth;

use App\Models\LegalEntity;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Auth\Register as BaseRegister;


class Register extends BaseRegister
{
    protected function afterRegister()
    {
//        $company->save();
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        TextInput::make('company_name')
                            ->label('Company Name')
                            ->required()
                            ->autofocus(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    public function mutateFormDataBeforeRegister(array $data): array
    {

        $legalEntity = new LegalEntity();
        $legalEntity->name = $data['company_name'];

        $legalEntity->save();

        $legalEntity['belongs_to_legal_entity_id'] = $legalEntity->id;

        $legalEntity->save();

        $data['legal_entity_id'] = $legalEntity->id;

        return $data;

    }
}
