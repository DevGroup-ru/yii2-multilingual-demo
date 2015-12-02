<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Selection of a city in "ru" version');
$I->setServerData('multilingual.dev', '192.162.57.3');
$I->amOnPage('/ru/');
$I->see('Мы не смогли определить ваш город');
$I->click('#select_geo_block > button');
$I->click('Tambov');
$I->see('Мы определили ваш город, как "Tambov"');
