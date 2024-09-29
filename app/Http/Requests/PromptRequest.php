<?php

namespace App\Http\Requests;


use Saloon\Contracts\Body\BodyRepository;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\SoloRequest;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Plugins\HasTimeout;

class PromptRequest extends SoloRequest implements HasBody
{
    protected Method $method = Method::POST;
    use HasJsonBody, HasTimeout;

    protected int $connectTimeout = 120;

    protected int $requestTimeout = 240;


    public function __construct(public string $url)
    {

    }

    public function resolveEndpoint(): string
    {
        return 'https://contractor.oxyac.dev/upload';
    }

    public function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json'
        ];
    }

    protected function defaultAuth(): HeaderAuthenticator
    {
        return new HeaderAuthenticator(config('services.python.key'), 'x-api-key');
    }

    public function defaultBody(): array
    {
        return [
            'filename' => $this->url
        ];
    }
}
