<?php

return [
    'resource' => [
        'label' => 'Sessiya',
        'plural_label' => 'Sessiyalar',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'Foydalanuvchi',
        'ip_address' => 'IP manzil',
        'user_agent' => 'User Agent',
        'last_activity' => 'Oxirgi faollik',
        'status' => 'Holat',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Joriy',
        'active' => 'Faol',
        'expired' => 'Muddati o\'tgan',
    ],

    'filters' => [
        'authenticated' => 'Autentifikatsiyalangan',
    ],

    'guest' => 'Mehmon',

    'actions' => [
        'revoke' => [
            'label' => 'Bekor qilish',
            'success' => 'Sessiya bekor qilindi.',
        ],
        'prune' => [
            'label' => 'Muddati o\'tganlarni tozalash',
            'success' => ':count ta muddati o\'tgan sessiya o\'chirildi.',
        ],
    ],
];
