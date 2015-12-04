<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('perform actions and see result');
$I->setServerData('multilingual.dev', '192.162.57.3');
$I->amOnPage('/');
$I->see('Example ENGLISH post', 'a');
