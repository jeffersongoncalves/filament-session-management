<?php

namespace JeffersonGoncalves\Filament\SessionManagement\Resources\Sessions;

use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\HtmlString;
use JeffersonGoncalves\Filament\SessionManagement\Resources\Sessions\Pages\ListSessions;
use JeffersonGoncalves\Filament\SessionManagement\Support\Utils;
use JeffersonGoncalves\SessionManagement\Facades\SessionManagement;
use JeffersonGoncalves\SessionManagement\Models\Session;

class SessionResource extends Resource
{
    protected static ?string $model = Session::class;

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('id')
                            ->label(__('filament-session-management::filament-session-management.column.id'))
                            ->formatStateUsing(fn (?string $state): string => Utils::maskSessionId($state)),
                        TextEntry::make('status')
                            ->label(__('filament-session-management::filament-session-management.column.status'))
                            ->state(fn (Session $record): string => self::status($record))
                            ->formatStateUsing(fn (string $state): string => self::statusLabel($state))
                            ->badge()
                            ->color(fn (string $state): string => self::statusColor($state)),
                        TextEntry::make('user.'.Utils::getUserAttribute())
                            ->label(__('filament-session-management::filament-session-management.column.user'))
                            ->placeholder(__('filament-session-management::filament-session-management.guest')),
                        TextEntry::make('ip_address')
                            ->label(__('filament-session-management::filament-session-management.column.ip_address')),
                        TextEntry::make('last_activity')
                            ->label(__('filament-session-management::filament-session-management.column.last_activity'))
                            ->state(fn (Session $record): string => $record->lastActivityAt->toDateTimeString()),
                        TextEntry::make('user_agent')
                            ->label(__('filament-session-management::filament-session-management.column.user_agent'))
                            ->columnSpanFull(),
                    ]),
                Section::make(__('filament-session-management::filament-session-management.column.payload'))
                    ->schema([
                        TextEntry::make('payload')
                            ->hiddenLabel()
                            ->state(fn (Session $record): HtmlString => Utils::formatPayload($record->decodePayload()))
                            ->fontFamily('mono'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('filament-session-management::filament-session-management.column.id'))
                    ->formatStateUsing(fn (?string $state): string => Utils::maskSessionId($state))
                    ->fontFamily('mono'),
                TextColumn::make('user.'.Utils::getUserAttribute())
                    ->label(__('filament-session-management::filament-session-management.column.user'))
                    ->placeholder(__('filament-session-management::filament-session-management.guest'))
                    ->searchable(),
                TextColumn::make('ip_address')
                    ->label(__('filament-session-management::filament-session-management.column.ip_address'))
                    ->searchable()
                    ->copyable(),
                TextColumn::make('user_agent')
                    ->label(__('filament-session-management::filament-session-management.column.user_agent'))
                    ->limit(50)
                    ->tooltip(fn (Session $record): ?string => $record->user_agent)
                    ->searchable(),
                TextColumn::make('last_activity')
                    ->label(__('filament-session-management::filament-session-management.column.last_activity'))
                    ->formatStateUsing(fn (Session $record): string => $record->lastActivityAt->diffForHumans())
                    ->tooltip(fn (Session $record): string => $record->lastActivityAt->toDateTimeString())
                    ->sortable(),
                TextColumn::make('status')
                    ->label(__('filament-session-management::filament-session-management.column.status'))
                    ->state(fn (Session $record): string => self::status($record))
                    ->formatStateUsing(fn (string $state): string => self::statusLabel($state))
                    ->badge()
                    ->color(fn (string $state): string => self::statusColor($state)),
            ])
            ->defaultSort('last_activity', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label(__('filament-session-management::filament-session-management.column.status'))
                    ->options([
                        'active' => self::statusLabel('active'),
                        'expired' => self::statusLabel('expired'),
                    ])
                    ->query(fn (Builder $query, array $data): Builder => match ($data['value'] ?? null) {
                        'active' => $query->scopes('active'),
                        'expired' => $query->scopes('expired'),
                        default => $query,
                    }),
                TernaryFilter::make('authenticated')
                    ->label(__('filament-session-management::filament-session-management.filters.authenticated'))
                    ->queries(
                        true: fn (Builder $query): Builder => $query->scopes('authenticated'),
                        false: fn (Builder $query): Builder => $query->scopes('guests'),
                    ),
            ])
            ->actions([
                ViewAction::make(),
                Action::make('revoke')
                    ->label(__('filament-session-management::filament-session-management.actions.revoke.label'))
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->hidden(fn (Session $record): bool => $record->isCurrent)
                    ->action(function (Session $record): void {
                        SessionManagement::revoke($record->id);

                        Notification::make()
                            ->success()
                            ->title(__('filament-session-management::filament-session-management.actions.revoke.success'))
                            ->send();
                    }),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    BulkAction::make('revoke')
                        ->label(__('filament-session-management::filament-session-management.actions.revoke.label'))
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->deselectRecordsAfterCompletion()
                        ->action(function (Collection $records): void {
                            // Never log the acting user out of the panel they are using.
                            SessionManagement::revoke(...array_diff($records->modelKeys(), [session()->getId()]));

                            Notification::make()
                                ->success()
                                ->title(__('filament-session-management::filament-session-management.actions.revoke.success'))
                                ->send();
                        }),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('user');
    }

    public static function getPages(): array
    {
        // ponytail: no view page, the modal keeps session ids out of URLs and browser history.
        return [
            'index' => ListSessions::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getModelLabel(): string
    {
        return __('filament-session-management::filament-session-management.resource.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-session-management::filament-session-management.resource.plural_label');
    }

    public static function getNavigationGroup(): ?string
    {
        return Utils::getNavigationGroup();
    }

    public static function getNavigationSort(): ?int
    {
        return Utils::getNavigationSort();
    }

    public static function getNavigationIcon(): ?string
    {
        return Utils::getNavigationIcon();
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Session::query()->active()->count();
    }

    public static function getSlug(): string
    {
        return Utils::getSlug();
    }

    protected static function status(Session $record): string
    {
        return match (true) {
            $record->isCurrent => 'current',
            $record->isExpired => 'expired',
            default => 'active',
        };
    }

    protected static function statusLabel(string $status): string
    {
        return __("filament-session-management::filament-session-management.status.{$status}");
    }

    protected static function statusColor(string $status): string
    {
        return match ($status) {
            'current' => 'primary',
            'expired' => 'gray',
            default => 'success',
        };
    }
}
