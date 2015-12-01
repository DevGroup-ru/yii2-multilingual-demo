<?php
/**
 * Application configuration shared by all test types
 */
return [
    'language' => 'en-US',
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\faker\FixtureController',
            'fixtureDataPath' => '@tests/codeception/fixtures',
            'templatePath' => '@tests/codeception/templates',
            'namespace' => 'tests\codeception\fixtures',
        ],
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=multilingual.dev',
            'username' => 'root',
            'password' => '7896321',
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 86400,
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => false,
        ],
    ],
];
