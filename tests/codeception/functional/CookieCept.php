<?php
$I = new FunctionalTester($scenario);
$I->wantTo('Set cookie "en"');
$I->setServerData('multilingual.dev', '192.162.57.3');
$I->setCookie('language_id', Yii::$app->getSecurity()->hashData(
    serialize(['language_id', 1]),
    Yii::$app->request->cookieValidationKey
));

$I->amOnPage('/');
$I->see('Example ENGLISH post', 'a');

