<?php

return [
    'resource' => [
        'label' => 'Сессия',
        'plural_label' => 'Сессии',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'Пользователь',
        'ip_address' => 'IP-адрес',
        'user_agent' => 'User Agent',
        'last_activity' => 'Последняя активность',
        'status' => 'Статус',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Текущая',
        'active' => 'Активна',
        'expired' => 'Истекла',
    ],

    'filters' => [
        'authenticated' => 'Авторизована',
    ],

    'guest' => 'Гость',

    'actions' => [
        'revoke' => [
            'label' => 'Отозвать',
            'success' => 'Сессия отозвана.',
        ],
        'prune' => [
            'label' => 'Удалить истёкшие',
            'success' => 'Удалено истёкших сессий: :count.',
        ],
    ],
];
