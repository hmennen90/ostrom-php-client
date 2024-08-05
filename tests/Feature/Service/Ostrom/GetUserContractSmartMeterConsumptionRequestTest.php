<?php

namespace Hmennen90\OstromPhpClient\Tests\Feature\Service\Ostrom;

use Hmennen90\OstromPhpClient\Service\Ostrom\Enums\OstromResolutionEnum;
use Hmennen90\OstromPhpClient\Service\Ostrom\OstromServiceConnector;
use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\Contracts\GetUserContractSmartMeterConsumptionRequest;
use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\Contracts\GetUserContractSmartMeterConsumptionResponse;
use Illuminate\Support\Collection;
use Hmennen90\OstromPhpClient\Tests\TestCase;

class GetUserContractSmartMeterConsumptionRequestTest extends TestCase
{
    public function testGetUserContractSmartMeterMonthlyConsumptionRequest(): void
    {
        $ostrom = new OstromServiceConnector;

        $startDate = now()->setDate(2023, 01, 01)->toIso8601ZuluString('millisecond');

        $endDate = now()->toIso8601ZuluString('millisecond');

        $consumptions = $ostrom->executeRequest(new GetUserContractSmartMeterConsumptionRequest(
            '1', $startDate, $endDate, OstromResolutionEnum::MONTH
        ));

        $this->assertInstanceOf(Collection::class, $consumptions);

        $this->assertContainsOnlyInstancesOf(GetUserContractSmartMeterConsumptionResponse::class, $consumptions);
    }

    public function testGetUserContractSmartMeterDailyConsumptionRequest(): void
    {
        $ostrom = new OstromServiceConnector;

        $startDate = now()->setDate(2023, 01, 01)->toIso8601ZuluString('millisecond');

        $endDate = now()->toIso8601ZuluString('millisecond');

        $consumptions = $ostrom->executeRequest(new GetUserContractSmartMeterConsumptionRequest(
            '1', $startDate, $endDate, OstromResolutionEnum::DAY
        ));

        $this->assertInstanceOf(Collection::class, $consumptions);

        $this->assertContainsOnlyInstancesOf(GetUserContractSmartMeterConsumptionResponse::class, $consumptions);
    }

    public function testGetUserContractSmartMeterHourlyConsumptionRequest(): void
    {
        $ostrom = new OstromServiceConnector;

        $startDate = now()->setDate(2023, 01, 01)->toIso8601ZuluString('millisecond');

        $endDate = now()->toIso8601ZuluString('millisecond');

        $consumptions = $ostrom->executeRequest(new GetUserContractSmartMeterConsumptionRequest(
            '1', $startDate, $endDate, OstromResolutionEnum::HOUR
        ));

        $this->assertInstanceOf(Collection::class, $consumptions);

        $this->assertContainsOnlyInstancesOf(GetUserContractSmartMeterConsumptionResponse::class, $consumptions);
    }
}
