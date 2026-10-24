<?php

return [
    'resource' => [
        'label' => 'Oturum',
        'plural_label' => 'Oturumlar',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'Kullanıcı',
        'ip_address' => 'IP Adresi',
        'user_agent' => 'User Agent',
        'last_activity' => 'Son Etkinlik',
        'status' => 'Durum',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Geçerli',
        'active' => 'Aktif',
        'expired' => 'Süresi dolmuş',
    ],

    'filters' => [
        'authenticated' => 'Kimliği doğrulanmış',
    ],

    'guest' => 'Misafir',

    'actions' => [
        'revoke' => [
            'label' => 'İptal et',
            'success' => 'Oturum iptal edildi.',
        ],
        'prune' => [
            'label' => 'Süresi dolanları temizle',
            'success' => ':count süresi dolmuş oturum silindi.',
        ],
    ],
];
