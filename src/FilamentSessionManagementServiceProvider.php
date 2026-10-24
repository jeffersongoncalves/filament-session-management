<?php

namespace JeffersonGoncalves\Filament\SessionManagement;

use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentSessionManagementServiceProvider extends BasePackageServiceProvider
{
    public static string $name = 'filament-session-management';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasTranslations();
    }
}
