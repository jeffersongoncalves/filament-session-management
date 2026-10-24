<?php

return [
    'resource' => [
        'label' => 'Sessão',
        'plural_label' => 'Sessões',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'Utilizador',
        'ip_address' => 'Endereço IP',
        'user_agent' => 'User Agent',
        'last_activity' => 'Última atividade',
        'status' => 'Estado',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Atual',
        'active' => 'Ativa',
        'expired' => 'Expirada',
    ],

    'filters' => [
        'authenticated' => 'Autenticada',
    ],

    'guest' => 'Visitante',

    'actions' => [
        'revoke' => [
            'label' => 'Revogar',
            'success' => 'A sessão foi revogada.',
        ],
        'prune' => [
            'label' => 'Limpar expiradas',
            'success' => ':count sessão(ões) expirada(s) removida(s).',
        ],
    ],
];
