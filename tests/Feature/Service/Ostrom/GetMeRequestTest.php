<?php

namespace Hmennen90\OstromPhpClient\Tests\Feature\Service\Ostrom;

use Hmennen90\OstromPhpClient\Service\Ostrom\OstromServiceConnector;
use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\Users\GetMeRequest;
use Hmennen90\OstromPhpClient\Tests\TestCase;

class GetMeRequestTest extends TestCase
{
    public function testGetMeRequest(): void
    {
        $ostrom = new OstromServiceConnector;

        $getMeRequest = new GetMeRequest;

        $getMeResponse = $ostrom->executeRequest($getMeRequest);

        $this->assertSame('dummy-email@ostrom-api.io', $getMeResponse->getEmail());

        $this->assertSame('Max', $getMeResponse->getFirstName());

        $this->assertSame('Mustermann', $getMeResponse->getLastName());

        $this->assertSame('GERMAN', $getMeResponse->getLanguage());
    }
}
