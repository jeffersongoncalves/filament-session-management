<?php

namespace JeffersonGoncalves\Filament\SessionManagement;

use Filament\Panel;
use JeffersonGoncalves\Filament\SessionManagement\Resources\Sessions\SessionResource;
use JeffersonGoncalves\FilamentPluginCore\BasePlugin;

class FilamentSessionManagementPlugin extends BasePlugin
{
    protected ?string $navigationGroup = null;

    protected ?int $navigationSort = null;

    protected ?string $navigationIcon = null;

    protected ?string $slug = null;

    protected ?string $userAttribute = null;

    public function getId(): string
    {
        return 'filament-session-management';
    }

    public function register(Panel $panel): void
    {
        $this->applyConfiguration();

        $panel->resources([
            SessionResource::class,
        ]);
    }

    public function navigationGroup(?string $label): static
    {
        $this->navigationGroup = $label;

        return $this;
    }

    public function navigationSort(?int $sort): static
    {
        $this->navigationSort = $sort;

        return $this;
    }

    public function navigationIcon(string $icon): static
    {
        $this->navigationIcon = $icon;

        return $this;
    }

    public function slug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function userAttribute(string $attribute): static
    {
        $this->userAttribute = $attribute;

        return $this;
    }

    /**
     * Push the fluent overrides into the shared config so the resource reads
     * configuration from a single source.
     */
    protected function applyConfiguration(): void
    {
        foreach ([
            'navigation.group' => $this->navigationGroup,
            'navigation.sort' => $this->navigationSort,
            'navigation.icon' => $this->navigationIcon,
            'resource.slug' => $this->slug,
            'resource.user_attribute' => $this->userAttribute,
        ] as $key => $value) {
            if ($value !== null) {
                config()->set("filament-session-management.{$key}", $value);
            }
        }
    }
}
