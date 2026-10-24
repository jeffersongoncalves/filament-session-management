<?php

return [
    'resource' => [
        'label' => 'Sessiya',
        'plural_label' => 'Sessiyalar',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'İstifadəçi',
        'ip_address' => 'IP ünvanı',
        'user_agent' => 'User Agent',
        'last_activity' => 'Son fəaliyyət',
        'status' => 'Status',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Cari',
        'active' => 'Aktiv',
        'expired' => 'Vaxtı bitmiş',
    ],

    'filters' => [
        'authenticated' => 'Doğrulanmış',
    ],

    'guest' => 'Qonaq',

    'actions' => [
        'revoke' => [
            'label' => 'Ləğv et',
            'success' => 'Sessiya ləğv edildi.',
        ],
        'prune' => [
            'label' => 'Vaxtı bitmişləri təmizlə',
            'success' => ':count vaxtı bitmiş sessiya silindi.',
        ],
    ],
];
