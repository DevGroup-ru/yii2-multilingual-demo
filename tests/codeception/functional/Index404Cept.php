<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Selection of a city with invalid Url /fr');
$I->setServerData('multilingual.dev', '192.162.57.3');
$I->amOnPage('/fr/');
//$I->seeResponseCodeIs(404);
$I->seePageNotFound(200);
