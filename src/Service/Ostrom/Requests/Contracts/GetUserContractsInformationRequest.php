<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom\Requests\Contracts;

use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\BaseRequest;
use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Contracts\GetUserContractsInformationResponse;

class GetUserContractsInformationRequest extends BaseRequest
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
        return 'contracts';
    }

    #[\Override]
    public function responseClass(): ?string
    {
        return GetUserContractsInformationResponse::class;
    }
}
