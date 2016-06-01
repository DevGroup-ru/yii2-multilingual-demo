<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','multilingual'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '19wRK6yuUnGqL-dtBRZpye2Txxchj61J',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
//            'useMemcached' => true,
            'as lazy' => [
                'class' => 'DevGroup\TagDependencyHelper\LazyCache',
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'class' => \DevGroup\Multilingual\components\UrlManager::className(),
            'excludeRoutes' => [
                'newsletter/index',
                'newsletter/test',
            ],
            'rules' => [
                '' => 'post/index',
            ],
        ],
        'multilingual' => [
            'class' => \DevGroup\Multilingual\Multilingual::className(),
            'handlers' => [
                [
                    'class' => \DevGroup\Multilingual\DefaultGeoProvider::className(),
                    'default' => [
                        'country' => [
                            'name' => 'England',
                            'iso' => 'en',
                        ],
                    ],
                ],
            ],
        ],
        'filedb' => [
            'class' => 'yii2tech\filedb\Connection',
            'path' => __DIR__ . '/data',
        ],
        'i18n' => [
            'translations' => [
                'admin' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
                'yii2tech-admin' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => false,
            ],
        ],
    ],
    'modules' => [
        'dynagrid'=> [
            'class'=>'\kartik\dynagrid\Module',
            'dynaGridOptions' => [
                'gridOptions' => [
                    'export' => false,
                ]
            ]
            // other module settings
        ],
        'gridview'=> [
            'class'=>'\kartik\grid\Module',
            // other module settings

        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => [
            '192.168.33.1',
            '127.0.0.1',
            '::1',
        ]
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => [
            '192.168.33.1',
            '127.0.0.1',
            '::1',
        ]
    ];
}

return $config;
