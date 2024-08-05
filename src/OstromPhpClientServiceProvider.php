<?php

namespace Hmennen90\OstromPhpClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class OstromPhpClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('ostrom-php-client')
            ->hasConfigFile('ostrom');
    }
}