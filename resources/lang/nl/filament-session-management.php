<?php

return [
    'resource' => [
        'label' => 'Sessie',
        'plural_label' => 'Sessies',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'Gebruiker',
        'ip_address' => 'IP-adres',
        'user_agent' => 'User Agent',
        'last_activity' => 'Laatste activiteit',
        'status' => 'Status',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Huidige',
        'active' => 'Actief',
        'expired' => 'Verlopen',
    ],

    'filters' => [
        'authenticated' => 'Ingelogd',
    ],

    'guest' => 'Gast',

    'actions' => [
        'revoke' => [
            'label' => 'Intrekken',
            'success' => 'De sessie is ingetrokken.',
        ],
        'prune' => [
            'label' => 'Verlopen opschonen',
            'success' => ':count verlopen sessie(s) verwijderd.',
        ],
    ],
];
