<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Shared;

class Address
{
    public function __construct(
        private readonly string $countryId,
        private readonly string $zip,
        private readonly string $city,
        private readonly string $street,
        private readonly string $houseNumber,
    ) {}

    public function getCountryId(): string
    {
        return $this->countryId;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }
}
