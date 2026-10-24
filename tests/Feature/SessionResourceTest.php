<?php

use JeffersonGoncalves\Filament\SessionManagement\Resources\Sessions\Pages\ListSessions;
use JeffersonGoncalves\Filament\SessionManagement\Resources\Sessions\Pages\ViewSession;
use JeffersonGoncalves\Filament\SessionManagement\Resources\Sessions\SessionResource;
use JeffersonGoncalves\Filament\SessionManagement\Tests\Fixtures\TestUser;
use JeffersonGoncalves\SessionManagement\Facades\SessionManagement;
use JeffersonGoncalves\SessionManagement\Models\Session;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = TestUser::create([
        'id' => 1,
        'name' => 'Admin',
        'email' => 'admin@example.com',
    ]);

    $this->actingAs($this->user);
});

it('renders the list page and lists sessions with their user', function () {
    $sessions = [makeSession(userId: 1), makeSession()];

    Livewire::test(ListSessions::class)
        ->assertSuccessful()
        ->assertCanSeeTableRecords($sessions)
        ->assertSee('Admin')
        ->assertSee('Guest');
});

it('shows the decoded payload with sensitive keys masked', function () {
    $session = makeSession(['_token' => 'csrf-secret', 'locale' => 'pt_BR'], userId: 1);

    Livewire::test(ViewSession::class, ['record' => $session->getKey()])
        ->assertSuccessful()
        ->assertSeeHtml('&quot;locale&quot;: &quot;pt_BR&quot;')
        ->assertSee('********')
        ->assertDontSee('csrf-secret');
});

it('revokes a session through the row action', function () {
    $session = makeSession();

    Livewire::test(ListSessions::class)
        ->callTableAction('revoke', $session);

    $this->assertModelMissing($session);
});

it('hides the revoke action for the current session', function () {
    $session = makeSession();
    app('session')->setId($session->id);

    Livewire::test(ListSessions::class)
        ->assertTableActionHidden('revoke', $session);
});

it('revokes sessions in bulk but keeps the current one', function () {
    $current = makeSession();
    $others = [makeSession(), makeSession()];
    app('session')->setId($current->id);

    Livewire::test(ListSessions::class)
        ->callTableBulkAction('revoke', [$current, ...$others]);

    $this->assertModelExists($current);

    foreach ($others as $session) {
        $this->assertModelMissing($session);
    }
});

it('prunes expired sessions from the header action', function () {
    $active = makeSession();
    $expired = makeSession(minutesAgo: 500);

    Livewire::test(ListSessions::class)
        ->callAction('prune');

    $this->assertModelExists($active);
    $this->assertModelMissing($expired);
});

it('filters by status and authentication', function () {
    $active = makeSession(userId: 1);
    $expired = makeSession(minutesAgo: 500);

    Livewire::test(ListSessions::class)
        ->filterTable('status', 'expired')
        ->assertCanSeeTableRecords([$expired])
        ->assertCanNotSeeTableRecords([$active]);

    Livewire::test(ListSessions::class)
        ->filterTable('authenticated', true)
        ->assertCanSeeTableRecords([$active])
        ->assertCanNotSeeTableRecords([$expired]);
});

it('wires the row revoke action to the session service', function () {
    $session = makeSession();

    SessionManagement::spy();

    Livewire::test(ListSessions::class)
        ->callTableAction('revoke', $session);

    SessionManagement::shouldHaveReceived('revoke')->with($session->id)->once();
});

it('is read-only and counts active sessions in the badge', function () {
    makeSession();
    makeSession(minutesAgo: 500);

    expect(SessionResource::getPages())->toHaveKeys(['index', 'view'])->not->toHaveKey('create')
        ->and(SessionResource::canCreate())->toBeFalse()
        ->and(SessionResource::getNavigationBadge())->toBe('1')
        ->and(Session::query()->count())->toBe(2);
});
