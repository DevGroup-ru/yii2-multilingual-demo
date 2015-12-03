<?php
$_SERVER['SCRIPT_FILENAME'] = YII_TEST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = YII_TEST_ENTRY_URL;

/**
 * Application configuration for functional tests
 */
$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../../config/web.php'),
    require(__DIR__ . '/config.php'),
    [
        'components' => [
            'request' => [
                // it's not recommended to run functional tests with CSRF validation enabled
                'enableCsrfValidation' => false,
                // but if you absolutely need it set cookie domain to localhost
                /*
                'csrfCookie' => [
                    'domain' => 'localhost',
                ],
                */
            ],
            'urlManager' => [
                'showScriptName' => false,
            ],
            'multilingual' => [

            ]
        ],
    ]
);

$config['components']['cache'] = [
    'class' => 'yii\caching\DummyCache',
    'as lazy' => [
        'class' => 'DevGroup\TagDependencyHelper\LazyCache',
    ],
];
if (isset($_SERVER['multilingual_handlers'])) {
    $config['components']['multilingual']['handlers'] = $_SERVER['multilingual_handlers'];
}
return $config;