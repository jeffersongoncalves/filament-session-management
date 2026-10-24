<?php

return [
    'resource' => [
        'label' => 'Session',
        'plural_label' => 'Sessions',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'User',
        'ip_address' => 'IP Address',
        'user_agent' => 'User Agent',
        'last_activity' => 'Last Activity',
        'status' => 'Status',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Current',
        'active' => 'Active',
        'expired' => 'Expired',
    ],

    'filters' => [
        'authenticated' => 'Authenticated',
    ],

    'guest' => 'Guest',

    'actions' => [
        'revoke' => [
            'label' => 'Revoke',
            'success' => 'The session has been revoked.',
        ],
        'prune' => [
            'label' => 'Prune expired',
            'success' => ':count expired session(s) pruned.',
        ],
    ],
];
