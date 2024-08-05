<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom\Requests\Contracts;

use Hmennen90\OstromPhpClient\Service\Ostrom\Enums\OstromResolutionEnum;
use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\BaseRequest;
use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Contracts\GetUserContractSmartMeterConsumptionResponse;
use Illuminate\Support\Arr;

class GetUserContractSmartMeterConsumptionRequest extends BaseRequest
{
    public function __construct(
        private readonly string $contractId,
        private readonly string $startDate,
        private readonly string $endDate,
        private readonly OstromResolutionEnum $resolution
    ) {}

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
        $query = [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'resolution' => $this->resolution->value,
        ];
        $endpoint = 'contracts/'.$this->contractId.'/energy-consumption?';

        $endpoint .= Arr::query($query);

        return $endpoint;
    }

    #[\Override]
    public function responseClass(): ?string
    {
        return GetUserContractSmartMeterConsumptionResponse::class;
    }
}
