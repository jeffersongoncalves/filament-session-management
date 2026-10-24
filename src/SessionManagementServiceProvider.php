<?php

namespace JeffersonGoncalves\Filament\SessionManagement;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SessionManagementServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-session-management')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations();
    }
}
