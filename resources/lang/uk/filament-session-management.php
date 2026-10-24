<?php

return [
    'resource' => [
        'label' => 'Сесія',
        'plural_label' => 'Сесії',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'Користувач',
        'ip_address' => 'IP-адреса',
        'user_agent' => 'User Agent',
        'last_activity' => 'Остання активність',
        'status' => 'Статус',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Поточна',
        'active' => 'Активна',
        'expired' => 'Закінчилася',
    ],

    'filters' => [
        'authenticated' => 'Авторизована',
    ],

    'guest' => 'Гість',

    'actions' => [
        'revoke' => [
            'label' => 'Відкликати',
            'success' => 'Сесію відкликано.',
        ],
        'prune' => [
            'label' => 'Видалити прострочені',
            'success' => 'Видалено прострочених сесій: :count.',
        ],
    ],
];
