<?php

return [
    'resource' => [
        'label' => 'Sesión',
        'plural_label' => 'Sesiones',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'Usuario',
        'ip_address' => 'Dirección IP',
        'user_agent' => 'User Agent',
        'last_activity' => 'Última actividad',
        'status' => 'Estado',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Actual',
        'active' => 'Activa',
        'expired' => 'Expirada',
    ],

    'filters' => [
        'authenticated' => 'Autenticada',
    ],

    'guest' => 'Invitado',

    'actions' => [
        'revoke' => [
            'label' => 'Revocar',
            'success' => 'La sesión ha sido revocada.',
        ],
        'prune' => [
            'label' => 'Eliminar expiradas',
            'success' => ':count sesión(es) expirada(s) eliminada(s).',
        ],
    ],
];
