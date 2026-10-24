<?php

return [
    'resource' => [
        'label' => 'सत्र',
        'plural_label' => 'सत्र',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'उपयोगकर्ता',
        'ip_address' => 'IP पता',
        'user_agent' => 'User Agent',
        'last_activity' => 'अंतिम गतिविधि',
        'status' => 'स्थिति',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'वर्तमान',
        'active' => 'सक्रिय',
        'expired' => 'समाप्त',
    ],

    'filters' => [
        'authenticated' => 'प्रमाणित',
    ],

    'guest' => 'अतिथि',

    'actions' => [
        'revoke' => [
            'label' => 'रद्द करें',
            'success' => 'सत्र रद्द कर दिया गया है।',
        ],
        'prune' => [
            'label' => 'समाप्त सत्र हटाएँ',
            'success' => ':count समाप्त सत्र हटाए गए।',
        ],
    ],
];
