<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Selection of a city with invalid Url /fr');
$I->amOnPage('/fr/');
//$I->seeResponseCodeIs(404);
$I->seePageNotFound(200);
