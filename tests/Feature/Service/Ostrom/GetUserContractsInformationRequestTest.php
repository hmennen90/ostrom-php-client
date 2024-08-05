<?php

namespace Hmennen90\OstromPhpClient\Tests\Feature\Service\Ostrom;

use Hmennen90\OstromPhpClient\Service\Ostrom\OstromServiceConnector;
use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\Contracts\GetUserContractsInformationRequest;
use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Contracts\GetUserContractsInformationResponse;
use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Shared\Address;
use Illuminate\Support\Collection;
use Hmennen90\OstromPhpClient\Tests\TestCase;

class GetUserContractsInformationRequestTest extends TestCase
{
    public function testGetUserContractsInformationRequest(): void
    {
        $ostrom = new OstromServiceConnector;

        $request = new GetUserContractsInformationRequest;

        $response = $ostrom->executeRequest($request);

        $this->assertInstanceOf(Collection::class, $response);

        $this->assertContainsOnlyInstancesOf(GetUserContractsInformationResponse::class, $response);

        $this->assertInstanceOf(Address::class, $response->first()->getAddress());
    }
}
