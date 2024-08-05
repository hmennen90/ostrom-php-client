<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom\Requests\Auth;

use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\BaseRequest;

class GetTokenRequest extends BaseRequest
{
    #[\Override]
    public function method(): string
    {
        return 'post';
    }

    #[\Override]
    public function body(): array
    {
        return [
            'grant_type' => 'client_credentials',
        ];
    }

    #[\Override]
    public function endpoint(): string
    {
        return 'oauth2/token';
    }

    #[\Override]
    public function responseClass(): ?string
    {
        return null;
    }
}
