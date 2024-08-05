<?php

namespace Hmennen90\OstromPhpClient\Tests;

use Illuminate\Contracts\Config\Repository;
use Orchestra\Testbench\Concerns\WithWorkbench;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use WithWorkbench;

    protected function defineEnvironment($app)
    {
        tap($app['config'], function (Repository $config) {
            $config->set('ostrom.auth_api_url', 'https://auth.sandbox.ostrom-api.io');
            $config->set('ostrom.api_url', 'https://sandbox.ostrom-api.io');

            $config->set('ostrom.client_id', '');
            $config->set('ostrom.client_secret', '');
        });
    }
}