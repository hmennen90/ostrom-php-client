<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom\Requests\Users;

use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\BaseRequest;
use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Users\GetMeResponse;

class GetMeRequest extends BaseRequest
{
    #[\Override]
    public function method(): string
    {
        return 'get';
    }

    #[\Override]
    public function body(): array
    {
        return [];
    }

    #[\Override]
    public function endpoint(): string
    {
        return 'me';
    }

    #[\Override]
    public function responseClass(): ?string
    {
        return GetMeResponse::class;
    }
}
