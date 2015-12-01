<?php
/**
 * Application configuration for acceptance tests
 */
$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../../config/web.php'),
    require(__DIR__ . '/config.php'),
    [

    ]
);
$config['modules']['debug']['allowedIPs'] = [];

return $config;
