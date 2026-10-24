<?php

return [
    'resource' => [
        'label' => 'Session',
        'plural_label' => 'Sessions',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'Utilisateur',
        'ip_address' => 'Adresse IP',
        'user_agent' => 'User Agent',
        'last_activity' => 'Dernière activité',
        'status' => 'Statut',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Actuelle',
        'active' => 'Active',
        'expired' => 'Expirée',
    ],

    'filters' => [
        'authenticated' => 'Authentifiée',
    ],

    'guest' => 'Invité',

    'actions' => [
        'revoke' => [
            'label' => 'Révoquer',
            'success' => 'La session a été révoquée.',
        ],
        'prune' => [
            'label' => 'Purger les expirées',
            'success' => ':count session(s) expirée(s) supprimée(s).',
        ],
    ],
];
