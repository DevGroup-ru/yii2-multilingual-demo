<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Seting cookie "RU" and selection of a city');
$I->resetCookie('PHPSESID');
$I->setCookie('language_id', Yii::$app->getSecurity()->hashData(
    serialize(['language_id', 2]),
    Yii::$app->request->cookieValidationKey
));
$I->amOnPage('/');
$I->see('Мы не смогли определить ваш город');
$I->click('#select_geo_block > button');
$I->click('Tambov');
$I->see('Мы определили ваш город, как "Tambov"');