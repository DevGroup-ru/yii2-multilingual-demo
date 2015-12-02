<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('Selection of a city with current Url /ru');
$I->setServerData('multilingual.dev', '192.162.57.3');
$I->amOnPage('/en/');
$I->seeResponseCodeIs(200);
$I->see('We could not identify your city');
$I->seeLink('Example ENGLISH post', '/en/post/show?id=3');