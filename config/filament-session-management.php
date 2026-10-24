<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    |
    | The navigation group the sessions resource is registered under and its
    | sort order. Leave "group" null to show it outside any group. These
    | values can also be set fluently on the plugin.
    |
    */
    'navigation' => [
        'group' => null,
        'sort' => null,
        'icon' => 'heroicon-o-finger-print',
    ],

    /*
    |--------------------------------------------------------------------------
    | Resource
    |--------------------------------------------------------------------------
    |
    | "slug" is used in the panel URL; "user_attribute" is the user model
    | attribute shown for authenticated sessions.
    |
    */
    'resource' => [
        'slug' => 'sessions',
        'user_attribute' => 'name',
    ],
];
