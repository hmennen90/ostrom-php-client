<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Contracts;

use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\BaseResponse;

class GetUserContractSmartMeterConsumptionResponse extends BaseResponse
{
    public function __construct(
        private readonly string $date,
        private readonly float $kWh
    ) {}

    public function getDate(): string
    {
        return $this->date;
    }

    public function getKWh(): float
    {
        return $this->kWh;
    }
}
