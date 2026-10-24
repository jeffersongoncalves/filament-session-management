<?php

return [
    'resource' => [
        'label' => 'Sitzung',
        'plural_label' => 'Sitzungen',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'Benutzer',
        'ip_address' => 'IP-Adresse',
        'user_agent' => 'User Agent',
        'last_activity' => 'Letzte Aktivität',
        'status' => 'Status',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Aktuell',
        'active' => 'Aktiv',
        'expired' => 'Abgelaufen',
    ],

    'filters' => [
        'authenticated' => 'Angemeldet',
    ],

    'guest' => 'Gast',

    'actions' => [
        'revoke' => [
            'label' => 'Widerrufen',
            'success' => 'Die Sitzung wurde widerrufen.',
        ],
        'prune' => [
            'label' => 'Abgelaufene bereinigen',
            'success' => ':count abgelaufene Sitzung(en) entfernt.',
        ],
    ],
];
