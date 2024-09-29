<?php

namespace App\Http\Requests;



use Saloon\Http\SoloRequest;
use Saloon\Enums\Method;

class PromptRequest extends SoloRequest
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return 'https://contractor.oxyac.dev/upload';
    }

    public function resolveHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'x-api-key'=> config('services.python.key')
            ];
    }
}
