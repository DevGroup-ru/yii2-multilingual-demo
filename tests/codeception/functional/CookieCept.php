<?php
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');

$I->setCookie('language_id', Yii::$app->getSecurity()->hashData(
    serialize(['language_id', 1]),
    Yii::$app->request->cookieValidationKey
));

$I->amOnPage('http://multilingual.dev');
$I->see('Example ENGLISH post', 'a');

