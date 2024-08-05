<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom\Requests\Prices;

use Hmennen90\OstromPhpClient\Service\Ostrom\Enums\OstromResolutionEnum;
use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\BaseRequest;
use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Prices\GetDayAhaedSpotPriceInformationResponse;
use Illuminate\Support\Arr;

class GetDayAhaedSpotPriceInformationRequest extends BaseRequest
{
    public function __construct(
        private readonly string $startDate,
        private readonly string $endDate,
        private readonly OstromResolutionEnum $resolution,
        private readonly ?string $zip
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
            'zip' => $this->zip,
        ];

        $endpoint = 'spot-prices?';

        $endpoint .= Arr::query($query);

        return $endpoint;
    }

    #[\Override]
    public function responseClass(): ?string
    {
        return GetDayAhaedSpotPriceInformationResponse::class;
    }
}
