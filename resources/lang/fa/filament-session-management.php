<?php

return [
    'resource' => [
        'label' => 'نشست',
        'plural_label' => 'نشست‌ها',
    ],

    'column' => [
        'id' => 'شناسه',
        'user' => 'کاربر',
        'ip_address' => 'آدرس IP',
        'user_agent' => 'User Agent',
        'last_activity' => 'آخرین فعالیت',
        'status' => 'وضعیت',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'فعلی',
        'active' => 'فعال',
        'expired' => 'منقضی',
    ],

    'filters' => [
        'authenticated' => 'احراز هویت شده',
    ],

    'guest' => 'مهمان',

    'actions' => [
        'revoke' => [
            'label' => 'ابطال',
            'success' => 'نشست ابطال شد.',
        ],
        'prune' => [
            'label' => 'پاک‌سازی منقضی‌ها',
            'success' => ':count نشست منقضی حذف شد.',
        ],
    ],
];
