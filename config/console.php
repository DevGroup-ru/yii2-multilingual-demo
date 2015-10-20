<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'controllerMap' => [
        'deferred' => [
            'class' => 'DevGroup\DeferredTasks\commands\DeferredController',
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'mutex' => [
            'class' => 'yii\mutex\MysqlMutex',
            'autoRelease' => false,
        ],
        'urlManager' => [
            'class' => \DevGroup\Multilingual\components\UrlManager::className(),
            'excludeRoutes' => [
                'newsletter/index',
                'newsletter/test',
            ],
            'rules' => [
                '' => 'post/index',
            ],
            'scriptUrl' => '',
            'baseUrl' => '',
            'forceScheme' => 'http',
            'forcePort' => 80,
            'hostInfo' => 'http://demo.yii2-multilingual.dev',
        ],
        'multilingual' => [
            'class' => \DevGroup\Multilingual\Multilingual::className(),
            'default_language_id' => 1,
            'handlers' => [
                [
                    'class' => \DevGroup\Multilingual\DefaultGeoProvider::className(),
                    'default' => [
                        'country' => [
                            'name' => 'Russia',
                            'iso' => 'ru',
                        ],
                    ],
                ],
            ],
        ],
        'filedb' => [
            'class' => 'yii2tech\filedb\Connection',
            'path' => __DIR__ . '/data',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'port' => 465,
                'encryption' => 'ssl',
                'username' => 'amadablamorg@yandex.ru',
                'password' => 'z6jNK3MdjfJ49g6rJ',
            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
