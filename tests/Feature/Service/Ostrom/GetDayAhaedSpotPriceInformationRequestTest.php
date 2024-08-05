<?php

namespace Hmennen90\OstromPhpClient\Tests\Feature\Service\Ostrom;

use Hmennen90\OstromPhpClient\Service\Ostrom\Enums\OstromResolutionEnum;
use Hmennen90\OstromPhpClient\Service\Ostrom\OstromServiceConnector;
use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\Prices\GetDayAhaedSpotPriceInformationRequest;
use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Prices\GetDayAhaedSpotPriceInformationResponse;
use Illuminate\Support\Collection;
use Hmennen90\OstromPhpClient\Tests\TestCase;

class GetDayAhaedSpotPriceInformationRequestTest extends TestCase
{
    public function testGetDayAhaedSpotPriceInformationRequestWithZip(): void
    {
        $ostrom = new OstromServiceConnector;

        $startDate = now()->setDate(2024, 01, 01)->toIso8601ZuluString('millisecond');

        $endDate = now()->toIso8601ZuluString('millisecond');

        $zip = '26131';

        $collection = $ostrom->executeRequest(new GetDayAhaedSpotPriceInformationRequest(
            $startDate,
            $endDate,
            OstromResolutionEnum::HOUR,
            $zip
        ));

        $this->assertInstanceOf(Collection::class, $collection);

        $this->assertContainsOnlyInstancesOf(GetDayAhaedSpotPriceInformationResponse::class, $collection);
    }
}
