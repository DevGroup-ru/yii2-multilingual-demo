<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Seting cookie "RU" and selection of a city');
//$I->resetCookie('PHPSESID');
$I->setCookie('language_id', Yii::$app->getSecurity()->hashData(
    serialize(['language_id', 1]),
    Yii::$app->request->cookieValidationKey
));
$I->amOnPage('/');
$I->see('We could not identify your city');
$I->click('#select_geo_block > button');
$I->click('Tambov');
$I->see('We have identified your city as "Tambov"');
