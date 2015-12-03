<?php
use Codeception\Module\FunctionalHelper;
use tests\codeception\_pages\AboutPage;

$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');
$I->setServerData('multilingual.dev', '192.162.57.3'); //Мичуринск
$I->setMultilingualHandlers([
    [
        'class' => \DevGroup\Multilingual\DefaultGeoProvider::className(),
        'default' => [
            'country' => [
                'name' => 'England',
                'iso' => 'en',
            ],
            'city' => [
                'name' => 'Tambov',
                'iso' => null,
                'lat' => 52.73169,
                'lon' => 41.44326,
            ]
        ]
    ],
]);

$I->amOnPage('/');

codecept_debug($I->grabTextFrom('body'));


