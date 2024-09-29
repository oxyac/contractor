<?php

namespace App\Http\Requests;



use Saloon\Http\SoloRequest;
use Saloon\Enums\Method;

class PromptRequest extends SoloRequest
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return 'http://';
    }
}
