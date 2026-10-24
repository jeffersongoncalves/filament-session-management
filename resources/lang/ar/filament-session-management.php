<?php

return [
    'resource' => [
        'label' => 'جلسة',
        'plural_label' => 'الجلسات',
    ],

    'column' => [
        'id' => 'المعرف',
        'user' => 'المستخدم',
        'ip_address' => 'عنوان IP',
        'user_agent' => 'وكيل المستخدم',
        'last_activity' => 'آخر نشاط',
        'status' => 'الحالة',
        'payload' => 'البيانات',
    ],

    'status' => [
        'current' => 'الحالية',
        'active' => 'نشطة',
        'expired' => 'منتهية',
    ],

    'filters' => [
        'authenticated' => 'مصادق عليها',
    ],

    'guest' => 'زائر',

    'actions' => [
        'revoke' => [
            'label' => 'إلغاء',
            'success' => 'تم إلغاء الجلسة.',
        ],
        'prune' => [
            'label' => 'حذف المنتهية',
            'success' => 'تم حذف :count جلسة منتهية.',
        ],
    ],
];
