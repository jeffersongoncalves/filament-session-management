<?php

return [
    'resource' => [
        'label' => 'セッション',
        'plural_label' => 'セッション',
    ],

    'column' => [
        'id' => 'ID',
        'user' => 'ユーザー',
        'ip_address' => 'IPアドレス',
        'user_agent' => 'ユーザーエージェント',
        'last_activity' => '最終アクティビティ',
        'status' => 'ステータス',
        'payload' => 'ペイロード',
    ],

    'status' => [
        'current' => '現在',
        'active' => '有効',
        'expired' => '期限切れ',
    ],

    'filters' => [
        'authenticated' => '認証済み',
    ],

    'guest' => 'ゲスト',

    'actions' => [
        'revoke' => [
            'label' => '取り消す',
            'success' => 'セッションを取り消しました。',
        ],
        'prune' => [
            'label' => '期限切れを削除',
            'success' => '期限切れのセッションを:count件削除しました。',
        ],
    ],
];
