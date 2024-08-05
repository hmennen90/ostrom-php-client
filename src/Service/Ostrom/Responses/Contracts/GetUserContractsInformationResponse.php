<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Contracts;

use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\BaseResponse;
use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Shared\Address;

class GetUserContractsInformationResponse extends BaseResponse
{
    public function __construct(
        private readonly string $id,
        private readonly string $type,
        private readonly string $productCode,
        private readonly string $status,
        private readonly string $customerFirstName,
        private readonly string $customerLastName,
        private readonly string $startDate,
        private readonly int $currentMonthlyDepositAmount,
        private readonly array $address
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getProductCode(): string
    {
        return $this->productCode;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCustomerFirstName(): string
    {
        return $this->customerFirstName;
    }

    public function getCustomerLastName(): string
    {
        return $this->customerLastName;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getCurrentMonthlyDepositAmount(): int
    {
        return $this->currentMonthlyDepositAmount;
    }

    public function getAddress(): Address
    {
        return new Address(...$this->address);
    }
}
