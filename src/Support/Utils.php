<?php

namespace JeffersonGoncalves\Filament\SessionManagement\Support;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class Utils
{
    public static function getNavigationGroup(): ?string
    {
        $group = config('filament-session-management.navigation.group');

        return filled($group) ? (string) $group : null;
    }

    public static function getNavigationSort(): ?int
    {
        $sort = config('filament-session-management.navigation.sort');

        return $sort === null ? null : (int) $sort;
    }

    public static function getNavigationIcon(): string
    {
        return (string) config('filament-session-management.navigation.icon', 'heroicon-o-finger-print');
    }

    public static function getSlug(): string
    {
        return (string) config('filament-session-management.resource.slug', 'sessions');
    }

    public static function getUserAttribute(): string
    {
        return (string) config('filament-session-management.resource.user_attribute', 'name');
    }

    /**
     * The session id is a bearer credential: only show enough of it to tell sessions apart.
     */
    public static function maskSessionId(?string $id): string
    {
        return Str::limit((string) $id, 8);
    }

    /**
     * Render a decoded session payload as escaped, pretty-printed JSON inside a <pre> block.
     *
     * @param  array<array-key, mixed>  $payload
     */
    public static function formatPayload(array $payload): HtmlString
    {
        // JSON_PARTIAL_OUTPUT_ON_ERROR: values JSON can't represent (e.g. INF) become 0 instead of blanking the whole payload.
        $json = (string) json_encode(
            $payload,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE | JSON_PARTIAL_OUTPUT_ON_ERROR,
        );

        return new HtmlString('<pre style="white-space: pre-wrap; word-break: break-all;">'.e($json).'</pre>');
    }
}
