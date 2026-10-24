<div class="filament-hidden">

![Filament Session Management](https://raw.githubusercontent.com/jeffersongoncalves/filament-session-management/3.x/art/jeffersongoncalves-filament-session-management.png)

</div>

# Filament Session Management

[![Buy Me A Coffee](https://img.shields.io/badge/Buy%20Me%20A%20Coffee-support-FFDD00?style=flat-square&logo=buy-me-a-coffee&logoColor=black)](https://buymeacoffee.com/jeffersongoncalves)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-session-management.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-session-management)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-session-management/tests.yml?branch=3.x&label=tests&style=flat-square)](https://github.com/jeffersongoncalves/filament-session-management/actions?query=workflow%3Atests+branch%3A3.x)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-session-management/fix-php-code-style-issues.yml?branch=3.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-session-management/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A3.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-session-management.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-session-management)
[![License](https://img.shields.io/packagist/l/jeffersongoncalves/filament-session-management.svg?style=flat-square)](LICENSE.md)

A Filament plugin to read and manage Laravel's database sessions from your panel: see who is logged in, from which IP and device, inspect decoded session payloads, revoke sessions and prune expired ones. It is built on top of the framework-agnostic [`jeffersongoncalves/laravel-session-management`](https://github.com/jeffersongoncalves/laravel-session-management) core and the shared [`jeffersongoncalves/filament-plugin-core`](https://github.com/jeffersongoncalves/filament-plugin-core).

## Features

- 👥 Sessions table with user, IP address, user agent, last activity and an Active / Expired / Current badge
- 🔎 Filters by status (active / expired) and by authenticated vs guest sessions
- 🧾 View page with the decoded payload as pretty JSON (CSRF token and password hashes masked, objects never instantiated)
- 🚪 Revoke a session, or many in bulk; your own current session is always kept
- 🧹 "Prune expired" header action
- 🔢 Navigation badge with the number of active sessions
- 🌍 19 languages
- ⚙️ Fluent customisation of the navigation group, sort, icon, slug and user attribute

## Compatibility

| Plugin Version                                                                     | Filament |
|------------------------------------------------------------------------------------|----------|
| [1.x](https://github.com/jeffersongoncalves/filament-session-management/tree/1.x) | 3.x      |
| [2.x](https://github.com/jeffersongoncalves/filament-session-management/tree/2.x) | 4.x      |
| [3.x](https://github.com/jeffersongoncalves/filament-session-management/tree/3.x) | 5.x      |

## Installation

```bash
composer require jeffersongoncalves/filament-session-management:"^1.0"
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-session-management-config"
```

> This plugin reads the table written by Laravel's `database` session driver. Make sure `SESSION_DRIVER=database` and the `sessions` table exists.

## Usage

```php
use Filament\Panel;
use JeffersonGoncalves\Filament\SessionManagement\FilamentSessionManagementPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentSessionManagementPlugin::make()
                ->navigationGroup('System')        // default: no group
                ->navigationSort(99)
                ->navigationIcon('heroicon-o-finger-print')
                ->slug('sessions')
                ->userAttribute('email'),          // user column, default: name
        ]);
}
```

All fluent methods are optional. Revoking deletes the session row, so its owner is logged out on the next request; a "remember me" cookie logs them back in, see the [core package](https://github.com/jeffersongoncalves/laravel-session-management#the-service) for details. Masked payload keys and the table/connection are configured in the core package's `session-management` config.

> The resource has no authorization of its own: register it only on panels whose users may see every session, or add a policy for `JeffersonGoncalves\SessionManagement\Models\Session`.

### Configuration

```php
return [
    'navigation' => [
        'group' => null,
        'sort' => null,
        'icon' => 'heroicon-o-finger-print',
    ],
    'resource' => [
        'slug' => 'sessions',
        'user_attribute' => 'name',
    ],
];
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jefferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
