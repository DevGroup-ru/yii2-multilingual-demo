<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Set cookie "ru"');
$I->setServerData('multilingual.dev', '192.162.57.3');
$I->setCookie('language_id', Yii::$app->getSecurity()->hashData(
    serialize(['language_id', 2]),
    Yii::$app->request->cookieValidationKey
));
$I->amOnPage('/');
$I->see('Пример русского поста');
