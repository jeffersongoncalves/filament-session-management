<?php

namespace JeffersonGoncalves\Filament\SessionManagement\Tests\Fixtures;

use Filament\Panel;
use Filament\PanelProvider;
use JeffersonGoncalves\Filament\SessionManagement\FilamentSessionManagementPlugin;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->plugins([
                FilamentSessionManagementPlugin::make(),
            ]);
    }
}
