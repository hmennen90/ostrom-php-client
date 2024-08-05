<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Users;

use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\BaseResponse;

class GetMeResponse extends BaseResponse
{
    public function __construct(
        private readonly string $email,
        private readonly string $firstName,
        private readonly string $lastName,
        private readonly string $language
    ) {}

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }
}
