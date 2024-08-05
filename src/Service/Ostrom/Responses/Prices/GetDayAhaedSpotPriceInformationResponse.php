<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Prices;

use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\BaseResponse;

class GetDayAhaedSpotPriceInformationResponse extends BaseResponse
{
    public function __construct(
        private readonly string $date,
        private readonly float $netMwhPrice,
        private readonly float $netKwhPrice,
        private readonly float $grossKwhPrice,
        private readonly float $netKwhTaxAndLevies,
        private readonly float $grossKwhTaxAndLevies,
        private readonly float $netMonthlyOstromBaseFee,
        private readonly float $grossMonthlyOstromBaseFee,
        private readonly float $netMonthlyGridFees,
        private readonly float $grossMonthlyGridFees
    ) {}

    public function getDate(): string
    {
        return $this->date;
    }

    public function getNetMwhPrice(): float
    {
        return $this->netMwhPrice;
    }

    public function getNetKwhPrice(): float
    {
        return $this->netKwhPrice;
    }

    public function getGrossKwhPrice(): float
    {
        return $this->grossKwhPrice;
    }

    public function getNetKwhTaxAndLevies(): float
    {
        return $this->netKwhTaxAndLevies;
    }

    public function getGrossKwhTaxAndLevies(): float
    {
        return $this->grossKwhTaxAndLevies;
    }

    public function getNetMonthlyOstromBaseFee(): float
    {
        return $this->netMonthlyOstromBaseFee;
    }

    public function getGrossMonthlyOstromBaseFee(): float
    {
        return $this->grossMonthlyOstromBaseFee;
    }

    public function getNetMonthlyGridFees(): float
    {
        return $this->netMonthlyGridFees;
    }

    public function getGrossMonthlyGridFees(): float
    {
        return $this->grossMonthlyGridFees;
    }
}
