<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Selection of a city in "en" version');
$I->amOnPage('/en/');
$I->see('We could not identify your city');
$I->click('#select_geo_block > button');
$I->click('Tambov');
$I->see('We have identified your city as "Tambov"');
