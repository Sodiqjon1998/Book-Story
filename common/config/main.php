<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'menumanager' => [
            'class' => 'backend\modules\menumanager\Module'
        ],
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
        ]
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'defaultTimeZone' => 'Asia/Tashkent',
        ],
    ],
];
