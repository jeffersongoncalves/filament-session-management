<?php

namespace JeffersonGoncalves\Filament\SessionManagement\Resources\Sessions\Pages;

use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\Filament\SessionManagement\Resources\Sessions\SessionResource;
use JeffersonGoncalves\SessionManagement\Facades\SessionManagement;

class ListSessions extends ListRecords
{
    protected static string $resource = SessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('prune')
                ->label(__('filament-session-management::filament-session-management.actions.prune.label'))
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation()
                ->action(function (): void {
                    Notification::make()
                        ->success()
                        ->title(__('filament-session-management::filament-session-management.actions.prune.success', [
                            'count' => SessionManagement::prune(),
                        ]))
                        ->send();
                }),
        ];
    }
}
