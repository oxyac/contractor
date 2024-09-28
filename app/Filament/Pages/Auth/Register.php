<?php

namespace App\Filament\Pages\Auth;

use App\Models\Company;
use Filament\Pages\Auth\Register as BaseRegister;


class Register extends BaseRegister
{
    protected function afterRegister()
    {
        $company = new Company();
        $company->user_id = $this->form->model->id;
        $company->save();
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }
}
