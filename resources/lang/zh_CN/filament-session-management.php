<?php

return [
    'resource' => [
        'label' => '会话',
        'plural_label' => '会话',
    ],

    'column' => [
        'id' => 'ID',
        'user' => '用户',
        'ip_address' => 'IP 地址',
        'user_agent' => '用户代理',
        'last_activity' => '最后活动',
        'status' => '状态',
        'payload' => '数据',
    ],

    'status' => [
        'current' => '当前',
        'active' => '活跃',
        'expired' => '已过期',
    ],

    'filters' => [
        'authenticated' => '已认证',
    ],

    'guest' => '访客',

    'actions' => [
        'revoke' => [
            'label' => '撤销',
            'success' => '会话已撤销。',
        ],
        'prune' => [
            'label' => '清理已过期',
            'success' => '已清理 :count 个过期会话。',
        ],
    ],
];
