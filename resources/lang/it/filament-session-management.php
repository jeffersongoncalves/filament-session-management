<?php

return [
    'resource' => [
        'label' => 'Sessione',
        'plural_label' => 'Sessioni',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'Utente',
        'ip_address' => 'Indirizzo IP',
        'user_agent' => 'User Agent',
        'last_activity' => 'Ultima attività',
        'status' => 'Stato',
        'payload' => 'Payload',
    ],

    'status' => [
        'current' => 'Corrente',
        'active' => 'Attiva',
        'expired' => 'Scaduta',
    ],

    'filters' => [
        'authenticated' => 'Autenticata',
    ],

    'guest' => 'Ospite',

    'actions' => [
        'revoke' => [
            'label' => 'Revoca',
            'success' => 'La sessione è stata revocata.',
        ],
        'prune' => [
            'label' => 'Elimina scadute',
            'success' => ':count sessione/i scaduta/e eliminata/e.',
        ],
    ],
];
