<?php

return [
    'resource' => [
        'label' => 'Sesja',
        'plural_label' => 'Sesje',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'Użytkownik',
        'ip_address' => 'Adres IP',
        'user_agent' => 'User Agent',
        'last_activity' => 'Ostatnia aktywność',
        'status' => 'Status',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Bieżąca',
        'active' => 'Aktywna',
        'expired' => 'Wygasła',
    ],

    'filters' => [
        'authenticated' => 'Uwierzytelniona',
    ],

    'guest' => 'Gość',

    'actions' => [
        'revoke' => [
            'label' => 'Unieważnij',
            'success' => 'Sesja została unieważniona.',
        ],
        'prune' => [
            'label' => 'Usuń wygasłe',
            'success' => 'Usunięto wygasłe sesje: :count.',
        ],
    ],
];
