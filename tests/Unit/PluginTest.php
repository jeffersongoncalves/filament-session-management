<?php

use Filament\Facades\Filament;
use JeffersonGoncalves\Filament\SessionManagement\FilamentSessionManagementPlugin;
use JeffersonGoncalves\Filament\SessionManagement\Resources\Sessions\SessionResource;
use JeffersonGoncalves\Filament\SessionManagement\Support\Utils;
use JeffersonGoncalves\FilamentPluginCore\BasePlugin;

it('extends the shared base plugin and has the expected id', function () {
    expect(FilamentSessionManagementPlugin::make())->toBeInstanceOf(BasePlugin::class)
        ->and(FilamentSessionManagementPlugin::make()->getId())->toBe('filament-session-management')
        ->and(FilamentSessionManagementPlugin::get())->toBeInstanceOf(FilamentSessionManagementPlugin::class);
});

it('registers the sessions resource on the panel', function () {
    expect(Filament::getPanel('admin')->getResources())->toContain(SessionResource::class);
});

it('pushes fluent configuration into the config', function () {
    FilamentSessionManagementPlugin::make()
        ->navigationGroup('System')
        ->navigationSort(5)
        ->navigationIcon('heroicon-o-bolt')
        ->slug('user-sessions')
        ->userAttribute('email')
        ->register(Filament::getPanel('admin'));

    expect(Utils::getNavigationGroup())->toBe('System')
        ->and(Utils::getNavigationSort())->toBe(5)
        ->and(Utils::getNavigationIcon())->toBe('heroicon-o-bolt')
        ->and(Utils::getSlug())->toBe('user-sessions')
        ->and(Utils::getUserAttribute())->toBe('email');
});

it('loads the package translations and has no navigation group by default', function () {
    expect(__('filament-session-management::filament-session-management.resource.plural_label'))->toBe('Sessions')
        ->and(Utils::getNavigationGroup())->toBeNull();
});

it('masks session ids', function () {
    expect(Utils::maskSessionId('abcdefghijklmnop'))->toBe('abcdefgh...');
});
